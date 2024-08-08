<x-layout>
    <x-slot:title>Users</x-slot:title>

    <div class="container">
        <div class="d-flex mb-3 justify-content-between align-items-center">
            <form action="{{ route('users.index') }}" method="get" class="w-50">
                <input type="text" name="search" value="{{ request()->search }}" placeholder="Cari user"
                    class="form-control">
            </form>
            <a href="{{ route('users.create') }}" class="btn btn-dark">Tambah</a>
        </div>

        <div class="card shadow-sm">
            <div class="card-body">
                <table class="table table-striped table-bordered table-hover mb-0">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Nama</th>
                            <th scope="col">Email</th>
                            <th scope="col">Aktif</th>
                            <th scope="col" class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    @if ($user->active)
                                        <span class="badge bg-success">Aktif</span>
                                    @else
                                        <span class="badge bg-danger">Tidak Aktif</span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <a href="{{ route('users.edit', ['user' => $user->id]) }}"
                                        class="btn btn-sm btn-primary me-1">Edit</a>
                                    <button class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#deleteModal{{ $user->id }}">Hapus</button>

                                    <!-- Delete Modal -->
                                    <div class="modal fade" id="deleteModal{{ $user->id }}" tabindex="-1"
                                        aria-labelledby="deleteModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="deleteModalLabel">Konfirmasi Hapus</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Apakah Anda yakin ingin menghapus user {{ $user->name }}?
                                                </div>
                                                <div class="modal-footer">
                                                    <form action="{{ route('users.destroy', ['user' => $user->id]) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Batal</button>
                                                        <button type="submit" class="btn btn-danger">Hapus</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-layout>
