@extends('admin.layouts.master')

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex" style="justify-content:space-between">
            <h6 class="m-0 font-weight-bold text-primary">Add Client</h6>
            <a href="{{ route('admin.clients.index') }}" class="btn btn-success"> Back </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">

                <form action="{{ route('admin.clients.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" name="name" id="name" required>
                    </div>

                    <div class="mb-3">
                        <label for="emial" class="form-label">email</label>
                        <input type="email" class="form-control" name="email" id="email">
                    </div>

                   
                    <div class="mb-3">
                        <label for="address" class="form-label">address</label>
                        <input type="text" class="form-control" name="address" id="address">

                    </div>
                    <div class="mb-3">
                        <label for="phoneno" class="form-label">PhoneNo</label>
                        <input type="integer" class="form-control" name="phone_no" id="phone_no">

                    </div>
                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select class="form-select form-control" name="status" id="status" required>
                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Add clients</button>
                </form>

            </div>
        </div>
    </div>
@endsection
