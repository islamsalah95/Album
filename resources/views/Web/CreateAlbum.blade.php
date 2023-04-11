@extends('layoutsWebsite/Header')
@include('layoutsWebsite/nav')


<div class="container">
    <div class="row" style="
    display: flex;
    align-content: center;
    justify-content: center;
    ">
    <div class="col-4" style="text-align: center">
    <h2>Add Album</h2>
    <form action="{{route('store.album')}}" method="post" enctype="multipart/form-data">
        @csrf
      <div class="form-group">
        <label for="name">Name</label>
        <input type="name" class="form-control" id="name" placeholder="Enter Album name" name="name">
        @if ($errors->has('name'))
        <span class="text-danger">{{ $errors->first('name') }}</span>
    @endif
      </div>
      <button type="submit"  class="btn btn-primary">Add</button>
    </form>
  </div>
</div>
</div>


@extends('layoutsWebsite/Footer')

