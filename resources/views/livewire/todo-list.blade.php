<div class="border p-12 rounded shadow">
    <h1 class="text-2xl font-semibold">To Do List</h1>
    @if (session()->has('berhasil'))
        <div role="alert" class="alert alert-success my-2 cursor-pointer" wire:click='hapusSession'>
            <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none"
                viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <span>{{ session('berhasil') }}</span>
        </div>
    @endif
    <div class="my-5">
        <form action="" wire:submit='save'>
            <input type="text" placeholder="" wire:model='title' class="input input-bordered w-full mb-3" />
            @error('title')
                <div role="alert" class="alert alert-ghost mb-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                    </svg>
                    <span>Warning: {{ $message }}</span>
                </div>
            @enderror
            <button type="submit" class="btn btn-primary">{{ $isEdit == true ? 'Edit' : 'Buat' }}</button>
        </form>
    </div>
    <hr class="my-5">
    <div class="">
    <form>
        <input type="text" wire:model.live='search' class="input input-bordered w-full" placeholder="Search">
    </form>
        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Todo</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $no = 1;
                @endphp
                @foreach ($todos as $item)
                    <tr>
                        <th>{{ $no++ }}</th>
                        <td>{{ $item->title }}</td>
                        <td class="flex gap-2">
                            <button type="button" class="btn btn-sm btn-warning text-white"
                                wire:click='edit({{ $item->id }})'>Edit</button>
                            <button type="button" class="btn btn-sm btn-error text-white"
                                wire:click='delete({{ $item->id }})'
                                wire:confirm='Apakah anda yakin ingin menghapus ?'>Hapus</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
