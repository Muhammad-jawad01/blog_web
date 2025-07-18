@extends('admin.layouts.master')

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex" style="justify-content:space-between">
            <h6 class="m-0 font-weight-bold text-primary">Add Employee</h6>
            <a href="{{ route('admin.students.index') }}" class="btn btn-success"> Back </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">

                <form method="POST" action="{{ route('admin.students.store') }}">
                    @csrf
                    <label>Name:</label>
                    <input type="text" class="form-control" name="name"><br>
                    <label>Email:</label>
                    <input type="email" class="form-control" name="email"><br><br>

                    <h4>Education</h4>
                    <div id="education-group">
                        <div class="edu">
                            <div class="row">
                                <input type="text"class="form-control col-md-4" name="educations[0][degree]"
                                    placeholder="Degree">
                                <input type="text" class="form-control col-md-4" name="educations[0][institution]"
                                    placeholder="Institution">
                                <input type="text" class="form-control col-md-4" name="educations[0][year]"
                                    placeholder="Year">
                            </div>
                        </div>
                    </div>

                    <button type="button" class="btn btn-success mt-2" onclick="addEducation()">+ Add More</button><br><br>
                    <button type="submit" class="btn btn-success">Save</button>
                </form>

                <script>
                    let index = 1;

                    function addEducation() {
                        const group = document.getElementById('education-group');
                        const html = `
        <div class="edu">
<div class="row">

                <input type="text" class="form-control col-md-4" name="educations[${index}][degree]" placeholder="Degree">
            <input type="text" class="form-control col-md-4" name="educations[${index}][institution]" placeholder="Institution">
            <input type="text" class="form-control col-md-4" name="educations[${index}][year]" placeholder="Year">
    </div>
        </div>`;
                        group.insertAdjacentHTML('beforeend', html);
                        index++;
                    }
                </script>


            </div>
        </div>
    </div>
@endsection
