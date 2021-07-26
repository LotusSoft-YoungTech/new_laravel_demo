@extends('app')
@section('content')
<div class="card">
    <div class="card-header">
        Student Form
    </div>
    <form action="/students" method="post">
        @csrf
      @if (session('message'))
      <div class="my-2 alert alert-success alert-sm">
        {{ session('message') }}
    </div>
          
      @endif

      

     



       
        
        <div class="card-body">
            <div class="form-group">
                <label for="name">Name</label>
                <input id="name" class="form-control" type="text" name="name">
                @error('name')
                <span class="text-danger text-sm">{{ $message }}</span>
                    
                @enderror
               
            </div>
            
            <div class="form-group">
                <label for="age">Age</label>
                <input id="age" class="form-control" type="text" name="age">
                @error('name')
                <span class="text-danger text-sm">{{ $message }}</span>
                    
                @enderror
            </div>

            
            <div class="form-group">
                <label for="roll">Roll No</label>
                <input id="roll" class="form-control" type="text" name="roll">
                @error('roll')
                <span class="text text-danger">{{ $message }}</span>
                    
                @enderror
            </div>
            
            <div class="form-group">
                <label for="mobile">Mobile</label>
                <input id="mobile" class="form-control" type="text" name="mobile">
                @error('mobile')
                <span class="text-danger">{{ $message }}</span>
                    
                @enderror
            </div>
            <button type="submit" class="btn btn-primary btn-sm mt-4">Submit</button>
        </div>
    </form>
</div>
    
@endsection