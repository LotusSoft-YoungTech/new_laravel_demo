@extends('app')
@section('content')
<div class="card">
    <div class="card-header">
        <a href="/students" class="btn btn-primary btn-sm">Student Table</a>
    </div>
    <form action="/students" method="post" enctype="multipart/form-data">
        @csrf
      @if (session('message'))
      <div class="my-2 alert alert-success alert-sm">
        {{ session('message') }}
    </div>
          
      @endif

      <div class="form-group">
          <label for="photo">Student Photo</label>
          <input id="photo" class="form-control-file" type="file" name="photo">
      </div>

      

        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input id="name" class="form-control" type="text" name="name" value="{{ old('name') }}">
                        @error('name')
                        <span class="text-danger text-sm">{{ $message }}</span>
                            
                        @enderror
                       
                    </div>

                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="age">Age</label>
                        <input id="age" class="form-control" type="text" name="age" value="{{ old('age') }}">
                        @error('age')
                        <span class="text-danger text-sm">{{ $message }}</span>
                            
                        @enderror
                    </div>

                </div>
            </div>

            
                
            
            
            
            
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="roll">Roll No</label>
                        <input id="roll" class="form-control" type="text" name="roll" value="{{ old('roll') }}">
                        @error('roll')
                        <span class="text text-danger">{{ $message }}</span>
                            
                        @enderror
                    </div>

                </div>
                <div class="col-md-6">
                      
            <div class="form-group">
                <label for="mobile">Mobile</label>
                <input id="mobile" class="form-control" type="text" name="mobile" value="{{ old('mobile') }}">
                @error('mobile')
                <span class="text-danger">{{ $message }}</span>
                    
                @enderror
            </div>
                </div>
            </div>
            
            
           
          
            <button type="submit" class="btn btn-primary btn-sm mt-4"><i class="fas fa-closed-captioning"></i>Submit</button>
        </div>
    </form>
</div>
    
@endsection