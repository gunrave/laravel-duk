<div class="card">
    <div class="card-body">
        <form action="">
            <div class="form-group mb-3">
                <label for="Periode">Periode:</label>
                <input type="text" class="form-control @error('periode') is-invalid @enderror" id="periode" placeholder="Enter Period" wire:model='periode'>
                @error('periode')
                    <span class="text-danger">{{ $message }} </span>
                @enderror
            </div>
            <div class="d-grip gap-2">
                <button wire:click.prevent='update()' class="btn btn-success btn-block">Update</button>
                <button wire:click.prevent='cancel()' class="btn btn-secondary btn-block">Cancel</button>
            </div>
        </form>
    </div>
</div>
