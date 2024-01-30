@extends('admin.app')

@section('content')

<a href="{{ route('designs') }}" class="btn text-secondary m-3">
    <h3>
        < Back</h3>
</a>

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