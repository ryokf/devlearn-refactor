@extends('author.layout')

@section('body')
<div class="pb-12">
    <div class="relative bg-primary md:pt-32 pb-40 -z-50">

        <x-author_header></x-author_header>
    </div>
    <div class="md:ml-72 mx-auto sm:px-6 lg:px-8 space-y-6 -mt-36">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>


@endsection
