@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Edit profile') }}</div>

                <div class="card-body">
                    <form method="post" enctype="multipart/form-data" action="/profile/{{ $user->id }}">
                        @csrf
                        @method('PATCH')

                        <div class="row mb-3">
                            <label for="description" class="col-md-4 col-form-label text-md-end">{{ __('description') }}</label>

                            <div class="col-md-6">
                                <input id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') ?? $user->profile->description }}" autofocus>

                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="d-flex">
                            <div class="col-2">
                                <img src="/storage/{{ old('image') ?? $user->profile->image}}" class="w-100 rounded-circle">
                            </div>
                            <label style="color: #AAAAAA; padding: 10px;"><i class="fa-regular fa-image"></i></label>
                            <input id="image" type="file" class="form-control @error('image') is-invalid @enderror" name="image" value="{{ old('image') }}" autofocus>
                            @error('image')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="row mb-0 pull-right">
                            <div class="col-md-6 offset-md-4 pull-right">
                                <button type="submit" class="btn btn-primary ">
                                    {{ __('Save') }}
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
