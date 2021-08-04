@extends('app')
@section('content')
<div class="container">
    <a href="/galleries" class="btn btn-primary my-2">Back</a>
    <div class="row">
        @foreach ($photos as $photo)
        <div class="col-md-4">
            <img src="{{ asset($photo->name) }}" alt="" class="img-fluid">
        </div>
            
        @endforeach
    </div>
</div>
    
@endsection