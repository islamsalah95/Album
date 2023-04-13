@extends('layoutsWebsite/Header')
@include('layoutsWebsite/nav')
  <div class="container">
    
    <div class="row">
    <div class="col" 
    style="
    display: flex;
    justify-content: space-around;
    flex-direction: row;
    flex-wrap: wrap;
    align-content: center;
    "
    >
 
          @forelse ($results as $result)
          <div class="card" style="width: 18rem;" >
            <svg style="width: 165px;" version="1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" enable-background="new 0 0 48 48">
              <path fill="#FFA000" d="M40,12H22l-4-4H8c-2.2,0-4,1.8-4,4v8h40v-4C44,13.8,42.2,12,40,12z"/>
              <path fill="#FFCA28" d="M40,12H8c-2.2,0-4,1.8-4,4v20c0,2.2,1.8,4,4,4h32c2.2,0,4-1.8,4-4V16C44,13.8,42.2,12,40,12z"/>
          </svg>            <div class="card-body">
              <h5 class="card-title">{{ $result['name'] }} <span id="foo" data-foo="{{ $result['picturesCount'] }}">({{$result['picturesCount']}})</span></h5>

<div style="display: flex;">
  <a href="{{ route('album.show',['albumId'=>$result['id']])}}" class="btn btn-primary">View</a>
  <a href="{{ route('albums.edit',['albumId'=>$result['id']])}} }}" class="btn btn-primary">Edit</a>
  <form id="delete-form" action="{{ route('albums.delete', ['albumId' => $result['id']]) }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div id="album" data-album-id="{{ $result['id'] }}"></div>
    @method('DELETE')
    <button  type="submit" class="btn btn-danger">Delete</button>
  </form>

</div>


            </div>
          </div>
      @empty
          <h2>No albums</h2>
      @endforelse
    
    
    
        </div>
    
    </div>
    
    
    </div>


    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>


      $(document).ready(function() {
        $('#delete-form').on('submit', function(e) {
          e.preventDefault(); // prevent form submission
          var foo = $('#foo').data('foo');
          console.log(foo);
          if(foo ==0){
            // get form data
          var formData = new FormData(this);
          console.log(formData);
          // make AJAX request
          $.ajax({
            url: $(this).attr('action'),
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
              console.log(response);
              // handle success
            },
            error: function(xhr, status, error) {
              console.log(error);
              // handle error
            }
          });

          }else{
            Swal.fire({
              title: 'Do you want to save the changes?',
              showDenyButton: true,
              showCancelButton: true,
              confirmButtonText: 'move Pictures another album?',
              denyButtonText: `delete all pictures inside folder?`,
            }).then((result) => {
              /* Read more about isConfirmed, isDenied below */
              if (result.isConfirmed) {
              var albumId = $('#album').data('album-id');
              $.ajax({
                url: `/picture/edit/${albumId}`,
                type: 'get',
                data: { albumId: albumId },
                success: function(response) {
                  Swal.fire('Saved!', '', 'success')
                  window.location.href = `/picture/edit/${albumId}`;
                  console.log(response);
                },
                error: function(xhr, status, error) {
                  console.log(error);
                }
              });
                
              } 
              else if (result.isDenied) {
            var albumId = $('#album').data('album-id');
            // get form data
            var formData = new FormData(this);
            console.log(formData);
            // make AJAX request
            $.ajax({
              url:'/picture/delete/' + albumId,
              type: 'POST',
              data: formData,
              processData: false,
              contentType: false,
              success: function(response) {
                console.log(response);
                // handle success
              },
              error: function(xhr, status, error) {
                console.log(error);
                // handle error
              }
            });









              }
            })

          }

        });
      });


    </script>
    
    @extends('layoutsWebsite/Footer')


