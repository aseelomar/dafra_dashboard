@extends('layouts.site')

@section('title')

 من نحن

@endsection

@section('content')
    <div class="welcome-container welcome-container-mobile">
        {!! $page->content !!}
    </div>
@endsection
