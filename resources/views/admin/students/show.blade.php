@extends('admin.layouts.master')


@section('content')
    <div class="container">
        <h1>Student Details</h1>

        <div>
            <strong>Name:</strong> {{ $student->name }} <br>
            <strong>Email:</strong> {{ $student->email }}
        </div>

        <hr>

        <h3>Education</h3>
        @if ($student->educations->isEmpty())
            <p>No education records found.</p>
        @else
            <ul>
                @foreach ($student->educations as $education)
                    <li>
                        <strong>Degree:</strong> {{ $education->degree }} <br>
                        <strong>Institution:</strong> {{ $education->institution }} <br>
                        <strong>Year:</strong> {{ $education->year }}
                    </li>
                    <hr>
                @endforeach
            </ul>
        @endif

        <a href="{{ route('admin.students.index') }}" class="btn btn-secondary">Back</a>
        <a href="{{ route('admin.students.edit', $student->id) }}" class="btn btn-primary">Edit</a>
        <form action="{{ route('admin.students.destroy', $student->id) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
        </form>
    </div>
@endsection
