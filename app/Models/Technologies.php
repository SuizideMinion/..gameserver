<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Technologies extends Model
{
    use HasFactory;

    public function getTableColumns() {
        return $this->getConnection()->getSchemaBuilder()->getColumnListing($this->getTable());
    }

    public function getUpgrade()
    {
        return $this->hasOne(\App\Models\Technologies::class, 'upgrade', 'id');
    }

    public function canBuild()
    {
        $UserTechnologies = \App\Models\UserTechnologies::where('user_id', auth()->user()->id)->pluck('status', 'tech_id')->all();
//        dd($UserTechnologies);
//        $UserTechnologies = \App\Models\UserTechnologies::where('user_id', auth()->user()->id)->where('tech_id', $this->tech_need)->where('status', 2)->first();
        if ($this->tech_need != 0)
            if (!isset($UserTechnologies[$this->tech_need]) OR $UserTechnologies[$this->tech_need] != 2)
                return '1';
//        $UserTechnologies = \App\Models\UserTechnologies::where('user_id', auth()->user()->id)->where('tech_id', $this->id)->first();
        if (isset($UserTechnologies[$this->id]))
        {
            if ($UserTechnologies[$this->id] == 2)
                return '1';
            if ($UserTechnologies[$this->id] == 1)
                return 'in bau';// ('. timeconversion($UserTechnologie->time - time()) .')' ;
        }

//        $UserTechnologies = \App\Models\UserTechnologies::where('user_id', auth()->user()->id)->where('status', 1)->first();
        if (array_search(1,$UserTechnologies))
        {
            return 'Etwas im bau';
        }

        if( (int) auth()->user()->userData()['ress1'] < (int) $this->ress1 ) return 'M Zuwenig';
        if( (int) auth()->user()->userData()['ress2'] < (int) $this->ress2 ) return 'D Zuwenig';
        if( (int) auth()->user()->userData()['ress3'] < (int) $this->ress3 ) return 'I Zuwenig';
        if( (int) auth()->user()->userData()['ress4'] < (int) $this->ress4 ) return 'E Zuwenig';
        if( (int) auth()->user()->userData()['ress5'] < (int) $this->ress5 ) return 'T Zuwenig';

        return 'true';
    }
}
