@extends('admin.app')

@section('content')
<div class="container">
    <section class="navbar-header mt-2">
        <div class="navigation">
            <a href="{{ url()->previous() }}" class="text-decoration-none  btn btn-secondary px-3 py-2 text-uppercase">
                <i class="fa fa-arrow-left"></i>
                back
            </a>

            <div class="breadcrumb">
                <span><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></span> /
                <span><a href="{{ route('users') }}">Users</a>
                </span> /
                <span>Edit</span>
            </div>
        </div>
    </section>

    <div class="row mt-3">
        <div class="offset-md-2 col-md-8">
            <div class="card border">
                <div class="card-header bg-info">
                    <h2 class="font-weight-bolder text-center my-4">Edit User</h2>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('users.update', $user->id) }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name" class="col-form-label">Name</label>
                            <input class="form-control" name="name" value="{{$user->name}}" type="text">
                        </div>

                        <div class="form-group">
                            <label for="phone" class="col-form-label">Telephone</label>
                            <input class="form-control" name="phone" value="{{$user->phone}}" type="tel">
                        </div>

                        <div class="form-group">
                            <label for="address" class="col-form-label">Address *</label>
                            <input class="form-control" name="address" required type="text" placeholder="Address..."
                                value="{{ $user->address }}">
                        </div>

                        <div class="form-group">
                            <label for="role" class="col-form-label">Role</label>
                            <select class="custom-select" name="role">
                                <option value="user" {{$user->role == 'user' ? 'selected' : ''}}>User</option>
                                <option value="admin" {{$user->role == 'admin' ? 'selected' : ''}}>Admin</option>
                            </select>
                        </div>

                        <div class="w-100 mt-5">
                            <button type="submit" class="btn btn-info w-100">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection