@extends('admin.layouts.master')

@section('content')
{{--new project--}}
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex" style="justify-content:space-between">
            <h6 class="m-0 font-weight-bold text-primary">Update Students</h6>
            <a href="{{ route('admin.Students.index') }}" class="btn btn-success"> Back </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">

                <form action="{{ route('admin.Students.update', $Students->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" name="name" id="name"
                            value="{{ $Students->name }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="father_name" class="form-label">father_name</label>
                        <input type="text" class="form-control" name="father_name" id="father_name"
                            value="{{ $Students->father_name }}">
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" id="email"
                            value="{{ $Students->email }}">
                    </div>

                    <div class="mb-3">
                        <label for="address" class="form-label">address</label>
                        <input type="text" class="form-control" name="address" id="address"
                            value="{{ $Students->address }}">
                    </div>

                    <div class="mb-3">
                        <label for="rollno" class="form-label">rollno</label>
                        <input type="number" class="form-control" name="rollno" id="rollno"
                            value="{{ $Students->rollno }}">
                    </div>

                    

                    

                    

                    <button type="submit" class="btn btn-primary">Update Students</button>
                </form>

            </div>
        </div>
    </div>
@endsection
