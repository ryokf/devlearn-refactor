@extends('layouts.layout')

@section('body')
    <x-dashboard-sidebar :menu=$menu></x-dashboard-sidebar>
    <div class="pb-12">
        <div class="relative bg-slate-800 md:pt-32 pb-40 -z-50">

            <x-dashboard-header></x-dashboard-header>
        </div>
        <div class="md:ml-72 mx-auto sm:px-6 lg:px-8 space-y-6 -mt-36">
            @include('profile.partials.update-profile-information-form')
            @include('profile.partials.update-password-form')
        </div>
    </div>
@endsection
