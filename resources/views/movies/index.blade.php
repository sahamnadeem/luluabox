@extends('layouts.app')

@section('title', 'Movie Management')

@push('before-styles')
    <link href="{{ asset('css/layout.min.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
@endpush

@push('after-scripts')
    <script src="{{ asset('js/plugins/extensions/jquery_ui/interactions.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
    <script src="{{ asset('js/plugins/tables/datatables/datatables.min.js') }}"></script>
    <script src="{{ asset('js/plugins/forms/selects/select2.min.js') }}"></script>
    <script src="{{ asset('js/plugins/tables/datatables/extensions/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('js/plugins/tables/datatables/extensions/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('js/plugins/tables/datatables/extensions/pdfmake/vfs_fonts.min.js') }}"></script>
    <script src="{{ asset('js/plugins/tables/datatables/extensions/buttons.min.js') }}"></script>

    <script src="{{ asset('js/myapp.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>
    <script src="{{ asset('js/demo_pages/datatables_extension_buttons_html5.js') }}"></script>
    <script src="{{ asset('js/plugins/forms/styling/uniform.min.js') }}"></script>
    <script src="{{ asset('js/plugins/forms/selects/bootstrap_multiselect.js') }}"></script>
    <script src="{{ asset('js/demo_pages/form_multiselect.js') }}"></script>
@endpush

