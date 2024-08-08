<x-layout>
    <x-slot:title>Products</x-slot:title>

    <div class="container">
        <div class="d-flex mb-2 justify-content-between animate__animated animate__fadeIn animate__fast">
            <form class="d-flex gap-2" method="get">
                <input type="text" class="form-control w-auto" placeholder="Cari product" name="search"
                    value="{{ request()->search }}">
                <button type="submit" class="btn btn-dark">Cari</button>
            </form>
            <a href="{{ route('products.create') }}" class="btn btn-dark">Tambah</a>
        </div>

        <!-- Wrapper dengan overflow untuk scroll -->
        <div class="card" style="max-height: 500px; overflow-y: auto;">
            <div class="table-responsive">
                <table class="table m-0">
                    <thead class="sticky-header">
                        <tr>
                            <th scope="col">Gambar</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Kategori</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Aktif</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($products as $product)
                            <tr>
                                <td>
                                    <img src="{{ Storage::url($product->image) }}" alt="{{ $product->name }}"
                                        class="w-thumbnail img-thumbnail">
                                </td>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->category->name }}</td>
                                <td>{{ $product->price }}</td>
                                <td>
                                    @if ($product->active)
                                        <span class="badge text-bg-primary">Aktif</span>
                                    @else
                                        <span class="badge text-bg-danger">Tidak Aktif</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="d-flex justify-content-end gap-2">
                                        <a href="{{ route('products.edit', ['product' => $product->id]) }}"
                                            class="btn btn-sm btn-primary animate__animated animate__pulse">Edit</a>
                                        <form action="{{ route('products.destroy', ['product' => $product->id]) }}"
                                            method="post">
                                            @csrf
                                            @method('delete')
                                            <button
                                                class="btn btn-sm btn-danger animate__animated animate__pulse">Hapus</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center">Belum ada product</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <style>
        .sticky-header th {
            position: -webkit-sticky;
            /* For Safari */
            position: sticky;
            top: 0;
            background-color: #fff;
            /* Background color to ensure readability */
            z-index: 1;
            /* Ensures header stays above table content */
        }
    </style>
</x-layout>
