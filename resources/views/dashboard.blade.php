<x-layout>
    <x-slot:title>Hiker's Haven Dashboard</x-slot:title>

    <div class="container mt-4">
        <div class="row mb-4">
            <div class="col-md-3">
                <div
                    class="card bg-dark text-light mb-3 animate__animated animate__fadeIn animate__fast animate__delay-0.1s">
                    <div class="card-body">
                        <div>Products Terjual</div>
                        <h1 class="fw-bold">{{ number_format($productsSold) }}</h1>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div
                    class="card bg-dark text-light mb-3 animate__animated animate__fadeIn animate__fast animate__delay-0.2s">
                    <div class="card-body">
                        <div>Pendapatan</div>
                        <h1 class="fw-bold">{{ number_format($revenue) }}</h1>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div
                    class="card bg-dark text-light mb-3 animate__animated animate__fadeIn animate__fast animate__delay-0.3s">
                    <div class="card-body">
                        <div>Orders</div>
                        <h1 class="fw-bold">{{ number_format($ordersCount) }}</h1>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div
                    class="card bg-dark text-light mb-3 animate__animated animate__fadeIn animate__fast animate__delay-0.4s">
                    <div class="card-body">
                        <div>Products</div>
                        <h1 class="fw-bold">{{ number_format($productsCount) }}</h1>
                    </div>
                </div>
            </div>
        </div>

        <h6 class="text-light animate__animated animate__fadeIn animate__fast animate__delay-0.5s">
            {{ count($recentOrders) }} Orders Terkini</h6>

        <div
            class="card bg-dark text-light mb-2 overflow-hidden animate__animated animate__fadeIn animate__fast animate__delay-0.6s">
            <table class="table m-0">
                <thead class="bg-secondary">
                    <tr>
                        <th>No</th>
                        <th>Customer</th>
                        <th>Payment</th>
                        <th>Total</th>
                        <th>User</th>
                        <th>Tanggal</th>
                        <th></th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($recentOrders as $order)
                        <tr>
                            <td>Order #{{ $order->id }}</td>
                            <td>{{ $order->customer }}</td>
                            <td>{{ number_format($order->payment) }}</td>
                            <td>{{ number_format($order->total) }}</td>
                            <td>{{ $order->user->name }}</td>
                            <td>{{ $order->formatted_created_at }}</td>
                            <td class="text-end">
                                <a href="{{ route('orders.show', ['order' => $order->id]) }}"
                                    class="btn btn-sm btn-primary">
                                    Lihat
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center">Belum ada order</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-layout>
