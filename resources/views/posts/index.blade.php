@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mt-3 pb-5 border-bottom">
        <form method="POST" enctype="multipart/form-data" action="/p" class="border-bottom pb-3">
            @csrf

            <div class="row mb-3 ">
                <div class="col-2">
                    <img src="{{auth()->user()->profile->profileImage() }}" class="rounded-circle w-100">
                </div>
                <div class="col-10">
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

        @foreach( $posts as $post )
  
        <div class="col-12 pt-5 border-bottom">
            <div class="d-flex">
                <div class="col-2 pe-2">
                    <a href="/profile/{{ $post->user->id }}">
                        <img src="{{ $post->user->profile->profileImage() }}" class="rounded-circle w-100">
                    </a>
                </div>
                <div>
                    <a href="/profile/{{ $post->user->id }}">
                        <h5 class="pe-2"><strong>{{ $post->user->username }}</strong></h5>
                        <p class="text-secondary pe-2">{{ $post->user->userid }}</p>
                    </a>
                  
                </div>  
                <div><p class="text-secondary">・{{ $post->created_at->format('Y年m月d日') }}</p> </div>              
            </div>
            <a href="/p/{{ $post->id }}" class="text-dark text-decoration-none"><p class="text-break">{{ $post->caption }}</p></a>
            @if($post->image)
            <a href="/p/{{ $post->id }}"><div class="pb-5"><img src="/storage/{{ $post->image }}" class="w-100"></div></a>
            @endif 
               
        </div>
        @endforeach
    </div>
    <div class="row">
            <div class="py-2 col-12 w-100 d-flex justify-content-center">
                {{ $posts->links('vendor.pagination.bootstrap-5') }}
            </div>
        
    </div>
    
</div>

        
@endsection
