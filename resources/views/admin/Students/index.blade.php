@extends('admin.layouts.master')

@section('content')
{{--new project--}}
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex" style="justify-content:space-between">
            <h6 class="m-0 font-weight-bold text-primary">Students Listing</h6>
            <a href="{{ route('admin.Students.create') }}" class="btn btn-success"> create </a>
        </div>
        {{-- @dd('hello') --}}
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>father_name</th>
                            <th>email</th>
                            <th>address</th>
                            <th>rollno</th>
                        </tr>
                    </thead>
                    <tbody>



                        @foreach ($Students as $data)
                            {{-- @dd($data) --}}
                            <tr>
                                <td>{{ $data->name }}</td>
                                <td>{{ $data->father_name }}</td>
                                <td>{{ $data->email }}</td>
                                <td>{{ $data->address }}</td>
                                <td>{{ $data->rollno }}</td>
                                <td>
                                    {{-- edit --}}
                                    <a href="{{ route('admin.Students.edit', $data->id) }}" class="btn btn-info">
                                        Edit
                                    </a>
                                    {{-- for delete  --}}
                                    <form action="{{ route('admin.Students.destroy', $data->id) }}" method="POST">
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
