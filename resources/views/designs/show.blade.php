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
            <span><a href="{{ route('designs') }}">Designs</a>
            </span> /
            <span>Show</span>
        </div>
    </div>
</section>

<div class="container pb-5">
    <div class="card border">
        <div class="card-header">
            <h2>Design: {{ $design->id }}</h2>
        </div>
    </div>
    <div class="card border card-body">
        <div class="row">
            <div class="col-md-12">
                <div class="mx-auto my-design" @if ($design->direction == 'front')
                    style="background-image: url('{{ asset($design->product->image_front) }}');"
                    @elseif($design->direction == 'back')
                    style="background-image: url('{{ asset($design->product->image_back) }}');"
                    @endif
                    >

                    <img src="{{ asset($design->image_path) }}"
                        alt="{{ $design->product->name }} {{ ucwords($design->direction) }} Design">
                </div>
            </div>
            <div class="col-md-12">
                <div class="d-flex justify-content-between align-items-center mt-5">
                    <div>
                        <h4>User: {{ ucwords($design->user->name) }}</h4>
                        <p>{{ $design->user->email }}</p>
                    </div>
                    <div>
                        <h6>Date: {{ $design->created_at->format('d/m/Y h:m') }}</h6>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
</div>
</div>

@endsection