@extends('layouts.layout')

@section('body')
    <h1>
        ini adalah home, anda login sebagai {{ request()->user()->roles[0]['name'] ?? 'tamu' }}
    </h1>

    {{-- @role('admin')
        Admin
    @endrole --}}

    {{-- @role('member')
        Admin
    @endrole --}}
@endsection
