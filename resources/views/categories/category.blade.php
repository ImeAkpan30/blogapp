@extends('layouts.app')

@section('title', '| Category')


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
                <div class="card-header regitrationcardheader shadow-sm text-center">Category</div>

                <div class="card-body">
                    
                    <form id="signup_form" method="POST" action="{{ url('/addCategory') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="category" class="col-md-4 registertext col-form-label text-md-right">{{ __('Enter Category') }}</label>

                            <div class="col-md-6">
                                <input id="category" type="category" class="rounded-pill rounder-1 form-control @error('category') is-invalid @enderror" name="category" value="{{ old('category') }}" required>

                                @error('category')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        

                       

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn allbtn rounder-1 rounded-pill">
                                    {{ __('Add Category') }}
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



<script type="text/javascript">
    $('#signup_form').parsley();
</script>


