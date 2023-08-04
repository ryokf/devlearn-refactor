@extends('layouts.layout')
@section('body')
    <x-dashboard-sidebar :menu=$menu />
    <div class="relative md:ml-72 bg-blueGray-50">

        <div class="relative bg-slate-800 md:pt-32 pb-32 pt-12">
        </div>
        <div class="px-4 md:px-10 mx-auto w-full -m-36 min-h-screen">
            <div class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded bg-white">
                <div class="rounded-t mb-0 px-4 py-3 border-0">
                    <div class="flex flex-wrap items-center">
                        <div class="relative w-full px-4 max-w-full flex-grow flex-1">
                            <h3 class="font-semibold text-lg text-blueGray-700">
                                Users Table
                            </h3>
                        </div>
                    </div>
                </div>
                <div class="block w-full overflow-x-auto">
                    <table class="items-center w-full bg-transparent border-collapse">
                        <thead class="bg-gray-100">
                            <tr>
                                <th scope="col"
                                    class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-blueGray-50 text-blueGray-500 border-blueGray-100">
                                    Name
                                </th>
                                <th scope="col"
                                    class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-blueGray-50 text-blueGray-500 border-blueGray-100">
                                    Email
                                </th>
                                <th scope="col"
                                    class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-blueGray-50 text-blueGray-500 border-blueGray-100">
                                    Action
                                </th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td scope="row"
                                        class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                        {{ $user->username }}
                                    </td>
                                    <td scope="row"
                                        class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                        {{ $user->email }}
                                    </td>
                                    <td scope="row"
                                        class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                        {{-- <a class="bg-blue-500 text-white active:bg-blue-600 text-xs font-bold uppercase px-3 py-1 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
                                    href="{{ route('admin.users.show', $user->id) }}">Roles</a>

                                <form class=" inline" action="{{ route('admin.users.destroy', $user->id) }}" method="POST"
                                    onsubmit="return confirm('Are you sure??')">
                                    @csrf
                                    @method('DELETE')
                                    <button
                                        class="bg-red-500 text-white active:bg-red-600 text-xs font-bold uppercase px-3 py-1 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
                                        type="submit">Delete</button> --}}
                                        </form>

                                    </td>
                            @endforeach
                            </tr>
                        </tbody>
                    </table>
                    <hr>
                    <div class="flex justify-between items-center py-3 px-6">
                        <div class="text-sm text-gray-700">
                            Showing {{ $users->firstItem() }} to {{ $users->lastItem() }} of {{ $users->total() }}
                            results
                        </div>
                        <div class="flex items-center gap-5">
                            <a href="  {{ $users->url(1) }}"><i class="fas fa-angle-double-left"></i>
                            </a>
                            <a href="  {{ $users->previousPageUrl() }}"><i class="fas fa-angle-left"></i>
                            </a>


                            <a href=" {{ $users->nextPageUrl() }}"> <i class="fas fa-angle-right"></i> </a>
                            <a href="  {{ $users->url($users->lastPage()) }}"><i class="fas fa-angle-double-right"></i>
                            </a>

                        </div>
                    </div>

                </div>

            </div>


        </div>
    </div>
@endsection
