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
            <a href="./resume/view/{{$row['id']}}" class="btn btn-warning btn-sm w-25">View</a>
        </div>
    </div>
    @endforeach
    @else
    <h3 class="text-center">No resumes to show!</h3>
    @endif
</div>
@endsection