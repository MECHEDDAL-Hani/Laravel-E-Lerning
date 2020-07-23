@extends('layouts.app')

@section('content')
<div class="container">
    <div id='list_student' class="w-100 card my-4">
        <header class="h3 text-center my-1"> List Courses</header>

        <table class="table table-hover text-center">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Description</th>
                    <th scope="col">Teacher</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($courses as $course)
                <tr>
                    <td scope="row">{{$course->id}}</td>
                    <td>{{$course->title}}</td>
                    <td>{{$course->description}}</td>
                    <td>{{$course->teacher->student->user->name}}</td>
                    
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @endsection