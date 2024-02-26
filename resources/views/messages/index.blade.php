@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <form method="get" action="/messages/">
            <button class="btn btn-primary">新しいチャットを始める</button>
        </form>
    </div>
    <div class="row py-2 my-2 border-top border-bottom">
        <div class="col-2">
            <img src="logo.jpg" class="w-100">
        </div>
        <div class="col-10">
            <div class="d-flex">
                <strong class="pe-2">ペライチ</strong>
                <div class="text-secondary pe-2">@peraichi</div>
                <div class="text-secondary">・2023年10月5日</div>
            </div>
            <div class="text-secondary">お世話になっております。～～</div>
        </div>
    </div>
</div>
@endsection
