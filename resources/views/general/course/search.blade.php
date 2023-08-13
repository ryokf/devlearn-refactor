@extends('layouts.home-layout')
@section('body')
    <div class="min-h-screen">

        @foreach ($course as $item)
            {{ $item->title }}
        @endforeach
    </div>
@endsection
