<div class="w-full lg:w-6/12 xl:w-3/12 px-4 text-white">
    <div class="relative flex flex-col min-w-0 break-words {{ $iconBgColor }} rounded-xl overflow-hidden mb-6 xl:mb-0 shadow-lg">
        <div class="flex-auto  pt-4">
            <div class="flex flex-wrap px-4">
                <div class="relative w-full pr-4 max-w-full flex-grow flex-1">
                    <h5 class="text-blueGray-400 uppercase font-semibold text-xs">
                        {{ $title }}
                    </h5>
                    <span class="font-medium text-xl text-blueGray-700">
                        {{ $value }}
                    </span>
                </div>
                <div class="relative w-auto pl-4 flex-initial">
                    <div
                        class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 shadow-lg rounded-full bg-white bg-opacity-30 backdrop-blur-lg">
                        <i class="{{ $icon }}"></i>
                    </div>
                </div>
            </div>
            <p class="text-sm text-blueGray-400 mt-4 bg-white bg-opacity-40 backdrop-blur-lg p-2">
                @if ($arrow)
                    <span class="text-emerald-500 mr-1">
                        <i class="fas fa-arrow-up"></i> {{ number_format($percentage, 1) }}%
                    </span>
                @else
                    <span class="text-red-500 mr-1">
                        <i class="fas fa-arrow-down"></i> {{ number_format($percentage, 1) }}%
                    </span>
                @endif
                <span class="whitespace-nowrap">
                    sejak bulan lalu
                </span>
            </p>
        </div>
    </div>
</div>
