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
            <h3 class="text-center">Table of Profile</h3>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('profile.create') }}">Add</a>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Images</th>
                        <th>Email</th>
                        <th>Phone</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pro as $profile)
                    <tr>
                        <td>{{$profile->title}}</td>
                        <td>{{$profile->description}}</td>
                        @php
                            $img = json_decode ($profile->images);
                        @endphp
                        <td>
                        @foreach($img as $key => $val)
                            <img src="{{ asset('storage/profile_images/' . $val) }}" width="100px" height="100px">
                        @endforeach
                        </td>
                        <td>{{$profile->email}}</td>
                        <td>{{$profile->phone}}</td>
                    </tr>

                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
