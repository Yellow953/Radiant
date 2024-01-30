@extends('admin.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 mt-3">
            <div class="d-flex justify-content-between">
                <h4 class="header-title my-auto">Designs</h4>
                <div class="d-flex">
                    <a href="{{ route('customize') }}" class="btn btn-info px-3 py-2 btn-custom text-dark">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-plus-lg mr-1" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z" />
                        </svg>
                        Design
                    </a>
                </div>
            </div>
        </div>

        <!-- data table start -->
        <div class="col-12">
            <div class="card mt-3">
                <div class="card-body">
                    <div class="data-tables datatable-dark">
                        <table id="dataTable3" class="text-center">
                            <thead class="text-capitalize">
                                <tr>
                                    <th>User</th>
                                    <th>Design</th>
                                    <th>Actions</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse( $designs as $design )
                                <tr>
                                    <td class="col-md-4">
                                        <div class="my-design" @if ($design->direction == 'front')
                                            style="background-image: url('{{ asset($design->product->image_front) }}');"
                                            @elseif($design->direction == 'back')
                                            style="background-image: url('{{ asset($design->product->image_back) }}');"
                                            @endif
                                            >

                                            <img src="{{ asset($design->image_path) }}"
                                                alt="{{ $design->product->name }} {{ ucwords($design->direction) }} Design">
                                        </div>
                                    </td>
                                    <td class="col-md-4">
                                        {{ ucwords($design->user->name) }} <br>
                                        {{ $design->user->email }}
                                    </td>
                                    <td class="col-md-4">
                                        <div class="d-flex justify-content-center">
                                            <a href="{{ route('designs.show', $design->id) }}"
                                                class="btn btn-info btn-custom text-dark p-2 m-1"><svg
                                                    xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                                    <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z" />
                                                    <path
                                                        d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z" />
                                                </svg></a>
                                            <form method="GET" action="{{ route('designs.destroy', $design->id) }}">
                                                @csrf
                                                <button type="submit"
                                                    class="btn btn-danger btn-custom p-2 show_confirm m-1 text-dark"
                                                    data-toggle="tooltip" title='Delete'><svg
                                                        xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="currentColor" class="bi bi-trash-fill"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z" />
                                                    </svg></button>
                                            </form>
                                        </div>
                                    </td>
                                    <td>
                                        {{ $design->created_at->format('d/m/Y h:m') }}
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="3">
                                        No Designs yet...
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- data table end -->
    </div>
</div>
@endsection