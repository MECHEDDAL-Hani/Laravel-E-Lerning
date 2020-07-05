@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row">

        <div class="col-lg-3">

            <h1 class="my-4 text-center">Dashboard Admin</h1>
            <div class="list-group">
                <a href="#list_student" class="list-group-item">Liste Student</a>
                <a href="#list_teacher" class="list-group-item">Liste Teacher</a>
            </div>

        </div>
        <!-- /.col-lg-3 -->
        <div class="col-lg-9 row">
            <div class="my-4 w-100">
                <div class="text-center w-100 card-header">
                    <h3>Dashboard</h3>
                </div>
                <div id='list_student' class="w-100 card my-4">
                    <header class="h3 text-center my-1"> List Student</header>
                    <table class="table table-hover text-center">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Craat at</th>
                                <th scope="col" colspan="2">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($students as $student)
                            <tr>
                            <td scope="row">{{$student->user_id}}</td>
                                <td>{{$student->user->name}}</td>
                                <td>{{$student->user->email}}</td>
                                <td>{{$student->user->created_at}}</td>
                                <td>
                                    {{-- <button type="button" class="btn btn-danger">Delet</button>
                                    <button type="button" class="btn btn-success">Success</button> --}}
                                    <form class="d-inline">
                                        <input type="hidden" value="" name="">
                                        <button class="btn btn-danger btn-sm my-2 my-sm-0" type="submit">Delet</button>
                                    </form>
                                    <form class="d-inline">
                                        <input type="hidden" value="" name="">
                                        <button class="btn btn-success btn-sm my-2 my-sm-0"
                                            type="submit">Update</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div id='list_teacher' class="w-100 card my-4">
                    <header class="h3 text-center my-1"> List Teacher</header>
                    <table class="table table-hover text-center">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Craat at</th>
                                <th scope="col" colspan="2">Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($teachers as $teacher)
                            <tr>
                                <td scope="row">{{$teacher->student_id}}</td>
                                <td>{{$teacher->student->user->name}}</td>
                                <td>{{$teacher->student->user->email}}</td>
                                <td>{{$teacher->student->user->created_at}}</td>
                                <td>
                                    {{-- <button type="button" class="btn btn-danger">Delet</button>
                                                            <button type="button" class="btn btn-success">Success</button> --}}
                                    <form class="d-inline">
                                        <input type="hidden" value="" name="">
                                        <button class="btn btn-danger btn-sm my-2 my-sm-0" type="submit">Delet</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.col-lg-9 -->
    </div>
    <!-- /.row -->
</div>
@endsection