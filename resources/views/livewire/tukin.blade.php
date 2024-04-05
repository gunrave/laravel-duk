<div>
    <div class="col-md-12 mb-2">
        @if(session()->has('success'))
            <div class="alert alert-success" role="alert">
                {{ session()->get('success') }}
            </div>
        @endif

        @if (session()->has('error'))
            <div class="alert slert-danger" role="alert">
                {{ session()->get('error')}}
            </div>
        @endif

        @if ($addTukin)
            @include('livewire.create')
        @endif

        @if ($updateTukin)
            @include('livewire.update')
        @endif
    </div>

    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                @if (!$addTukin)
                    <button wire:click='"create()' class="btn btn-primary btn-sm float=end">Add New Periode</button>
                @endif
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Periode </th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @forelse ($tukins as $tukin)
                            <tr>
                                <td> {{$tukin->id}} </td>
                                <td> {{$tukin->periode}} </td>
                                <td>
                                    <button wire:click='edit({$tukin->id})' class="btn btn-primary btn-sm">Edit</button>
                                    <button wire:click='destroy({$tukin->id})' class="btn btn-danger btn-sm">Delete</button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" align="center">No Tukin Found</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
