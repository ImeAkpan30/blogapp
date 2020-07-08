@extends('layouts.app')

@section('title', '| Profile')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if (session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif
            <div class="card shadow-lg mastercard border-lg">
                <div class="card-header regitrationcardheader shadow-sm text-center">Add Profile</div>

                <div class="card-body">

                    <form method="POST" action="{{ url('/addProfile') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 registertext col-form-label text-md-right">{{ __('Enter Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="name" class="rounded-pill rounder-1 form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="designation" class="col-md-4 registertext col-form-label text-md-right">{{ __('Enter Designation') }}</label>

                            <div class="col-md-6">
                                <input id="designation" type="input" class="rounded-pill rounder-1 form-control @error('designation') is-invalid @enderror" name="designation" required autocomplete="designation">

                                @error('designation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="profile_pic" class="col-md-4 registertext col-form-label text-md-right">{{ __('Profile Picture') }}</label>

                            <div class="col-md-6">
                                <input id="profile_pic" type="file" class="rounded-pill rounder-1 form-control @error('profile_pic') is-invalid @enderror" name="profile_pic" required autocomplete="profile_pic">

                                @error('profile_pic')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn rounder-1 rounded-pill allbtn">
                                    {{ __('Add Profile') }}
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
