<div>
    <a href="{{ route('course.detail', $id) }}">
    <div class="rounded-xl overflow-hidden shadow-lg bg-white h-96 dark:bg-[#303150] dark:text-white dark:shadow-none">
    <img src="{{ asset('storage/' . $photo) }}" class="w-full h-48 object-cover" />
    <div class="px-4 py-4">
        <span class="text-green-500 dark:text-emerald-500 font-semibold"> {{ $price == 0 ? 'Gratis' : 'Rp.' . $price }} </span>
        <div class="mb-4 text-xs">
            <a href="{{ route('course.detail', $id) }}">
                <h2 class="text-lg font-medium hover:text-blue-700 dark:hover:text-blue-500">
                    {{ $title }}
                </h2>
            </a>

            <p class="text-gray-400 mt-2">{{ $count }} Lesson</p>
        </div>
        <div class="text-left mb-4">
            <span class="bg-[#FFE7D2] text-[#FF8D3F] p-2 rounded text-[10px] font-semibold">
                {{ $category }}
            </span>
        </div>
    </div>
    </div>
    </a>
</div>

{{-- <div>
    <a href="{{ route('course.detail', $id) }}" class="">
        <div
            class="rounded-xl overflow-hidden shadow hover:shadow-lg transition bg-white h-96 dark:bg-[#303150] dark:text-white dark:shadow-none">
            <img src="{{ asset('storage/' . $photo) }}" class="w-full h-48 object-cover" />
            <div class="px-4 py-4">
                <span class="text-zinc-500 dark:text-zinc-500 text-sm font-medium"> {{ $category }} </span>
                <div class="my-2 text-xs">

                    <h2 class="text-lg font-semibold min-h-fit">
                        {{ $title }}
                    </h2>


                    {{-- <p class="text-gray-400 mt-2">{{ $count }} Lesson</p>
                </div>
                <div class="text-left mb-4">
                    <span class=" text-blue-500 rounded font-semibold">
                        {{ $price == 0 ? 'Gratis' : 'Rp.' . $price }}
                    </span>
                </div>
            </div>
        </div>
    </a>
</div> --}}
