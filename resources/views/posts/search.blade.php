@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <form action="/search" method="GET">
        @csrf
        <div class="col-12">
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-magnifying-glass"></i></span>
                <input type="text" class="form-control" value="{{ $keyword }}" name="keyword" placeholder="search" aria-label="Username" aria-describedby="basic-addon1">
            </div>
        </div>
        </form>

        <div class="row border-bottom">
            <h3>ユーザー</h3>
            @foreach( $users as $user )
            <div class="row d-flex justify-content-between">
                <div class="col-2">
                    <img src="{{ $user->profile->profileImage() }}" class="rounded-circle w-100 ">
                </div>
                <div class="col-10">
                    <h4><strong>{{ $user->username }}</strong></h4>
                    <p class="text-secondary">{{ $user->userid }}</p>
                    <p class="">{{ $user->profile->description }}</p>
                </div>
                    
            </div>
            @endforeach
        </div>
        

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

        <div class="py-2 col-12 w-100 d-flex justify-content-center">
            {{ $posts->links('vendor.pagination.bootstrap-5') }}
        </div>
    </div>
</div>

        
@endsection
