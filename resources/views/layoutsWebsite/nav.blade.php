<!-- SITE TOP -->
<div class="site-top">
    <div class="site-header clearfix">
        <div class="container">
            <div class="social-icons pull-right">
                <ul>
                    <li><a href="#" class="fa fa-facebook"></a></li>
                    <li><a href="#" class="fa fa-twitter"></a></li>
                    <li><a href="#" class="fa fa-behance"></a></li>
                    <li><a href="#" class="fa fa-dribbble"></a></li>
                    <li><a href="#" class="fa fa-google-plus"></a></li>



                    <li>
                        <form action="{{route('albums')}}" method="get">
                            @csrf
                            <button type="submit" class="btn btn-primary">
                                albums
                            </button>
                           </form>
                    </li>

                    <li>
                        <form action="{{route('create.Album')}}" method="get">
                            @csrf
                            <button type="submit" class="btn btn-primary">
                               Add Album
                            </button>
                           </form>
                    </li>
                    <li>
                        <form action="{{route('logout')}}" method="post">
                            @csrf
                            <button type="submit" class="btn btn-danger">
                               logout
                            </button>
                           </form>
                    </li>

                </ul>

                    
                </button>

            </div>
        </div>
    </div> <!-- .site-header -->
    <div class="site-banner">
        <div class="container">
            <div class="row">
                <div class="col-md-offset-2 col-md-8 text-center">
                    @if(Session::has('success'))
                    <div class="alert alert-success">
                        {{ Session::get('success') }}
                        @php
                            Session::forget('success');
                        @endphp
                    </div>
                @endif
                </div>
            </div>
        </div>
    </div> <!-- .site-banner -->

</div> <!-- .site-top -->