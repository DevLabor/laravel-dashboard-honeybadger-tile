<x-dashboard-tile :position="$position" :refresh-interval="$refreshIntervalInSeconds">
    <div class="grid grid-rows-auto-1 gap-4">
        @isset($title)
            <h1 class="uppercase font-bold">
                {{ $title }}
            </h1>
        @endisset

        @if ($unresolvedFaults)
            {{ $unresolvedFaults }}
        @endif
    </div>
</x-dashboard-tile>
