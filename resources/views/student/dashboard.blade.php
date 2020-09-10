@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row">
            <div class="text-center w-100 card-header">
                <h3>Dashboard Student</h3>
            </div>
            <div class="w-100 card my-4">
                <header class="h3 text-center my-1"> List Courses</header>
                <table class="table table-hover text-center">
                    <thead>
                        <tr> 
                            <th scope="col">Title</th>
                            <th scope="col">Description</th>
                            <th scope="col">Teacher</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($courses as $course)
                        <tr>
                            <td>{{$course->title}}</td>
                            <td>{{$course->description}}</td>
                            <td>{{$course->teacher->student->user->name}}</td>
                            <td>
                                <a href="{{ route('course.info2' , [$course->id]) }}">
                                    <button type="button" class="btn btn-info btn-sm my-2 my-sm-0">More Info</button>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
        </div>
    </div>
</div>
@endsection
