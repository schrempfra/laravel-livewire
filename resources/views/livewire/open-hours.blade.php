<div>
    @if($openingHours->isOpen())
        <span class="px-2 py-1 text-green-800 text-xs font-medium bg-green-100 rounded-full">
            Geöffnet
        </span>
    @else
        <span class="px-2 py-1 text-red-800 text-xs font-medium bg-red-100 rounded-full">
            Geschlossen
        </span>
    @endif
</div>
