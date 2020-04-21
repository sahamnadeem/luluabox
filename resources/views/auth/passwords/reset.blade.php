@extends('layouts.app')

@section("title", "Reset Password")

@push('before-styles')
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
@endpush

@push('after-scripts')
    <link href="{{ asset('css/layout.min.css') }}" rel="stylesheet" type="text/css">
    <script src="{{ asset('js/myapp.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>
@endpush

@section('content')
<!-- Main navbar -->
<div class="navbar navbar-expand-md navbar-dark">
    <div class="navbar-brand">
        <a href="index.html" class="d-inline-block">
            <img src="../../../../global_assets/images/logo_light.png" alt="">
        </a>
    </div>

    <div class="d-md-none">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-mobile">
            <i class="icon-tree5"></i>
        </button>
    </div>

    <div class="collapse navbar-collapse" id="navbar-mobile">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
                <a href="#" class="navbar-nav-link">
                    <i class="icon-display4"></i>
                    <span class="d-md-none ml-2">Go to website</span>
                </a>
            </li>

            <li class="nav-item dropdown">
                <a href="#" class="navbar-nav-link">
                    <i class="icon-user-tie"></i>
                    <span class="d-md-none ml-2">Contact admin</span>
                </a>
            </li>

            <li class="nav-item dropdown">
                <a href="#" class="navbar-nav-link">
                    <i class="icon-cog3"></i>
                    <span class="d-md-none ml-2">Options</span>
                </a>
            </li>
        </ul>
    </div>
</div>
<!-- /main navbar -->


<!-- Page content -->
<div class="page-content">

    <!-- Main content -->
    <div class="content-wrapper">

        <!-- Content area -->
        <div class="content d-flex justify-content-center align-items-center">

            <!-- Password recovery form -->
            @if(isset($error))
                {{$error}}
            @endif
                <div class="card mb-0">
                    <div class="card-body">
                        <div class="text-center mb-3">
                            <i class="icon-spinner11 icon-2x text-warning border-warning border-3 rounded-round p-3 mb-3 mt-1"></i>
                            <h5 class="mb-0">Password recovery</h5>
                            <span class="d-block text-muted">We'll send you instructions in email</span>
                        </div>
                        {{ Form::open(['route' => 'password.update', 'method'=>'post','class'=>'login-form' ]) }}
                        <input type="hidden" name="token" value="{{ $token }}">
                        <div class="form-group form-group-feedback form-group-feedback-right">
                            <input id="email" type="email" class="form-control" name="email" value="{{ $email ?? old('email') }}" required autofocus placeholder="Enter Email Address">
                            @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                            @endif
                            <div class="form-control-feedback">
                                <i class="icon-mail5 text-muted"></i>
                            </div>
                        </div>
                        <div class="form-group form-group-feedback form-group-feedback-right">
                            <input id="password" type="password" class="form-control" name="password" required placeholder="Enter New Password">
                            @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                            @endif

                            <div class="form-control-feedback">
                                <i class="icon-lock5 text-muted"></i>
                            </div>
                        </div>
                        <div class="form-group form-group-feedback form-group-feedback-right">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required placeholder="Confirm Password">
                            <div class="form-control-feedback">
                                <i class="icon-mail5 text-muted"></i>
                            </div>
                        </div>

                        <button type="submit" class="btn bg-blue btn-block"><i class="icon-spinner11 mr-2"></i> Reset password</button>
                        {{ Form::close() }}
                    </div>
                </div>
            <!-- /password recovery form -->

        </div>
        <!-- /content area -->


        <!-- Footer -->
        <div class="navbar navbar-expand-lg navbar-light">
            <div class="text-center d-lg-none w-100">
                <button type="button" class="navbar-toggler dropdown-toggle" data-toggle="collapse" data-target="#navbar-footer">
                    <i class="icon-unfold mr-2"></i>
                    Footer
                </button>
            </div>

            <div class="navbar-collapse collapse" id="navbar-footer">
					<span class="navbar-text">
						&copy; 2019. <a href="#">Luluabox TV</a> by <a href="#" target="_blank">Orange Click</a>
					</span>
            </div>
        </div>
        <!-- /footer -->

    </div>
    <!-- /main content -->

</div>
<!-- /page content -->
@endsection
