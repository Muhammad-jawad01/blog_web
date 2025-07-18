@extends('admin.layouts.master')

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex" style="justify-content:space-between">
            <h6 class="m-0 font-weight-bold text-primary">Employees Record</h6>
            <a href="{{ route('admin.students.create') }}" class="btn btn-success"> Add Employee </a>
        </div>
        {{-- @dd('hello') --}}
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>



                        @foreach ($students as $data)
                            {{-- @dd($data) --}}
                            <tr>
                                <td>{{ $data->name }}</td>
                                <td>{{ $data->email }}</td>
                                <td>
                                    {{-- edit --}}
                                    <a href="{{ route('admin.students.edit', $data->id) }}" class="btn btn-info">
                                        Edit
                                    </a>
                                    <a href="{{ route('admin.students.show', $data->id) }}" class="btn btn-info">
                                        show
                                    </a>
                                    {{-- for delete  --}}
                                    <form action="{{ route('admin.students.destroy', $data->id) }}" method="POST">
                                        @csrf
                                        @method('Delete')

                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
