@extends('base-layout.base')
@push('title') Create @endpush
@section('main')
<div class="container p-3">
    <h1>Create your resume</h1>
    <form action="{{url('/resume/create')}}" method="post">
        @csrf
        <div class="form-group my-2">
            <label for="title" class="form-label">Title<span class="text-danger">*</span></label>
            <input type="text" class="form-control" name="title" id="title" placeholder="John Doe" value="{{old('title')}}">
            @if($errors->has('title'))
            <small class="text-danger">
                {{$errors->first('title')}}
            </small>
            @endif
        </div>
        <div class="form-group my-2">
            <label for="profession" class="form-label">Profession<span class="text-danger">*</span></label>
            <input type="text" class="form-control" name="profession" id="profession" placeholder="Software Developer" value="{{old('profession')}}">
            @if($errors->has('profession'))
            <small class="text-danger">
                {{$errors->first('profession')}}
            </small>
            @endif
        </div>
        <div class="form-group my-2">
            <label for="personal-info" class="form-label">Personal Info<span class="text-danger">*</span></label>
            <div class="d-flex gap-2 flex-wrap">
                <input type="email" class="form-control" name="email" id="email" placeholder="johndoe@gmail.com" value="{{old('email')}}">
                @if($errors->has('email'))
                <small class="text-danger">
                    {{$errors->first('email')}}
                </small>
                @endif
                <input type="text" class="form-control" name="phone" id="phone" placeholder="923145678328" value="{{old('phone')}}">
                @if($errors->has('phone'))
                <small class="text-danger">
                    {{$errors->first('phone')}}
                </small>
                @endif
                <input type="text" class="form-control" name="address" id="location" placeholder="Washington DC, USA" value="{{old('address')}}">
                @if($errors->has('address'))
                <small class="text-danger">
                    {{$errors->first('address')}}
                </small>
                @endif
            </div>
        </div>
        
        <div class="form-group my-2">
            <label for="objective" class="form-label">Objective<span class="text-danger">*</span></label>
            @error('objective')
            <small class="text-danger">
                {{$message}}
            </small>
            @enderror
            <textarea name="objective" id="objective" cols="30" rows="3" class="form-control">{{old('objective')}}</textarea>
        </div>
        
        <hr>
        
        <div class="form-group my-2">
            <div id="edu" class="d-flex gap-2 flex-wrap"></div>
            <label for="education" class="form-label">Education<span class="text-danger">*</span></label>
            @error('institute')
            <small class="text-danger">
                {{$message}}
            </small>
            @enderror
            <input type="text" class="form-control my-2" placeholder="School / College / University" id="institute">
            <input type="text" class="form-control my-2" placeholder="Degree" id="degree">
            @error('degree')
            <small class="text-danger">
                {{$message}}
            </small>
            @enderror
            <input type="text" class="form-control my-2" placeholder="Location" id="ins-location">
            @error('ins_location')
            <small class="text-danger">
                {{$message}}
            </small>
            @enderror
            <input type="text" class="form-control my-2" placeholder="Grade / Marks / Percentage" id="marks">
            @error('marks')
            <small class="text-danger">
                {{$message}}
            </small>
            @enderror
            <input type="text" class="form-control my-2" placeholder="Year of passing" id="yop">
            @error('yop')
            <small class="text-danger d-block">
                {{$message}}
            </small>
            @enderror
            <button type="button" class="btn btn-primary btn-sm" id="add-edu-btn">Add Education</button>
        </div>
        
        <hr>
        
        <div class="form-group my-2">
            <label for="skills" class="form-label">Skills<span class="text-danger">*</span></label>
            @error('skills')
            <small class="text-danger d-block">
                {{$message}}
            </small>
            @enderror
            <div id="skills">
                </div>
                <div class="position-relative">
                    <input type="text" class="form-control" id="skill-input" placeholder="JavaScript, Python, PHP">
                    <button type="button" class="btn btn-primary position-absolute top-0 end-0" id="skill-add-btn">Add</button>
                </div>
            </div>
            
            <hr>
            
            <div class="form-group my-2">
                <div id="exp" class="d-flex gap-2 flex-wrap"></div>
                <label for="experience" class="form-label">Experience<span class="text-danger">*</span></label>
                <input type="text" class="form-control my-2" id="position" placeholder="Position">
                @error('position')
                <small class="text-danger d-block">
                    {{$message}}
                </small>
                @enderror
                <input type="text" class="form-control my-2" id="comp-name" placeholder="Company">
                @error('company')
                <small class="text-danger d-block">
                    {{$message}}
                </small>
                @enderror
                <input type="text" class="form-control my-2" id="desc" placeholder="Describe your role">
                @error('description')
                <small class="text-danger d-block">
                    {{$message}}
                </small>
                @enderror
                <label for="experience" class="form-label">Joining Date<span class="text-danger">*</span></label>
                <input type="date" class="form-control my-2" id="start-date" placeholder="Duration">
                @error('start_date')
                <small class="text-danger d-block">
                    {{$message}}
                </small>
                @enderror
                <label for="experience" class="form-label">Leaving Date<span class="text-danger">*</span></label>
                <input type="date" class="form-control my-2" id="end-date" placeholder="Duration">
                @error('end_date')
                <small class="text-danger d-block">
                    {{$message}}
                </small>
                @enderror
                <button type="button" class="btn btn-primary btn-sm" id="add-exp-btn">Add Experience</button>
            </div>

        <button type="submit" class="btn btn-outline-primary mb-2 w-100">Create</button>

    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@if(Session('error'))
<script>
Swal.fire(
  'Resume Created',
  "{{ session('success') }}",
  'success'
)
</script>
@endif
@endsection
@push('script')
<script type="module" src="{{asset('assets/js/create.js')}}"></script>
@if (session('success'))
<script>
    Swal.fire(
      'Resume Created',
      "{{ session('success') }}",
      'success'
    )
</script>
@endif
@endpush('script')