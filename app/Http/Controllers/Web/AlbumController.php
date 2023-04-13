<?php

namespace App\Http\Controllers\Web;

use App\Models\User;
use App\Models\Album;
use App\Traits\CustomHelpers;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreAlbumRequest;
use App\Http\Requests\UpdateAlbumRequest;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("Web.CreateAlbum");
    }

    public function show()
    {
        $results = [];
        $albums = Album::where('user_id', Auth::user()->id)->get();
        foreach ($albums as $album) {
            array_push($results, [
                'id' => $album->id,
                'name' => $album->name,
                'picturesCount' => $album->Picture->count(),
            ]);
        }

        // dd($results);
        return view("dashboard", compact('results'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAlbumRequest $request)
    {


        $users = User::find(Auth::user()->id);
        $album = $users->Album()->create([
            'name' => $request->name,
        ]);

        return redirect()->route('album.show', ['albumId' => $album->id]);
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit($albumId)
    {
        $Album = Album::where('id', $albumId)->where('user_id', Auth::user()->id)->first();
        return view('Web.EditAlbum', ['albumId' => $albumId], compact('Album'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAlbumRequest $request, $albumId)
    {

        Album::where('id', $albumId)->where('user_id', Auth::user()->id)->Update([
            'name' => $request->name
        ]);
        return back()->with('success', 'Edit Album successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($albumId)
    {
        $results = Album::find($albumId)->Picture()->count();
        if ($results == 0) {
            Album::where('id', $albumId)->where('user_id', Auth::user()->id)->delete();
            return redirect()->route('albums');
        }else{
            return back()->with('error', 'have pictures.');
        }
    }
}
