@extends('layoutsWebsite/Header')
@include('layoutsWebsite/nav')


<div class="container">
  <div class="row" style="
  display: flex;
  align-content: center;
  justify-content: center;
  ">
  <div class="col-4" style="text-align: center">
  <h2>Edit Album</h2>
  <form action="{{route('albums.update',['albumId'=>$albumId])}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT') 
    <div class="form-group">
      <label for="name">Name</label>
      <input type="name" class="form-control" id="name" placeholder="Enter Album name" value="{{ $Album->name }}" name="name">
      @if ($errors->has('name'))
      <span class="text-danger">{{ $errors->first('name') }}</span>
  @endif
    </div>
    <button type="submit"  class="btn btn-primary">Edit</button>
  </form>
</div>
</div>
</div>


@extends('layoutsWebsite/Footer')



    