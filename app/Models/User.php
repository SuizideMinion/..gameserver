<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function ress1()
    {
        $UserRess = \App\Models\UserDatas::where('user_id', $this->id)->where('key', 'ress1')->first();
        if ( $UserRess ) return $UserRess->value;
        \App\Models\UserDatas::create([
            'user_id' => $this->id,
            'key' => 'ress1',
            'value' => getServerData('Startress.ress1')
        ]);
        \App\Models\UserDatas::create([
            'user_id' => $this->id,
            'key' => 'ress1.proTick',
            'value' => getServerData('Planetar.ress1')
        ]);
        $UserRess = \App\Models\UserDatas::where('user_id', $this->id)->where('key', 'ress1')->first();
        if ( $UserRess ) return $UserRess->value;
    }

    public function ress2()
    {
        $UserRess = \App\Models\UserDatas::where('user_id', $this->id)->where('key', 'ress2')->first();
        if ( $UserRess ) return $UserRess->value;
        \App\Models\UserDatas::create([
            'user_id' => $this->id,
            'key' => 'ress2',
            'value' => getServerData('Startress.ress2')
        ]);
        \App\Models\UserDatas::create([
            'user_id' => $this->id,
            'key' => 'ress2.proTick',
            'value' => getServerData('Planetar.ress2')
        ]);
        $UserRess = \App\Models\UserDatas::where('user_id', $this->id)->where('key', 'ress2')->first();
        if ( $UserRess ) return $UserRess->value;
    }

    public function ress3()
    {
        $UserRess = \App\Models\UserDatas::where('user_id', $this->id)->where('key', 'ress3')->first();
        if ( $UserRess ) return $UserRess->value;
        \App\Models\UserDatas::create([
            'user_id' => $this->id,
            'key' => 'ress3',
            'value' => getServerData('Startress.ress3')
        ]);
        \App\Models\UserDatas::create([
            'user_id' => $this->id,
            'key' => 'ress3.proTick',
            'value' => getServerData('Planetar.ress3')
        ]);
        $UserRess = \App\Models\UserDatas::where('user_id', $this->id)->where('key', 'ress3')->first();
        if ( $UserRess ) return $UserRess->value;
    }

    public function ress4()
    {
        $UserRess = \App\Models\UserDatas::where('user_id', $this->id)->where('key', 'ress4')->first();
        if ( $UserRess ) return $UserRess->value;
        \App\Models\UserDatas::create([
            'user_id' => $this->id,
            'key' => 'ress4',
            'value' => getServerData('Startress.ress4')
        ]);
        \App\Models\UserDatas::create([
            'user_id' => $this->id,
            'key' => 'ress4.proTick',
            'value' => getServerData('Planetar.ress4')
        ]);
        $UserRess = \App\Models\UserDatas::where('user_id', $this->id)->where('key', 'ress4')->first();
        if ( $UserRess ) return $UserRess->value;
    }

    public function ress5()
    {
        $UserRess = \App\Models\UserDatas::where('user_id', $this->id)->where('key', 'ress5')->first();
        if ( $UserRess ) return $UserRess->value;
        \App\Models\UserDatas::create([
            'user_id' => $this->id,
            'key' => 'ress5',
            'value' => getServerData('Startress.ress5')
        ]);
        \App\Models\UserDatas::create([
            'user_id' => $this->id,
            'key' => 'ress5.proTick',
            'value' => getServerData('Planetar.ress5')
        ]);
        $UserRess = \App\Models\UserDatas::where('user_id', $this->id)->where('key', 'ress5')->first();
        if ( $UserRess ) return $UserRess->value;
    }

    public function userData()
    {
        return \App\Models\UserDatas::where('user_id', $this->id)->pluck('value', 'key')->all();
    }
    public function setUserData($key, $value)
    {
        return \App\Models\UserDatas::create([
            'user_id' => $this->id,
            'key' => $key,
            'value' => $value
        ]);
    }
    public function userTechs($id)
    {
        return \App\Models\UserTechnologies::where('user_id', $this->id)->where('tech_id', $id)->first();
    }
}
