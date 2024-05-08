@extends('base-layout.base')
@push('title')
Update
@endpush
@section('main')
<div class="container p-3">
    <h1>Update your resume</h1>
    <form action="/resume/update/{{$resume->id}}" method="post">
        @csrf
        <div class="form-group my-2">
            <label for="title" class="form-label">Title<span class="text-danger">*</span></label>
            <input type="text" class="form-control" name="title" id="title" placeholder="John Doe" value="{{old('title', $resume->title)}}">
            @if($errors->has('title'))
            <small class="text-danger">
                {{$errors->first('title')}}
            </small>
            @endif
        </div>
        <div class="form-group my-2">
            <label for="profession" class="form-label">Profession<span class="text-danger">*</span></label>
            <input type="text" class="form-control" name="profession" id="profession" placeholder="Software Developer" value="{{old('profession', $resume->profession)}}">
            @if($errors->has('profession'))
            <small class="text-danger">
                {{$errors->first('profession')}}
            </small>
            @endif
        </div>
        <div class="form-group my-2">
            <label for="personal-info" class="form-label">Personal Info<span class="text-danger">*</span></label>
            <div class="d-flex gap-2 flex-wrap">
                <input type="email" class="form-control" name="email" id="email" placeholder="johndoe@gmail.com" value="{{old('email', $resume->email)}}">
                @if($errors->has('email'))
                <small class="text-danger">
                    {{$errors->first('email')}}
                </small>
                @endif
                <input type="text" class="form-control" name="phone" id="phone" placeholder="923145678328" value="{{old('phone', $resume->phone)}}">
                @if($errors->has('phone'))
                <small class="text-danger">
                    {{$errors->first('phone')}}
                </small>
                @endif
                <input type="text" class="form-control" name="address" id="location" placeholder="Washington DC, USA" value="{{old('address', $resume->address)}}">
                @if($errors->has('address'))
                <small class="text-danger">
                    {{$errors->first('address')}}
                </small>
                @endif
            </div>
        </div>

        <div class="form-group my-2">
            <label for="objective" class="form-label">Objective<span class="text-danger">*</span></label>
            <textarea name="objective" id="objective" cols="30" rows="3" class="form-control">{{$resume->objective}}</textarea>
        </div>

        <hr>

        <div class="form-group my-2">
            <div id="upd-edu" class="d-flex gap-2 flex-wrap">
                <?php
                    $education = json_decode($resume->education);
                ?>
                @foreach($education as $edu)
                <div class="card m-2">
                    <div class="card-body position-relative">
                        <h5 class="card-title">Institute - {{@$edu->institute}}, {{@$edu->location}}</h5>
                        <p class="card-text">Degree - {{$edu->degree}}</p>
                        <p class="card-text">Passing Year - {{$edu->yop}}</p>
                        <p class="card-text">Result - {{$edu->marks}}</p>

                        <input type="hidden" name="institute[]" value="{{$edu->institute}}">
                        <input type="hidden" name="ins_location[]" value="{{@$edu->location}}">
                        <input type="hidden" name="degree[]" value="{{$edu->degree}}">
                        <input type="hidden" name="yop[]" value="{{$edu->yop}}">
                        <input type="hidden" name="marks[]" value="{{$edu->marks}}">

                        <button class="position-absolute top-0 end-0 btn btn-close" type="button"></button>
                    </div>
                </div>
                @endforeach
            </div>
            <label for="education" class="form-label">Education<span class="text-danger">*</span></label>
            <input type="text" class="form-control my-2" placeholder="School / College / University" id="institute">
            <input type="text" class="form-control my-2" placeholder="Degree" id="degree">
            <input type="text" class="form-control my-2" placeholder="Location" id="ins-location">
            <input type="text" class="form-control my-2" placeholder="Grade / Marks / Percentage" id="marks">
            <input type="text" class="form-control my-2" placeholder="Year of passing" id="yop">
            <button type="button" class="btn btn-primary btn-sm" id="add-edu-btn">Add Education</button>
        </div>

        <hr>

        <div class="form-group my-2">
            <label for="skills" class="form-label">Skills<span class="text-danger">*</span></label>
            <div id="skills">
            </div>
            <div class="position-relative">
                <input type="text" class="form-control" id="skill-input" placeholder="JavaScript, Python, PHP">
                <button type="button" class="btn btn-primary position-absolute top-0 end-0" id="add-skill-btn">Add</button>
            </div>
        </div>

        <hr>

        <div class="form-group my-2">
            <div id="upd-exp" class="d-flex gap-2 flex-wrap">
            <?php
                    $experience = json_decode($resume->experience);
                ?>
                @foreach($experience as $exp)
                <div class="card m-2">
                    <div class="card-body position-relative">
                        <h5 class="card-title">Position - {{$exp->position}}</h5>
                        <p class="card-text">Company - {{$exp->company}}</p>
                        <p class="card-text">Role - {{$exp->description}}</p>
                        <p class="card-text">Duration - {{$exp->start_date}} to {{$exp->end_date}}</p>

                        <button class="position-absolute top-0 end-0 btn btn-close" type="button"></button>
                    </div>
                </div>
                @endforeach
            </div>
            <label for="experience" class="form-label">Experience<span class="text-danger">*</span></label>
            <input type="text" class="form-control my-2" id="position" placeholder="Position">
            <input type="text" class="form-control my-2" id="comp-name" placeholder="Company">
            <input type="text" class="form-control my-2" id="desc" placeholder="Describe your role">
            <label for="experience" class="form-label">Joining Date<span class="text-danger">*</span></label>
            <input type="date" class="form-control my-2" id="start-date" placeholder="Duration">
            <label for="experience" class="form-label">Leaving Date<span class="text-danger">*</span></label>
            <input type="date" class="form-control my-2" id="end-date" placeholder="Duration">
            <button type="button" class="btn btn-primary btn-sm" id="add-exp-btn">Add Experience</button>
        </div>

        <button type="submit" class="btn btn-outline-primary mb-2 w-100">Update</button>

    </form>
</div>

@endsection