<div>
    <a href="{{ route('course.show', $id) }}">
    <div class="rounded-lg overflow-hidden shadow-lg bg-white h-96">
    <img src="{{ 'https://source.unsplash.com/random/' . mt_rand(3,8) * 100 .  "x" . mt_rand(3,8) * 100 }}" class="w-full h-48 object-cover" />
    <div class="px-4 py-4">
        <span class="text-green-600 font-bold"> Rp.{{ $price }} </span>
        <div class="mb-4 text-xs">
            <a href="{{ route('course.detail', $id) }}">
                <h2 class="text-base font-medium hover:text-blue-700">
                    {{ $title }}
                </h2>
            </a>

            <p class="text-gray-400 mt-2">{{ $count }} Lesson</p>
        </div>
        <div class="text-left mb-4">
            <span class="bg-[#FFE7D2] text-[#FF8D3F] p-2 rounded text-[10px] font-bold">
                {{ $category }}
            </span>
        </div>
    </div>
    </div>
    </a>
</div>
