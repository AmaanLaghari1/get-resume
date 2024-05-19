@extends('base-layout.base')

@push('title') Select Template @endpush

@section('main')
    <div class="container">
        <h1>Select Resume Template</h1>
        <div class="card">
            <img src="" class="card-img-top" />
            <div class="card-body">
                <h5 class="card-title">Default</h5>
                <a href="{{$_ENV['APP_URL']}}/resume/1/view/{{$resume['id']}}" class="btn btn-primary">Select</a>
            </div>
        </div>
        <div class="card">
            <img src="" class="card-img-top" />
            <div class="card-body">
                <h5 class="card-title">Resume 2</h5>
                <a href="{{$_ENV['APP_URL']}}/resume/2/view/{{$resume['id']}}" class="btn btn-primary">Select</a>
            </div>
        </div>
    </div>
@endsection