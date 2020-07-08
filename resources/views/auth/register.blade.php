@extends('layouts.app')

@section('title', '| Register')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg mastercard border-lg">
                <div class="card-header text-center regitrationcardheader shadow-sm"><span class="card_title">{{ __('Register') }}</span> <i class="fa fa-book color float-right fa-2x" aria-hidden="true"></i></div>

                <div class="card-body regitrationcardbody">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 registertext col-form-label text-md-right">{{ __('Name') }}<span class="required">*</span></label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="rounded-pill rounder-1 form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 registertext col-form-label text-md-right">{{ __('E-Mail Address') }}<span class="required">*</span></label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="rounded-pill rounder-1 form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

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
                                <input id="password" type="password" class="rounded-pill rounder-1 form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 registertext col-form-label text-md-right">{{ __('Confirm Password') }}<span class="required">*</span></label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="rounded-pill rounder-1 form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn allbtn rounder-1 rounded-pill">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
