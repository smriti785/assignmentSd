@extends('layout.app')
@section('content')
@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif
    <div class="container">
        <div class="mt-2">
            <div class="card card-body">
                    <form  method="POST" action="{{route('profile.update',$pro->id) }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        @method('PUT')
                        <div class = "form-group">
                            <label for="name">Name</label>
                            <input id="name" type="text" class="form-control" name="name" value="{{$pro->name}}" >
                        </div>
                        @error('name')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                        <div class = "form-group">
                            <label for="profile" >Profile</label>
                                <textarea id="profile" type="text" class="form-control" name="profile">{{$pro->profile }}</textarea>
                        </div>
                        @error('profile')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                        <div class = "form-group">
                            <label for="images" >Images</label>
                            <input id="images" type="file" class="form-control" name="images" value=" ">
                            <div class="form-group">
                                <img src="{{ Storage::url($pro->images) }}" height="200" width="200" alt="" />
                            </div>
                        </div>
                        {{-- @error('images')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror --}}
                        <div class = "form-group">
                            <label for="gender" >Gender:</label> &nbsp;
                                Male&nbsp;<input  type="radio" name="gender" value="male" @if($pro->gender == "male") checked @endif>
                                Female&nbsp;<input  type="radio"  name="gender" value="female" @if($pro->gender == "female") checked @endif>
                        </div>
                        @error('gender')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                        <div class = "form-group">
                            <label for="location" >Favorite location:&nbsp;</label>
                                <input  type="checkbox" name="location[]" value="delhi" @if(in_array('delhi', explode(',',$pro->location??''))) checked @endif>&nbsp;Delhi
                                <input  type="checkbox" name="location[]" value="mumbai" @if(in_array('mumbai', explode(',',$pro->location??''))) checked @endif>&nbsp;Mumbai
                                <input  type="checkbox" name="location[]" value="kolkata" @if(in_array('kolkata', explode(',',$pro->location??''))) checked @endif>&nbsp;Kolkata
                                <input  type="checkbox" name="location[]" value="bhagalpur" @if(in_array('bhagalpur', explode(',',$pro->location??''))) checked @endif>&nbsp;Bhagalpur
                                <input  type="checkbox" name="location[]" value="sahebganj" @if(in_array('sahebganj', explode(',',$pro->location??''))) checked @endif>&nbsp;Sahebganj
                        </div>
                        @error('location')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                        <div class="form-group">
                                <button type="submit" class="btn btn-primary">
                                    Update
                                </button>
                    </form>
            </div>
        </div>
    </div>

@endsection
