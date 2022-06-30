@extends('layouts.app')

@section('content')


<div class="container">
    @if(Session::has('flash_error'))
    <div class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert">×</button>
        {{ Session::get('flash_error') }}
    </div>
@endif


@if(Session::has('flash_success'))
    <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert">×</button>
        {{ Session::get('flash_success') }}
    </div>
@endif
    <div class="row justify-content-center">
        <div class="col-md-12">
           <div class="card">
                <div class="card-header">{{ __('Poststor') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('poststore') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Post') }}</label>

                            <div class="col-md-6">
                                <textarea id="description" class="form-control" name="description" value="{{ old('description') }}" required autocomplete="description" autofocus></textarea>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Submit') }}
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
