@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row">
        <div class="col-3">
            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#Liste-Lessons" role="tab"
                    aria-controls="v-pills-home" aria-selected="true">Liste Lessons</a>
                <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#List-Exercices" role="tab"
                    aria-controls="v-pills-profile" aria-selected="false">Liste Exercices</a>
                <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#List-Exame" role="tab"
                    aria-controls="v-pills-messages" aria-selected="false">Exame</a>
                <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#Solved-Exercices" role="tab"
                    aria-controls="v-pills-messages" aria-selected="false">Solved Exercices </a>
                <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#Solved-Exame" role="tab"
                    aria-controls="v-pills-messages" aria-selected="false">Solved Exame</a>
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
                                <th scope="col" colspan="2">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($lessons as $lesson)
                            <tr>
                                <td>{{$lesson->resource->title}}</td>
                                <td>{{$lesson->resource->description}}</td>
                                <td>
                                    <a
                                        href="{{ route('lesson.show2' , ['id' => $id , 'resource_id' => $lesson->resource_id] ) }}">
                                        <button type="button"
                                            class="btn btn-secondary btn-sm my-2 my-sm-0">Show</button>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div id='List-Exercices' class="w-100 card my-4">
                    <header class="h3 text-center my-1"> List Exercices</header>
                    <table class="table table-hover text-center">
                        <thead>
                            <tr>
                                <th scope="col">Title</th>
                                <th scope="col">Description</th>
                                <th scope="col" colspan="2">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($exercises as $exercise)
                            <tr>
                                <td>{{$exercise->practice->resource->title}}</td>
                                <td>{{$exercise->practice->resource->description}}</td>
                                <td>
                                    <a
                                        href="{{ route('exercise.show2' , ['id' => $id , 'practice_id' => $exercise->practice_id ] ) }}">
                                        <button type="button"
                                            class="btn btn-secondary btn-sm my-2 my-sm-0">Show</button>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div id='List-Exame' class="w-100 card my-4">
                    <header class="h3 text-center my-1">Exame</header>
                    <table class="table table-hover text-center">
                        <thead>
                            <tr>
                                <th scope="col">Title</th>
                                <th scope="col">Description</th>
                                <th scope="col" colspan="2">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (empty($exam))
                            @foreach ($exams as $exam)
                            <tr>
                                <td>{{$exam->practice->resource->title}}</td>
                                <td>{{$exam->practice->resource->description}}</td>
                                <td>

                                    <a
                                        href="{{ route('exam.show2' , ['id' => $id , 'practice_id' => $exam->practice_id ] ) }}">
                                        <button type="button"
                                            class="btn btn-secondary btn-sm my-2 my-sm-0">Show</button>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
                <div id='Solved-Exercices' class="w-100 card my-4">
                    <header class="h3 text-center my-1">Corrected Exercices</header>
                    <table class="table table-hover text-center">
                        <thead>
                            <tr>
                                <th scope="col">Title</th>
                                <th scope="col" colspan="2">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($solvexercises as $solvexercise)
                            <tr>
                                <td>{{$solvexercise->exercise->practice->resource->title}}</td>
                                <td>
                                    <button type="button" class="btn btn-secondary btn-sm my-2 my-sm-0" data-toggle="modal"
                                        data-target="#solvexercise{{$solvexercise->id}}">Show</button>
                                    <div class="modal fade" id="solvexercise{{$solvexercise->id}}" tabindex="-1" role="dialog"
                                        aria-labelledby="solvexercise{{$solvexercise->id}}" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalCenterTitle">
                                                           Title :  {{$solvexercise->exercise->practice->resource->title}}</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        {{ $solvexercise->reponce->notice }}
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div id='Solved-Exame' class="w-100 card my-4">
                    <header class="h3 text-center my-1">Corrected Exame</header>
                    <table class="table table-hover text-center">
                        <thead>
                            <tr>
                                <th scope="col">Title</th>
                                <th scope="col" colspan="2">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- @if (empty($solvexams)) --}}
                            @foreach ($solvexams as $solvexam)
                            <tr>
                                <td>{{$solvexam->exam->practice->resource->title}}</td>
                                <td>
                                    <button type="button" class="btn btn-secondary btn-sm my-2 my-sm-0" data-toggle="modal"
                                        data-target="#solvexam{{$solvexam->id}}">Show</button>
                                    <div class="modal fade" id="solvexam{{$solvexam->id}}" tabindex="-1" role="dialog"
                                        aria-labelledby="solvexam{{$solvexam->id}}" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalCenterTitle">
                                                            Title : {{$solvexam->exam->practice->resource->title}}</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                        </button>
                                                        <br>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="">
                                                            <span>Note : {{$solvexam->note}}</span>
                                                        </div>
                                                        <div class="">
                                                            {{ $solvexam->reponce->notice }}
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                </td>
                            </tr>
                            @endforeach
                            {{-- @endif --}}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection