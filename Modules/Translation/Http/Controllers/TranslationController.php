<?php

namespace Modules\Translation\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class TranslationController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $Translations = \App\Models\Translate::orderBy('updated_at', 'DESC')->get();

        return view('translation::index', compact('Translations'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('translation::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        \App\Models\Translate::create([
            'key' => $request->key,
            'value' => $request->value,
            'race' => $request->race,
            'lang' => $request->lang,
            'plural' => $request->plural
        ]);

        return redirect('translation/'. ( $request->id ?? null));
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        $Translations = \App\Models\Translate::orderBy('updated_at', 'DESC')->get();

        return view('translation::index', compact('Translations', 'id'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $Translation = \App\Models\Translate::where('id', $id)->first();

        return view('translation::edit', compact('Translation'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        \App\Models\Translate::where('id', $id)->update([
            'key' => $request->key,
            'value' => $request->value,
            'race' => $request->race,
            'lang' => $request->lang,
            'plural' => $request->plural
        ]);

        return redirect('translation/'. ( $request->id ?? null));
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
