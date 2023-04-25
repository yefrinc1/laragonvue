<?php

namespace App\Http\Controllers; 

use App\Models\Songs;
use Illuminate\Http\Request;
use Inertia\Inertia;

class SongsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $songs = Songs::all();
        return Inertia::render('Songs/Index', ['songs' => $songs]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'autor' => 'required',
            'album' => 'required',
        ]);
        $song = new Songs($request->input());
        $song->save();
        return redirect()->route('song.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Songs $songs)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Songs $songs)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $song = Songs::find($id);
        $song->fill($request->input())->saveOrFail();
        return redirect()->route('song.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $song = Songs::find($id);
        $song->delete();
        return redirect()->route('song.index');
    }
}
