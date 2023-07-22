@extends('layouts.main')
@section('content')
    <section class="sm:px-24 mt-16 pt-16">
        <p class="w-full text-2xl font-semibold text-center">Checkout Course</p>
        <div class="flex md:flex-row flex-col w-full p-5 gap-5 lg:px-24 justify-center">


            <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <img class="rounded-t-lg flex-wrap w-full h-36" src="{{ asset('storage/' . $course->photo) }}"
                    alt="" />
                <div class="p-5">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                        {{ $course->title }}</h5>

                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                        {{ Str::limit($course->description, 100) }}</p>

                </div>
            </div>



            <div class="max-w-sm  bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">

                <div class="p-5">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                        Payment : </h5>
                    <div class="flex justify-between gap-16">
                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                            Course Price :
                        </p>
                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                            {{ $course->price }}
                        </p>

                    </div>
                    <div class="flex justify-between gap-16">
                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                            Discount :
                        </p>
                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                            0
                        </p>

                    </div>
                    <hr class="py-2">
                    <div class="flex justify-between gap-20">
                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                            Total Payment :
                        </p>
                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                            {{ $course->price }}
                        </p>

                    </div>

                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                        Payment Receipt : </h5>
                    <form action="{{ route('payment') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Upload
                            file</label>
                        <input name="payment_receipt"
                            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                            aria-describedby="file_input_help" id="file_input" type="file">
                        <input name="course_id" type="hidden" value="{{ $course->id }}">
                        <button type="submit"
                            class="mt-2 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                    </form>




                </div>
            </div>



    </section>


    <section class="my-20"></section>
@endsection
