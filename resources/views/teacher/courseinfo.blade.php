@extends('layouts.app')

@section('content')
<div class="container">
    
    <div class="row">
        <div class="col-lg-3">
            <div class="list-group">
                <a href="#Liste-Lessons" class="list-group-item">Liste Lessons</button></a>
                <a href="#List-Exercices" class="list-group-item">Liste Exercices</button></a>
                <a href="#List-Exame" class="list-group-item">Exame</button></a>
            </div>
        </div>
        <div class="col-lg-9 row">
            <div class="text-center w-100 card-header">
                <h3>Course Information </h3>
                <div id='Liste-Lessons' class="w-100 card my-4">
                    <header class="h3 text-center my-1"> List Lessons</header>
                    <table class="table table-hover text-center">
                        <thead>
                            <tr>
                                <th scope="col">Title</th>
                                <th scope="col">Description</th>
                                <th scope="col">Craat at</th>
                                <th scope="col" colspan="2">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- @foreach ($students as $student)
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
                                    <button class="btn btn-success btn-sm my-2 my-sm-0" type="submit">Update</button>
                                </form>
                            </td>
                            </tr>
                            @endforeach --}}
                        </tbody>
                    </table>
                 <a href="{{ route('lesson.creeat' , ['id' => $id] ) }}"><button type="button" class="btn btn-primary w-100" data-toggle="modal" data-target="#NewLessson">New
                        Lesson </button></a>

                    
                </div>

                <div id='List-Exercices' class="w-100 card my-4">
                    <header class="h3 text-center my-1"> List Exercices</header>
                    <table class="table table-hover text-center">
                        <thead>
                            <tr>
                                <th scope="col">Title</th>
                                <th scope="col">Description</th>
                                <th scope="col">Craat at</th>
                                <th scope="col" colspan="2">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- @foreach ($students as $student)
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
                                    <button class="btn btn-success btn-sm my-2 my-sm-0" type="submit">Update</button>
                                </form>
                            </td>
                            </tr>
                            @endforeach --}}
                        </tbody>
                    </table>
                   <a href="{{ route('exercise.creeat' , ['id' => $id] ) }}"><button type="button" class="btn btn-primary w-100"
                            data-toggle="modal" data-target="#NewLessson">New
                            Exercise </button></a>

                    <div class="modal fade" id="NewExercice" tabindex="-1" role="dialog" aria-labelledby="NewExercice"
                        aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="card-wrapper">
                                    <div class="card fat">
                                        <div class="card-body">
                                            <h4 class="card-title text-center">New Exercice</h4>
                                            <form method="POST" class="my-login-validation"
                                                action="{{ url( route('student.store') ) }}">
                                                @csrf
                                                <div class="form-group">
                                                    <label for="title">Title</label>
                                                    <input id="title" type="text" class="form-control " name="title"
                                                        required autofocus>
                                                </div>
                                                <div class="form-group">
                                                    <label for="description">Description</label>
                                                    <input id="description" type="text" class="form-control "
                                                        name="description" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="password">Password</label>
                                                    <input id="password" type="text" class="form-control"
                                                        name="password" required data-eye>
                                                    <div class="form-group m-5">
                                                        <button type="submit" class="btn btn-primary btn-block">
                                                            Add new Exercice
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

                <div id='List-Exame' class="w-100 card my-4">
                    <header class="h3 text-center my-1"> Exame</header>
                    <table class="table table-hover text-center">
                        <thead>
                            <tr>
                                <th scope="col">Title</th>
                                <th scope="col">Description</th>
                                <th scope="col">Craat at</th>
                                <th scope="col" colspan="2">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- @foreach ($students as $student)
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
                                    <button class="btn btn-success btn-sm my-2 my-sm-0" type="submit">Update</button>
                                </form>
                            </td>
                            </tr>
                            @endforeach --}}
                        </tbody>
                    </table>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#NewExame">New
                        Exame </button>

                    <div class="modal fade" id="NewExame" tabindex="-1" role="dialog" aria-labelledby="NewExame"
                        aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="card-wrapper">
                                    <div class="card fat">
                                        <div class="card-body">
                                            <h4 class="card-title text-center">New Exame</h4>
                                            <form method="POST" class="my-login-validation"
                                                action="{{ url( route('student.store') ) }}">
                                                @csrf
                                                <div class="form-group">
                                                    <label for="title">Title</label>
                                                    <input id="title" type="text" class="form-control " name="title"
                                                        required autofocus>
                                                </div>
                                                <div class="form-group">
                                                    <label for="description">Description</label>
                                                    <input id="description" type="text" class="form-control "
                                                        name="description" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="password">Password</label>
                                                    <input id="password" type="text" class="form-control"
                                                        name="password" required data-eye>
                                                    <div class="form-group m-5">
                                                        <button type="submit" class="btn btn-primary btn-block">
                                                            Add new Exame
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
    </div>
</div>

@endsection