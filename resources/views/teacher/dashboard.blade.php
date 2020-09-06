@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row">

        <div class="text-center w-100 card-header">
            <h3>Dashboard Teacher</h3>
        </div>

        <div id='list_student' class="w-100 card my-4">
            <header class="h3 text-center my-1"> List Courses</header>
            @if (session()->has('CreeatCourse'))
            <div class="alert alert-success text-center my-1" role="alert">
                {{ session()->get('CreeatCourse') }}
            </div>
            @endif
            @if (session()->has('DestroyCourse'))
            <div class="alert alert-danger text-center my-1" role="alert">
                {{ session()->get('DestroyCourse') }}
            </div>
            @endif
            {{--  @if (session()->has('UpdateStudent'))
        <div class="alert alert-info text-center my-1" role="alert">
            {{ session()->get('UpdateStudent') }}
        </div>
        @endif --}}
        <table class="table table-hover text-center">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Description</th>
                    <th scope="col">Craat at</th>
                    <th scope="col" colspan="2">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($courses as $course)
                <tr>
                    <td scope="row">{{$course->id}}</td>
                    <td>{{$course->title}}</td>
                    <td>{{$course->description}}</td>
                    <td>{{$course->created_at}}</td>
                    <td>
                        <form class="d-inline" action="{{ route('course.destroy') }}" method="POST">
                            @csrf
                            <input type="hidden" value="{{$course->id}}" name="id">
                            <button class="btn btn-danger btn-sm my-2 my-sm-0" type="submit">Delet</button>
                        </form>
                        <a href="{{ route('course.info' , [$course->id]) }}"><button type="button" class="btn btn-info btn-sm my-2 my-sm-0">More Info</button></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">New
            Course </button>

        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="card-wrapper">
                        <div class="card fat">
                            <div class="card-body">
                                <h4 class="card-title text-center">New Course</h4>
                                <form method="POST" class="my-login-validation" action="{{ route('course.store') }}">
                                    @csrf
                                    <input type="hidden" value="{{ Auth::user()->id }}" name="teacher_id">
                                    <div class="form-group">
                                        <label for="title">Title</label>
                                        <input id="title" type="text" class="form-control " name="title" required
                                            autofocus>
                                    </div>
                                    <div class="form-group">
                                        <label for="description">Description</label>
                                        <input id="description" type="text" class="form-control " name="description"
                                            required>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-group m-5">
                                            <button type="submit" class="btn btn-primary btn-block">
                                                Add New Course
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection