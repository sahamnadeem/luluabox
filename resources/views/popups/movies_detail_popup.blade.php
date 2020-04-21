@if(isset($movie))
    <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal_scrollableatc{{ $movie->id }}" style="border: 1px solid grey;">Details</button>
    <div id="modal_scrollableatc{{ $movie->id }}" class="modal fade" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">


                <div style="overflow: hidden; z-index: 999;">
                    <button type="button" class="close" data-dismiss="modal" style="z-index: 9; position: relative; float: right; margin: 10px;">&times;</button>
                    <div style="background-color:black; opacity: 0.3; z-index: 5; width: 100%; height: 300px; position:absolute; ">
                    </div>
                    <div style="width: 100%; height: 300px; background-position: center; background-repeat: no-repeat; background-size: cover; position: relative; background-image: url('{{ $movie->cover }}');">
                    </div>
                </div>

                <br/>
                <div class="modal-body py-0">
                    <div class="modal-body py-0">
                        <h1 style="text-align: center; margin: 1em;">{{ $movie->title }}</h1>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label style="font-size:1.2rem;">Title</label>
                                        <h6 style="color: grey;">{{ $movie->title }}</h6>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label style="font-size:1.2rem;">Director</label>
                                        <h6 style="color: grey;">{{ $movie->director }}</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label style="font-size:1.2rem;">Writer</label>
                                        <h6 style="color: grey;">{{ $movie->writer }}</h6>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label style="font-size:1.2rem;">Story</label>
                                        <h6 style="color: grey;">{{ $movie->story }}</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label style="font-size:1.2rem;">Details</label>
                                        <h6 style="color: grey;">{{ $movie->detail }}</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label style="font-size:1.2rem;">Price</label>
                                        <h6 style="color: grey;">{{ $movie->price }}</h6>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label style="font-size:1.2rem;">Trailer</label>
                                        <h6 style="color: grey;"><a href="{{ $movie->trailer }}">{{ $movie->trailer }}</a></h6>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label style="font-size:1.2rem;">Category</label>
                                        <h6 style="color: grey;">{{ $movie->category->title }}</h6>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label style="font-size:1.2rem;">Genre</label>
                                        <h6 style="color: grey;">{{ $movie->genre->title }}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endif
