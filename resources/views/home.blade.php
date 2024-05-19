@extends('base-layout.base')

@section('main')
<div class="container p-2">
    <a href="{{url('resume/create')}}" class="btn btn-primary">Create New Resume</a>

    <h1>All Resumes</h1>
    @if(count($resumes) > 0)
    @foreach($resumes as $row)
    <div class="card m-2">
        <div class="card-body d-flex flex-column">
            <h5 class="card-title">
                {{$row['title']}}
            </h5>
            <small class="card-text">
                {{$row['email']}}
            </small>
            <small class="card-text">
                {{$row['phone']}}
            </small>
            <small class="card-text">
                {{$row['address']}}
            </small>
            <div>
                <a href="./resume/select/{{$row['id']}}" class="btn btn-warning btn-sm mx-2">View</a>
                <a href="./resume/update/{{$row['id']}}" class="btn btn-warning btn-sm mx-2">Update</a>
                <a href="./resume/delete/{{$row['id']}}" class="btn btn-danger btn-sm mx-2">Delete</a>
            </div>
        </div>
    </div>
    @endforeach
    @else
    <h3 class="text-center text-secondary fst-italic">No resumes to show!</h3>
    @endif
</div>
@endsection