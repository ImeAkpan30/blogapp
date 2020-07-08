@extends('layouts.app')

@section('title', '| Contact Us')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg mastercard border-lg">
                <div class="card-header text-center regitrationcardheader shadow-sm"><span class="card_title">{{ __('Leave us a Message') }}</span> <i class="fa fa-contact color fa-2x" aria-hidden="true"></i></div>

                <div class="card-body regitrationcardbody">
                    <form method="POST" action="{{ url('/addContact') }}">
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
                            <label for="message" class="col-md-4 registertext col-form-label text-md-right">{{ __('Message') }}</label>

                            <div class="col-md-6">
                                <textarea id="message" rows="6" class="form-control @error('message') is-invalid @enderror" name="message" value="{{ old('message') }}" required autocomplete="message"></textarea>

                                @error('post_body')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn allbtn rounder-1 rounded-pill">
                                    {{ __('Send Message') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card-footer text-center footerheader ">
                    &copy;Copyright Ime Akpan 2020, All Rights Reserved
                    <div class="social-buttons">
                        <a href="https://www.facebook.com/MOSCOLYF">
                            <i class="fa fa-facebook-official"></i>
                        </a>
                        <a href="https://twitter.com/@ImeAkpan50">
                            <i class="fa fa-twitter-square"></i>
                        </a>
                        <a href="https://instagram.com/imeobongakpan?igshid=1alrnn6tflpi6">
                            <i class="fa fa-instagram"></i>
                        </a>        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
