<?php

namespace Modules\Technologie\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class TechnologieController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $Technologies = \App\Models\Technologies::where('upgrade', 0)->with('getUpgrade')->get();

        $Columns = new \App\Models\Technologies;
        $Columns = $Columns->getTableColumns();
        $Columns = array_diff($Columns, ['created_at', 'updated_at']);

        return view('technologie::index', compact('Technologies', 'Columns'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('technologie::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('technologie::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function edit($id)
    {
//        return view('technologie::edit');
        $Technologie = \App\Models\Technologies::where('id', $id)->first();
        if ($Technologie->canBuild() == 'true')
        {
            \App\Models\UserTechnologies::create([
                'user_id' => auth()->user()->id,
                'tech_id' => $id,
                'status' => 1,
                'time' => time() + $Technologie->tech_build_time,
            ]);
            \App\Models\UserDatas::where('user_id', auth()->user()->id)->where('key', 'ress1')->decrement('value', $Technologie->ress1);
            \App\Models\UserDatas::where('user_id', auth()->user()->id)->where('key', 'ress2')->decrement('value', $Technologie->ress2);
            \App\Models\UserDatas::where('user_id', auth()->user()->id)->where('key', 'ress3')->decrement('value', $Technologie->ress3);
            \App\Models\UserDatas::where('user_id', auth()->user()->id)->where('key', 'ress4')->decrement('value', $Technologie->ress4);
            \App\Models\UserDatas::where('user_id', auth()->user()->id)->where('key', 'ress5')->decrement('value', $Technologie->ress5);

        }

        return redirect('technologie');

    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }
}
