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
                    @if (session()->has('StoreStudent'))
                    <div class="alert alert-success text-center my-1" role="alert">
                        {{ session()->get('StoreStudent') }}
                    </div>
                    @endif
                    @if (session()->has('DeletStudent'))
                    <div class="alert alert-danger text-center my-1" role="alert">
                        {{ session()->get('DeletStudent') }}
                    </div>
                    @endif
                    @if (session()->has('UpdateStudent'))
                    <div class="alert alert-info text-center my-1" role="alert">
                        {{ session()->get('UpdateStudent') }}
                    </div>
                    @endif
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
                                    <form class="d-inline" action="{{ route('student.destroy') }}" method="POST">
                                        @csrf
                                        <input type="hidden" value="{{$student->user_id}}" name="id_user">
                                        <button class="btn btn-danger btn-sm my-2 my-sm-0" type="submit">Delet</button>
                                    </form>
                                    <form class="d-inline" action="{{ route('teacher.store') }}" method="POST">
                                        @csrf
                                        <input type="hidden" value="{{$student->user_id}}" name="id_user">
                                        <button class="btn btn-success btn-sm my-2 my-sm-0"
                                            type="submit">Update</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">New
                        Student </button>

                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="card-wrapper">
                                    <div class="card fat">
                                        <div class="card-body">
                                            <h4 class="card-title text-center">New Student</h4>
                                            <form method="POST" class="my-login-validation"
                                                action="{{ url( route('student.store') ) }}">
                                                @csrf
                                                <div class="form-group">
                                                    <label for="name">Name</label>
                                                    <input id="name" type="text" class="form-control " name="name"
                                                        required autofocus>
                                                </div>
                                                <div class="form-group">
                                                    <label for="email">E-Mail Address</label>
                                                    <input id="email" type="email" class="form-control " name="email"
                                                        required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="password">Password</label>
                                                    <input id="password" type="text" class="form-control" 
                                                        name="password" required data-eye>
                                                    <div class="form-group m-5">
                                                        <button type="submit" class="btn btn-primary btn-block">
                                                            Add new Student
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
                <div id='list_teacher' class="w-100 card my-4">
                    <header class="h3 text-center my-1"> List Teacher</header>
                    @if (session()->has('CreeatTeacher'))
                    <div class="alert alert-success text-center my-1" role="alert">
                        {{ session()->get('CreeatTeacher') }}
                    </div>
                    @endif
                    @if (session()->has('DestroyTeacher'))
                    <div class="alert alert-danger text-center my-1" role="alert">
                        {{ session()->get('DestroyTeacher') }}
                    </div>
                    @endif
                    @if ($errors->any())
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>
                            {{$error}}
                        </li>
                        @endforeach
                    </ul>
                    @endif
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
                                    <form class="d-inline" action="{{ route('teacher.destroy') }}" method="POST">
                                        @csrf
                                        <input type="hidden" value="{{$teacher->student_id}}" name="id_teacher">
                                        <button class="btn btn-danger btn-sm my-2 my-sm-0" type="submit"> Delet
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal2">New
                        Teacher </button>

                    <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="card-wrapper">
                                    <div class="card fat">
                                        <div class="card-body">
                                            <h4 class="card-title text-center">New Teacher</h4>
                                            <form method="POST" class="my-login-validation" action="{{ url(route('teacher.store2')) }}">
                                                @csrf
                                                <div class="form-group">
                                                    <label for="name">Name</label>
                                                    <input id="name" type="text" class="form-control " name="name" required autofocus>
                                                </div>
                                                <div class="form-group">
                                                    <label for="email">E-Mail Address</label>
                                                    <input id="email" type="email" class="form-control " name="email" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="password">Password</label>
                                                    <input id="password" type="text" class="form-control" 
                                                                    name="password" required data-eye>
                                                    <div class="form-group m-5">
                                                        <button type="submit" class="btn btn-primary btn-block">
                                                            Add new Teacher
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
            <!-- /.row -->
        </div>
        <!-- /.col-lg-9 -->
    </div>
    <!-- /.row -->
</div>
@endsection