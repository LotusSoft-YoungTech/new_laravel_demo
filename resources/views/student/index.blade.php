@extends('app')
@section('content')
<div class="card">
    <div class="card-header">
        <a href="/students/create" class="btn btn-primary btn-sm">Create New Student</a>
    </div>
    <div class="card-body">
        <table class="table" id="datatable">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Photo</th>
                    <th>Name</th>
                    <th>Age</th>
                    <th>Roll No</th>
                    <th>Mobile</th>
                    <th>Action</th>
                </tr>
            </thead>
          <tbody>
            @foreach ($student as $index => $student)
            <tr>
                <td>{{ ++$index }}</td>
                <td><img src="{{ asset($student->photo) }}" width="120" alt=""></td>
                <td>{{ $student->name }}</td>
                <td>{{ $student->age }}</td>
                <td>{{ $student->roll }}</td>
                <td>{{ $student->mobile }}</td>
                
                    <td>
                    <form action="/students/{{ $student->id }}" method="post">
                    @csrf
                    @method('delete')
                    <a href="/students/{{ $student->id }}" class="btn btn-primary btn-sm">View</a>
                    <a href="/students/{{ $student->id }}/edit">Edit</a>
                    <button type="submit" onclick="return confirm('Are you sure to delete this item?')">Delete</button>
                    


                </form>
            </td>
            </tr>
            @endforeach
          </tbody>
            
        </table>
    </div>
</div>
    
@endsection