<?php
namespace App\Http\Controllers\Web;

use App\Models\Album;
use App\Models\Picture;
use App\Traits\CustomHelpers;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePictureRequest;
use App\Http\Requests\UpdatePictureRequest;
use Illuminate\Support\Facades\Auth;

class PictureController extends Controller
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
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePictureRequest $request,$albumId)
    {

        $exist=Album::where('id', $albumId)->exists();

        if($exist){
            $name=CustomHelpers::uploadImgNull($request,'file');

            if ($name) {
                Picture::create([
                    'name' =>  $name,
                    'album_id' => $albumId
                ]);
                return redirect()->back()->with('success', 'Your data has been saved.');
    
            }
        }else {
            return response()->json(['error' => 'id not found'], 404);
        }

 
 
    }

    /**
     * Display the specified resource.
     */


    public function show($albumId)
    {
        $AlbumPictures=Picture::where('album_id',$albumId)->get();
        return view("Gallary",compact('AlbumPictures'),["albumId"=>$albumId]);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($albumId)
    {
        $allAlbums=Auth::user()->Album;
        // dd($allAlbums);
        return view("Web.movePicture",compact('allAlbums'),['albumId'=>$albumId]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePictureRequest $request,$AlbumId)
    {
        $album = Album::find($AlbumId);

        $album->Picture()->Update([
            'album_id' => $request->album_id
        ]);
        return redirect()->route('albums');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroyAllPictures($AlbumId)
    {
        $album = Album::find($AlbumId);
        $results=$album->Picture;
        foreach ($results as $result) {
            CustomHelpers::deletePicture($result->name);     
           }
        $album->Picture()->delete();
        return redirect()->route('albums');

    }

    public function deleteSinglePic($picId)
    {
      $picture=Picture::where('id',$picId)->first();
      CustomHelpers::deletePicture($picture->name);     
      $picture->delete();
    return redirect()->back()->with('success', 'Your pic has been delete.');

    }
}
