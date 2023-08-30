<div
        class="md:hidden fixed bottom-0 left-0 z-50 w-full h-16 bg-white border-t border-black dark:bg-[#303150]">
        <div class="px-4 grid h-full w-full grid-cols-4 mx-auto font-medium">
            @foreach ($menu as $route => $content)
                <a href="{{ $route }}"
                    class="font-medium flex items-center justify-center text-sm duration-100
                            @if (request()->getPathInfo() == $route) {{ 'text-blue-400' }}
                            @else
                            {{ 'hover:text-blue-400 text-zinc-500' }} @endif
                        ">
                    <i class="{{ $content[1] }} text-lg opacity-75"></i>
                </a>
            @endforeach
        </div>
    </div>
