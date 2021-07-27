@extends('app')
    @section('content')
    @if (session('message'))
    <div class="my-2">{{ session('message') }}</div>
        
    @endif
<form action="/employees" method="post" enctype="multipart/form-data">
@csrf
<div class="form-group">
    <label>Name</label>
    <input type="text" class="form-control" placeholder="Enter Name" name="name">
</div>

<div class="form-group">
    <label>Email</label>
    <input type="text" class="form-control" placeholder="Enter Email ID" name="email">
</div>

<div class="form-group">
    <label>Post</label>
    <input type="text" class="form-control" placeholder="Enter Post" name="post">
</div>

<div class="form-group">
    <div class="custom-file">
        <label class="custom-file-label">Choose File</label>
        
        <input type="file" class="custom-file-input" name="image">
    </div>
</div>
<button type="submit" class="btn btn-primary btn-sm mt-4">Save Data</button>


</form>

        
    @endsection
    
