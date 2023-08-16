<div class="flex items-start space-x-4 my-5">
    <img class="w-10 h-10 rounded-full" src="{{ $photo }}" alt="">
    <div class=" dark:text-white">
        <a href="{{ $userId }}">
            <div class="text-sm font-semibold">{{ $name }}</div>

            @if ($user->hasRole('author'))
                <i class="fa-solid fa-medal"></i>
            @endif

        </a>
        <div class="max-w-xl">{{ $comment }}</div>
        <div class="" id="accordion-collapse" data-accordion="collapse">
            <div class="flex gap-4">
                <a href="?replyTo={{ $id }}&name={{ $name }}#comment-form"
                    class="text-xs text-gray-400">balas</a>
                <span id="accordion-collapse-heading-{{ $id }}"
                    data-accordion-target="#accordion-collapse-body-{{ $id }}" aria-expanded="false"
                    aria-controls="accordion-collapse-body-1" class="text-xs text-gray-40 cursor-pointer">
                    @if (count($replyCount) == 0)
                        belum ada balasan
                    @else
                        lihat {{ count($replyCount) }} balasan
                    @endif
                </span>
            </div>
            <div id="accordion-collapse-body-{{ $id }}" class="hidden border-l pl-2"
                aria-labelledby="accordion-collapse-heading-{{ $id }}">
                @foreach ($replyCount as $reply)
                    <x-reply-comment-section :id="$reply->user_id" :name="$reply->user->name" :photo="$reply->user->photo" :replyTo="$name"
                        :reply="$reply->reply"></x-reply-comment-section>
                @endforeach
            </div>
        </div>
    </div>
</div>


{{-- <div id="accordion-collapse" data-accordion="collapse">
    <h2 id="accordion-collapse-heading-1">
        <button type="button"
            class="flex items-center justify-between w-full p-5 font-medium text-left text-gray-500 border border-b-0 border-gray-200 rounded-t-xl focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800"
            data-accordion-target="#accordion-collapse-body-1" aria-expanded="true"
            aria-controls="accordion-collapse-body-1">
            <span>What is Flowbite?</span>
            <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true"
                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M9 5 5 1 1 5" />
            </svg>
        </button>
    </h2>
    <div id="accordion-collapse-body-1" class="hidden" aria-labelledby="accordion-collapse-heading-1">
        <div class="p-5 border border-b-0 border-gray-200 dark:border-gray-700 dark:bg-gray-900">
            <p class="mb-2 text-gray-500 dark:text-gray-400">Flowbite is an open-source library of interactive
                components built on top of Tailwind CSS including buttons, dropdowns, modals, navbars, and more.</p>
            <p class="text-gray-500 dark:text-gray-400">Check out this guide to learn how to <a
                    href="/docs/getting-started/introduction/"
                    class="text-blue-600 dark:text-blue-500 hover:underline">get started</a> and start developing
                websites even faster with components on top of Tailwind CSS.</p>
        </div>
    </div>
</div> --}}
