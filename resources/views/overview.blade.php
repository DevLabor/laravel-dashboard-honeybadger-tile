<x-dashboard-tile
    :position="$position"
    :fade="false"
    :refresh-interval="$refreshIntervalInSeconds">
    <div class="absolute inset-0 p-4">
        <div class="grid grid-rows-auto-1 h-full">
            @isset($title)
                <div class="tile-heading">
                    <h1 class="uppercase text-center font-bold mb-2">
                        {{ $title }}
                    </h1>
                </div>
            @endisset
            <div class="flex">
                @foreach([
                    [$unresolvedFaults, $description_faults], 
                    [$offlineSites, $description_offline]
                ] as $data)
                <div class="grid grid-rows-auto-1 w-1/2 h-full p-3 rounded @if($data[0]) bg-error @endif @if(!$loop->last) mr-1 @endif">
                    <h2 class="uppercase text-xs @if($data[0]) text-white @endif text-opacity-50 text-center">
                        @isset($data[1]) {{ $data[1] }} @endisset
                    </h2>
                    <div class="flex items-center justify-center">
                        <p class="text-4xl text-center font-bold @if($data[0]) text-white @endif">{{ $data[0] }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</x-dashboard-tile>
