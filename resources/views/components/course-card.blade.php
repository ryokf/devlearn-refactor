<div class="swiper-slide">
    <a href="{{ route('course.show', $id) }}">
        <div
            class="border border-gray-100 shadow-sm rounded shadow-md transition group-hover:shadow-lg">
            <img src="{{ asset('storage/' . $photo) }}" alt=""
                class="w-full rounded rounded-b-none" />
            <div class="mt-3 p-3">
                <div class="flex justify-between">
                    <div>
                        <span class="text-green-600 font-bold"> Rp.{{ $price }} </span>
                    </div>
                    <div>
                        <a href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                            </svg>
                        </a>
                    </div>
                </div>

                <div class="mt-4 mb-4 text-xs">
                    <h2 class="text-base mt-3 font-medium hover:text-blue-700">
                        {{ $title }}
                    </h2>
                    <p class="text-gray-400 mt-2">{{ $count }} Lesson</p>
                    <div class="flex mt-5 items-center">
                        <span
                            class="bg-[#FFE7D2] text-[#FF8D3F] p-2 rounded text-[10px] font-bold">
                            {{ $category }}
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </a>
</div>
