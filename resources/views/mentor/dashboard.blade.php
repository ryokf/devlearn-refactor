@extends('layouts.layout')

@section('body')
    <x-dashboard-sidebar :menu=$menu/>

    <h1>
        ini adalah dashboard, anda login sebagai {{ request()->user()->roles[0]['name'] ?? 'tamu' }}
    </h1>
@endsection
