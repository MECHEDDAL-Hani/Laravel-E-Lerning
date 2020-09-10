@extends('layouts.app')

@section('content')
<div class="container">
    <div class="w-100 card my-4">
        <header class="h3 text-center my-1"> List Courses</header>

        <table class="table table-hover text-center">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Description</th>
                    <th scope="col">Teacher</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($courses as $course)
                <tr>
                    <td scope="row">{{$course->id}}</td>
                    <td>{{$course->title}}</td>
                    <td>{{$course->description}}</td>
                    <td>{{$course->teacher->student->user->name}}</td>
                    <td>
                        <form class="d-inline" action="{{ route('studentcourse.store') }}" method="POST">
                            @csrf
                            <input type="hidden" value="{{$course->id}}" name="course_id">
                            <button class="btn btn-success btn-sm my-2 my-sm-0" type="submit">Register</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection