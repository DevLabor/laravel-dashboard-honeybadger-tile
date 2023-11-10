<x-dashboard-tile
    :position="$position"
    :fade="false"
    :refresh-interval="$refreshIntervalInSeconds">
    <div class="absolute inset-0 @if($unresolvedFaults || $offlineSites) bg-error @endif p-4">
        <div class="grid grid-rows-auto-1 h-full">
            @isset($title)
                <div class="tile-heading">
                    <h1 class="uppercase text-center font-bold @if($unresolvedFaults || $offlineSites) text-white @endif">
                        {{ $title }}
                    </h1>
                </div>
            @endisset
            <div class="flex">
                <div class="grid grid-rows-auto-1 w-1/2 h-full">
                    @isset($description_faults)
                    <h2 class="uppercase text-xs @if($unresolvedFaults || $offlineSites) text-white @endif text-opacity-50 text-center">
                        {{ $description_faults }}
                    </h2>
                    @endisset
                    <div class="flex items-center justify-center">
                        <p class="text-4xl text-center font-bold @if($unresolvedFaults || $offlineSites) text-white @endif">{{ $unresolvedFaults }}</p>
                    </div>
                </div>
                <div class="grid grid-rows-auto-1 w-1/2 h-full">
                    @isset($description_offline)
                    <h2 class="uppercase text-xs @if($unresolvedFaults || $offlineSites) text-white @endif text-opacity-50 text-center">
                        {{ $description_offline }}
                    </h2>
                    @endisset
                    <div class="flex items-center justify-center">
                        <p class="text-4xl text-center font-bold @if($unresolvedFaults || $offlineSites) text-white @endif">{{ $offlineSites }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-dashboard-tile>
