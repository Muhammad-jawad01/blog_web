@extends('admin.layouts.master')

@section('content')
{{--new project--}}
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex" style="justify-content:space-between">
            <h6 class="m-0 font-weight-bold text-primary">Create Students</h6>
            <a href="{{ route('admin.Students.index') }}" class="btn btn-success"> Back </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">

                <form action="{{ route('admin.Students.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="name" class="form-control" name="name" id="name" required>
                    </div>

                    <div class="mb-3">
                        <label for="father_name" class="form-label">father_name</label>
                        <input type="name" class="form-control" name="father_name" id="father_name">
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" id="email">
                       
                    </div>
                  
                    <div class="mb-3">
                        <label for="address" class="form-label">address</label>
                        <input type="text" class="form-control" name="address" id="address">
                       
                    </div>

                    <div class="mb-3">
                        <label for="rollno" class="form-label">rollno</label>
                        <input type="number" class="form-control" name="rollno" id="rollno">
                       
                    </div>
                    
                    

                    <button type="submit" class="btn btn-primary">Create Students</button>
                </form>

            </div>
        </div>
    </div>
@endsection
