@extends('app')
@section('content')
<div class="card">
    <div class="card-header">
        <a href="/students/create" class="btn btn-primary btn-sm">Create New Student</a>
    </div>
    <div class="card-body">
        <table class="table">
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Age</th>
                <th>Roll No</th>
                <th>Mobile</th>
                <th>Action</th>
            </tr>
            @foreach ($student as $student)
            <tr>
                <td>{{ $student->id }}</td>
                <td>{{ $student->name }}</td>
                <td>{{ $student->age }}</td>
                <td>{{ $student->roll }}</td>
                <td>{{ $student->mobile }}</td>
                <td><a href="/students/{{ $student->id }}/edit">Edit</a></td>
               
                <form action="/students/{{ $student->id }}" method="post">
                    @csrf
                    @method('delete')
                    <td><button type="submit">Delete</button></td>


                </form>
            </tr>
                
            @endforeach
        </table>
    </div>
</div>
    
@endsection