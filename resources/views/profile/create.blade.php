@extends('layout.app')
@section('content')
@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif
    <div class="container">
        <div class="mt-2">
            <h3 class="text-center">Form</h3>
            <div class="card card-body">
                    <form  method="POST" action="{{ route('profile.store') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class = "form-group">
                            <label for="title">Title</label>
                            <input id="title" type="text" class="form-control" name="title" value="{{ old('title') }}" >
                        </div>
                        @error('title')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                        <div class = "form-group">
                            <label for="description" >Description</label>
                                <textarea id="description" type="text" class="form-control" name="description">{{ old('description') }}</textarea>
                        </div>
                        @error('description')
                             <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                        <div class = "form-group">
                            <label for="images" >Images</label>
                                <input id="images" type="file" class="form-control"  name="images[]" multiple accept="image/*>
                        </div>
                        @error('images')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                        <div class = "form-group">
                            <label for="email">Email</label>
                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" >
                        </div>
                        @error('email')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                        <div class = "form-group">
                            <label for="phone">Phone</label>
                            <input id="phone" type="number" class="form-control" name="phone" value="{{ old('phone') }}" >
                        </div>
                        @error('phone')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                        <div class="form-group">
                                <button type="submit" class="btn btn-primary">
                                    Create
                                </button>
                    </form>
            </div>
        </div>
    </div>

@endsection
