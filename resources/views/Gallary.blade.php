@extends('layoutsWebsite/Header')
@include('layoutsWebsite/nav')


        <!-- MAIN POSTS -->
        <div class="main-posts">
            <div class="container">
                <div class="row">
                    <div class="blog-masonry masonry-true">
                        
                        @forelse ($AlbumPictures as $AlbumPicture)
    <div class="post-masonry col-md-4 col-sm-6">
        <div class="post-thumb">
            {{--  <img src="{{$AlbumPicture->name}}" alt="">  --}}
            <img src="{{asset('assets/images/'.$AlbumPicture->name)}}" alt="">

            <div class="title-over">
                <h4><a href="#">{{$AlbumPicture->name}}</a></h4>
            </div>
        </div>
        <form id="delete-form" action="{{ route('picture.deleteSinglePic', ['picId' => $AlbumPicture->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('DELETE')
            <button  type="submit" class="btn btn-danger">Delete</button>
          </form>
    </div> <!-- /.post-masonry -->
@empty
    <h2>No Pictures</h2>
@endforelse
                    </div>
                </div>
            </div>
        </div>

<div class="container">
    <h1 style="text-align: center">drag Pictures Here</h1>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="row justify-content-center">
    <div class="col-8">
<form method="post" action="{{route('picture.store',["albumId"=>$albumId])}}" enctype="multipart/form-data" class="dropzone" id="dropzone">
@csrf
</form>
    </div>
</div>
</div>

      
@extends('layoutsWebsite/Footer')

