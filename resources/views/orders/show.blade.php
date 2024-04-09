@extends('admin.app')

@section('content')

<section class="navbar-header mt-2">
    <div class="navigation">
        <a href="{{ url()->previous() }}" class="text-decoration-none  btn btn-secondary px-3 py-2 text-uppercase">
            <i class="fa fa-arrow-left"></i>
            back
        </a>

        <div class="breadcrumb">
            <span><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></span> /
            <span><a href="{{ route('orders') }}">Orders</a>
            </span> /
            <span>Show</span>
        </div>
    </div>
</section>

<div class="container">
    <div class="card border">
        <div class="card-header">
            Order: {{ $order->id }} <br />
            <strong>Date: {{ $order->created_at->format('d/m/Y h:m') }}</strong>
            <span class="float-right"> <strong>Status:</strong> {{ ucwords($order->status) }}</span>

        </div>
        <div class="card-body">
            <div class="row mb-4">
                <div class="col-sm-6">
                    <h6 class="mb-3">From:</h6>
                    <div>
                        <strong>Radiant</strong>
                    </div>
                    <div>Lebanon, Beirut</div>
                    <div>Email: radiantserviceslb@gmail.com</div>
                    <div>Phone: +961 79 308 778</div>
                </div>

                <div class="col-sm-6">
                    <h6 class="mb-3">To:</h6>
                    <div>
                        <strong>{{ ucwords($order->name) }}</strong>
                    </div>
                    <div>{{ $order->address }}</div>
                    <div>Email: {{ $order->email }}</div>
                    <div>Phone: {{ $order->phone }}</div>
                </div>
            </div>

            <div class="table-responsive-sm">
                <table class="table table-striped">
                    <thead class="bg-dark text-white">
                        <tr>
                            <th>#</th>
                            <th>Item</th>
                            <th>Design</th>
                            <th>Unit Cost</th>
                            <th>Quantity</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($order->products as $index => $product)
                        <tr>
                            <td>{{ $index }}</td>
                            <td>{{ ucwords($product->name) }}</td>
                            <td>
                                @if ($product->pivot->design_id == null)
                                Standard
                                @else
                                <a href="{{ route('designs.show', $product->pivot->design_id) }}">Customized</a>
                                @endif
                            </td>
                            <td>${{ number_format($product->price, 2) }}</td>
                            <td>{{ $product->pivot->quantity }}</td>
                            <td>${{ number_format($product->price * $product->pivot->quantity, 2) }}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="row">
                <div class="col-lg-4 col-sm-5 ml-auto">
                    <table class="table table-clear">
                        <tbody>
                            <tr>
                                <td class="left">
                                    <strong>Subtotal</strong>
                                </td>
                                <td class="right">${{ number_format($sub_total, 2) }}</td>
                            </tr>
                            <tr>
                                <td class="left">
                                    <strong>Shipping</strong>
                                </td>
                                <td class="right">${{ number_format($order->shipping, 2) }}</td>
                            </tr>
                            <tr>
                                <td class="left">
                                    <strong>Total</strong>
                                </td>
                                <td class="right">
                                    <strong>${{ number_format($order->total_price, 2)
                                        }}</strong>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                </div>

            </div>

        </div>
    </div>
</div>

@endsection