<div class="relative">

   <input
        type="text"
        class="form-input"
        placeholder="Search..."
        wire:model.live="query"
        wire:keydown.escape="reset"
        wire:keydown.tab="reset"
        wire:keydown.arrow-up="decrementHighlight"
        wire:keydown.arrow-down="incrementHighlight"
        wire:keydown.enter="selectPenagih"
    />

    <div wire:loading class="absolute z-10 w-full bg-white rounded-t-none shadow-lg list-group">
        <div class="list-item">Searching...</div>
    </div>

    @if (!empty($query))
        <div class="fixed top-0 bottom-0 left-0 right-0" wire:click='reset'></div>

        {{-- <div class="absolute z-10 w-full bg-white rounded-t-none shadow-lg list-group">
            @if (!empty($penagihs))
                @foreach ($penagihs as $i => $penagih)
                    <a
                        {{-- href="{{ route('show-penagih', $penagih['id']) }}" --}}
                        {{-- href=""
                        class="list-item {{ $highlightIndex === $i ? 'highlight' : '' }}"
                    >{{ $penagih['nama']}}</a>
                @endforeach
            @else
                <div class="list-item">No Result!</div>
            @endif
        </div> --}}

        <ul>
            @if (!empty($penagihs))
            @foreach ($penagihs as $i => $penagih)
                    <li>
                        <p>
                            {{ $penagih['nama'] }}
                        </p>
                    </li>
                @endforeach
            @else
                <div class="list-item">No Result!</div>
            @endif
        </ul>
    @endif
</div>
