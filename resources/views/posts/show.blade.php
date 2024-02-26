@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mt-3 pb-2 border-bottom">
        
        <div class="col-12 pt-2">
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
            </div>
            <p>{{ $post->caption }}</p>
            @if($post->image)
            <div class="pb-2"><img src="/storage/{{ $post->image }}" class="w-100"></div>   
            @endif 
            <p class="text-secondary">{{ $post->created_at->format('Y年m月d日') }}</p>    
        </div>
    </div>
</div>

        
@endsection
