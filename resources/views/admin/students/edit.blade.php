@extends('admin.layouts.master')

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex" style="justify-content:space-between">
            <h6 class="m-0 font-weight-bold text-primary">Update Cateogy</h6>
            <a href="{{ route('admin.employees.index') }}" class="btn btn-success"> Back </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">

                <form action="{{ route('admin.employees.update', $employee->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" name="name" id="name"
                            value="{{ $employee->name }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">email</label>
                        <input type="email" class="form-control" name="email" id="email"
                            value="{{ $employee->email }}">
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">phone</label>
                        <input type="tel" class="form-control" name="phone" id="phone"
                            value="{{ $employee->phone }}">
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">address</label>
                        <input type="text" class="form-control" name="address" id="address"
                            value="{{ $employee->address }}">
                    </div>
                    <div class="mb-3">
                        <label for="designation" class="form-label">designation</label>
                        <input type="text" class="form-control" name="designation" id="designation"
                            value="{{ $employee->designation }}">
                    </div>

                    <button type="submit" class="btn btn-primary">Update Category</button>
                </form>

            </div>
        </div>
    </div>
@endsection
