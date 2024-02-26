@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mt-3 pb-2 border-bottom">
        <div class="col-1">
            <h3 class="text-purple fa-solid fa-star"></h3>
        </div>
        <div class="col-11 pt-2">
            <div class="d-flex">
                <div class="col-2 pe-2">
                    <a href="/profile/{{ $postSuggest->user->id }}">
                        <img src="{{ $postSuggest->user->profile->profileImage() }}" class="rounded-circle w-100">
                    </a>
                </div>
                <div>
                    <a href="/profile/{{ $postSuggest->user->id }}">
                        <h5 class="pe-2"><strong>{{ $postSuggest->user->username }}</strong></h5>
                        <p class="text-secondary pe-2">{{ $postSuggest->user->userid }}</p>
                    </a>
                  
                </div>                
            </div>
            <p>{{ $postSuggest->caption }}</p>
            @if($postSuggest->image)
            <div class="pb-2"><img src="/storage/{{ $postSuggest->image }}" class="w-100"></div>   
            @endif 
            <p class="text-secondary">{{ $postSuggest->created_at->format('Y年m月d日') }}</p>    
        </div>
    </div>
</div>

        
@endsection
