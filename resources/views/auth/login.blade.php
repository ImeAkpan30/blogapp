@extends('layouts.app')

@section('title', '| Login')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg mastercard border-lg">
                <div class="card-header text-center regitrationcardheader shadow-sm"><span class="card_title">{{ __('Login') }}</span> <i class="fa fa-user-circle-o color float-right fa-2x" aria-hidden="true"></i></div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email"  class="col-md-4 registertext col-form-label text-md-right">{{ __('E-Mail Address') }}<span class="required">*</span></label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="rounded-pill rounder-1 form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 registertext col-form-label text-md-right">{{ __('Password') }}<span class="required">*</span></label>

                            <div class="col-md-6">
                                <input id="myInput" type="password" class="rounded-pill rounder-1 form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                <span toggle="#myInput" onclick="myFunction()" class="fa fa-fw  fa-eye field-icon toggle-myInput"></span>
                                {{-- <input type="checkbox" onclick="myFunction()">Show Password --}}
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label registertext" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn allbtn col-12  rounder-1 rounded-pill">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link registertext" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
