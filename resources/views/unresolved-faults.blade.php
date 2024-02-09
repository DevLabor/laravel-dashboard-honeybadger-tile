<x-dashboard-tile
    :position="$position"
    :fade="false"
    :refresh-interval="$refreshIntervalInSeconds">
    <div class="absolute inset-0 @if($unresolvedFaults) bg-warning @endif p-4">
        <div class="grid grid-rows-auto-1 h-full">
            @isset($title)
                <div class="tile-heading">
                    <h1 class="uppercase text-center font-bold @if($unresolvedFaults) text-white @endif">
                        {{ $title }}
                    </h1>
                    @isset($description)
                    <h2 class="uppercase text-xs @if($unresolvedFaults) text-white @endif text-opacity-50 text-center">
                        {{ $description }}
                    </h2>
                    @endisset
                </div>
            @endisset

            <div class="flex items-center justify-center">
                <p class="text-4xl text-center font-bold @if($unresolvedFaults) text-white @endif">{{ $unresolvedFaults }}</p>
            </div>
        </div>
    </div>
</x-dashboard-tile>
