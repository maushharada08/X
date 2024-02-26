@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 d-flex">
            <a href="/"><i class="fa-solid fa-arrow-left"></i></a><h4>{{ $user->username }}</h4>
        </div>
    </div>
    <div class="row"><img src="/profile/1080x360.jpg"></div>
    <div class="row d-flex justify-content-between">
        <div class="col-4"><img src="{{ $user->profile->profileImage() }}" class="rounded-circle w-100 border border-4 border-dark" style="position:relative; top:-50%; left:20%;"></div>
        <div class="col-5 me-1 mt-2">
            @can('update', $user->profile)
                <a href="/p/create">
                    <div class="py-2"><i class="fa-solid fa-feather-pointed rounded-circle" style="width:30px;"></i></div>
                </a>
            @endcan

            @can('update', $user->profile)
            <a href="/profile/{{ $user->id }}/edit">
                <button class="btn btn-outline-secondary">プロフィールを編集</button>
            </a>
            @endcan
            @cannot('update', $user->profile)
            <form action="/messages" method="get">
                <button class="btn btn-outline-secondary">メッセージ</button>
            </form>
            @endcannot
        </div>
        
    </div>
    <div class="row border-bottom">
        <div class="d-flex align-items-center">
            <h4><strong>{{ $user->username }}</strong></h4>
            @cannot('update', $user->profile)
            <follow-button user-id="{{ $user->id }}" follows="{{ $follows }}"></follow-button>
            <!-- <button class="btn btn-primary mx-2">follow</button> -->
            @endcannot
        </div>
        <p class="text-secondary">{{ $user->userid }}</p>
        <p class="">{{ $user->profile->description }}</p>
        <div class="d-flex">
            <p class="text-secondary me-3">Tokyo-to, Japan</p>
            <p class="text-secondary">誕生日：1990年8月11日</p>
        </div>
        <p class="text-secondary">{{ $user->profile->created_at->format('Y年m月') }}からTwitterを利用しています</p>
        <div class="d-flex">
            <p class="text-secondary me-3"><strong class="text-dark">9</strong>フォロー中</p>
            <p class="text-secondary"><strong class="text-dark">184</strong>フォロワー</p>
        </div>

    </div>
    @foreach( $user->posts as $post )
    <div class="row mt-3 pb-2 border-bottom">
        
        <div class="col-2">
            <img src="{{ $user->profile->profileImage() }}" class="rounded-circle w-100">
        </div>
        <div class="col-10 pt-2">
            <div class="d-flex">
                <h5 class="pe-2"><strong>{{ $post->user->username }}</strong></h5>
                <p class="text-secondary pe-2">{{ $post->user->userid }}</p>
                <p class="text-secondary">・{{ $post->created_at->diffForHumans()}}</p>
            </div>
            <a href="/p/{{ $post->id }}" class="text-dark text-decoration-none">
                <p class="text-break">{{ $post->caption }}</p>
            </a>
            @if($post->image)
            <a href="/p/{{ $post->id }}" class="text-dark text-decoration-none">
                <div class="pb-2"><img src="/storage/{{ $post->image }}" class="w-100"></div>
            </a>
            @endif
        </div>
    </div>
    @endforeach
</div>

        
@endsection
