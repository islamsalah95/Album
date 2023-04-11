@extends('layoutsWebsite/Header')
@include('layoutsWebsite/nav')


<div class="container">
  <div class="row" style="
  display: flex;
  align-content: center;
  justify-content: center;
  ">
  <div class="col-4" style="text-align: center">
  <h2>Move Albums</h2>
  <form action="{{route('picture.move',['albumId'=>$albumId])}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT') 
    <select style="background-color: black;" name="album_id" class="form-select" aria-label="Default select example">
      <option  selected>Open this select menu</option>
      @forelse ($allAlbums as $allAlbum)
      <option  value="{{$allAlbum->id}}">{{ $allAlbum->name }}</option>
      @empty
          <h2>No albums</h2>
      @endforelse
        </select>
    <button type="submit"  class="btn btn-primary">Move</button>
  </form>
</div>
</div>
</div>


@extends('layoutsWebsite/Footer')

