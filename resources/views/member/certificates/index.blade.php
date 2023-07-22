@extends('layouts.main')
@section('content')
    <div class="p-32">
        <form method="post"
            action="{{ route('downloadCertificate', ['course_id' => $certificate->course_id, 'user_id' => $certificate->user_id]) }}">
            @csrf
            <button type="submit" class="bg-primary p-2 text-white border border-white rounded-md">Download PDF</button>

        </form>
        <div class="bg-gray-100 border border-primary border-8">
            <div class="container mx-auto p-5 flex justify-center items-center h-[80%]">
                <div class="text-tan font-serif text-black text-center">
                    <div class="text-tan text-5xl mb-8">
                        <p class="text-bluegray-700">DEV<span class="text-teal-500">LEARN</span></p>
                    </div>

                    <div class="text-tan text-6xl mb-8">
                        Certificate of Completion
                    </div>
                    <div class="text-tan text-4xl mb-8">
                        {{ $certificate->course->title }}
                    </div>

                    <div class="mb-8">
                        This certificate is presented to
                    </div>

                    <div class="border-b-2 border-black text-4xl italic mb-8 w-96 mx-auto">
                        {{ $certificate->user->username }}
                    </div>

                    <div class="mb-8">
                        Completion Time : {{ $certificate->created_at }}
                    </div>

                </div>
            </div>
        </div>

    </div>
@endsection