@section('content')
    @include('includes.navbar')
    <!-- Page content -->
    <div class="page-content" style="margin-top: 0px; ">
        <!-- Main sidebar -->
    @include('includes.sidebar')
    <!-- /main sidebar -->
        <!-- Main content -->
        <div class="content-wrapper">
            <!-- Page header -->
            @include('includes.pageheader');
            <!-- /page header -->
            <!-- Content area -->
            <div class="content">
                <!-- Dashboard content -->
                <div class="row">
                    <div class="col-xl-12">
                        <!-- Quick stats boxes -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header header-elements-inline">
                                        <h6 class="card-title">{{ (isset($cat)? 'Update':'Add') }} Movie</h6>
                                        <div class="header-elements">
                                            <div class="list-icons">
                                                <a class="list-icons-item" data-action="collapse"></a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card-body">
                                        @if(isset($movie))
                                            {{ Form::model($movie,['method'=>'put','route' => ['movies.update',$movie->id], 'files'=>true]) }}
                                        @else
                                            {{ Form::open(['route' => 'movies.store', 'files'=>true]) }}
                                        @endif
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    {{ Form::label('title','Title') }}<span style="color: red;">*</span>
                                                    {{ Form::text('title',old('title'),array('class'=>'form-control', 'style'=> 'margin-bottom:10px;','placeholder'=>'Enter title')) }}
                                                    {!! $errors->first('title', '<label id="title-error" class="error" for="title">:message</label>') !!}
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    {{ Form::label('director','Director') }}<span style="color: red;">*</span>
                                                    {{ Form::text('director',old('director'),array('class'=>'form-control', 'style'=> 'margin-bottom:10px;','placeholder'=>'Enter director name')) }}
                                                    {!! $errors->first('director', '<label id="director-error" class="error" for="director">:message</label>') !!}
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    {{ Form::label('writer','Writer') }}<span style="color: red;">*</span>
                                                    {{ Form::text('writer',old('writer'),array('class'=>'form-control', 'style'=> 'margin-bottom:10px;','placeholder'=>'Enter writer name')) }}
                                                    {!! $errors->first('writer', '<label id="writer-error" class="error" for="writer">:message</label>') !!}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    {{ Form::label('story','Story') }}<span style="color: red;">*</span>
                                                    {{ Form::text('story',old('story'),array('class'=>'form-control', 'style'=> 'margin-bottom:10px;','placeholder'=>'Enter story writer name')) }}
                                                    {!! $errors->first('story', '<label id="story-error" class="error" for="story">:message</label>') !!}
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    {{ Form::label('price','Price') }}<span style="color: red;">*</span>
                                                    {{ Form::text('price',old('price'),array('class'=>'form-control', 'style'=> 'margin-bottom:10px;','placeholder'=>'Enter price')) }}
                                                    {!! $errors->first('price', '<label id="price-error" class="error" for="price">:message</label>') !!}
                                                </div>
                                            </div>
                                        </div>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-group">
                                                        {{ Form::label('detail','Details') }}<span style="color: red;">*</span>
                                                        {{ Form::textarea('detail',old('detail'),array('class'=>'form-control', 'style'=> 'margin-bottom:10px;','placeholder'=>'Enter detail','rows'=>'3')) }}
                                                        {!! $errors->first('detail', '<label id="detail-error" class="error" for="detail">:message</label>') !!}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-group">
                                                        {{ Form::label('trailer','Trailer') }}<span style="color: red;">*</span>
                                                        {{ Form::text('trailer',old('trailer'),array('class'=>'form-control', 'style'=> 'margin-bottom:10px;','placeholder'=>'Enter trailer url')) }}
                                                        {!! $errors->first('trailer', '<label id="trailer-error" class="error" for="trailer">:message</label>') !!}
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        {{ Form::label('image','Image') }}<span style="color: red;">*</span>
                                                        {{ Form::file('image',array('class'=>'form-control', 'style'=> 'margin-bottom:10px;')) }}
                                                        {!! $errors->first('image', '<label id="image-error" class="error" for="image">:message</label>') !!}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-group">
                                                        {{ Form::label('category_id','Category') }}<span style="color: red;">*</span>
                                                        {{ Form::select('category_id',$categories ,old('category_id'),array('class'=>'form-control', 'style'=> 'margin-bottom:10px;','placeholder'=>'Select Category')) }}
                                                        {!! $errors->first('category_id', '<label id="category_id-error" class="error" for="category_id">:message</label>') !!}
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        {{ Form::label('genre_id','Genre') }}<span style="color: red;">*</span>
                                                        {{ Form::select('genre_id',$genre ,old('category_id'),array('class'=>'form-control', 'style'=> 'margin-bottom:10px;','placeholder'=>'Select Genre')) }}
                                                        {!! $errors->first('genre_id', '<label id="genre_id-error" class="error" for="genre_id">:message</label>') !!}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-group">
                                                        {{ Form::label('rmovies','Related Movies') }}<span style="color:red;"> (optional)</span>
                                                        <br/>
                                                        {{ Form::select('rmovies[]', $movies_list, (isset($movie))? old('rmovies',$movie->child) : '', array('class'=>'form-control multiselect-full-featured','multiple'=>'multiple','data-fouc')) }}
                                                        {!! $errors->first('rmovies', '<label id="rmovies-error" class="error" for="rmovies">:message</label>') !!}
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        {{ Form::label('tags','Tags') }}<span style="color:red;"> (optional)</span>
                                                        <br/>
                                                        {{ Form::select('tags[]', $tags, (isset($movie))? old('rmovies',$movie->tags) : '', array('class'=>'form-control multiselect-full-featured','multiple'=>'multiple','data-fouc')) }}
                                                        {!! $errors->first('tags', '<label id="tags-error" class="error" for="tags">:message</label>') !!}
                                                    </div>
                                                </div>
                                            </div>
                                        <div class="d-flex justify-content-end align-items-center">
                                            <button type="submit" name="submit" class="btn bg-blue ml-3">{{ (isset($cat)? 'Update':'Save') }}</button>
                                        </div>

                                        {{ Form::close() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div >
                                    <!-- Basic initialization -->
                                    <div class="card">
                                        <div class="card-header header-elements-inline">
                                            <h5 class="card-title">Movies List</h5>
                                            <div class="header-elements">
                                                <div class="list-icons">
                                                    <a class="list-icons-item" data-action="collapse"></a>
                                                </div>
                                            </div>
                                        </div>

                                        <table class="table" id="utable">
                                            <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Title</th>
                                                <th>Categort</th>
                                                <th>Genre</th>
                                                <th>Details</th>
                                                <th>Created at</th>
                                                <th>Actions</th>
                                            </tr>
                                            </thead>
                                        </table>
                                    </div>
                                    @push('after-scripts')
                                        <script>
                                            $(function() {
                                                $('#utable').DataTable({
                                                    processing: true,
                                                    serverSide: true,
                                                    autoWidth: false,
                                                    responsive: true,
                                                    ajax: '{!! route('movies.index') !!}',
                                                    columns: [
                                                        { data: 'DT_RowIndex', name: 'DT_RowIndex' },
                                                        { data: 'title', name: 'title' },
                                                        { data: 'category', name: 'category' },
                                                        { data: 'genre', name: 'genre' },
                                                        { data: 'details', name: 'details' },
                                                        { data: 'created_at', name: 'created_at' },
                                                        { data: 'actions', name: 'actions' }
                                                    ],
                                                    buttons: {
                                                        dom: {
                                                            button: {
                                                                className: 'btn btn-light'
                                                            }
                                                        },
                                                        buttons: [
                                                            'copyHtml5',
                                                            'excelHtml5',
                                                            'csvHtml5',
                                                            'pdfHtml5'
                                                        ]
                                                    }
                                                });
                                            });
                                        </script>
                                    @endpush
                                </div>
                                <!-- /basic initialization -->
                            </div>
                        </div>
                        <!-- /quick stats boxes -->
                    </div>
                </div>
                <!-- /dashboard content -->
            </div>
            <!-- /content area -->
            <!-- Footer -->
        @include('includes.footer')
        <!-- /footer -->

        </div>
        <!-- /main content -->

    </div>
@endsection

