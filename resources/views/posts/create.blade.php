@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Create new post') }}</div>

                <div class="card-body">
                    <form method="POST" enctype="multipart/form-data" action="/p">
                        @csrf

                        <div class="row mb-3">
                            <div class="col-md-2">
                                <img src="" class="rounded-circle w-100">
                            </div>
                            <div class="col-md-10">
                                <textarea id="caption" type="text" rows="3" class="form-control @error('caption') is-invalid @enderror" name="caption" value="{{ old('caption') }}" autofocus></textarea>

                                @error('caption')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                                <div class="d-flex">
                                    <label style="color: #AAAAAA; padding: 10px;"><i class="fa-regular fa-image"></i></label>
                                    <input id="image" type="file" class="form-control @error('image') is-invalid @enderror" name="image" value="{{ old('image') }}" autofocus>
                                    @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                               
                                
                            </div>

                        
                        </div>

                        <div class="row mb-0 pull-right">
                            <div class="col-md-6 offset-md-4 pull-right">
                                <button type="submit" class="btn btn-primary ">
                                    {{ __('Post') }}
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
