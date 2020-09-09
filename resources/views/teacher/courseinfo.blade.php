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
                            @foreach ($lessons as $lesson)
                            <tr>
                                <td>{{$lesson->resource->title}}</td>
                                <td>{{$lesson->resource->description}}</td>
                                <td>{{$lesson->resource->created_at}}</td>
                                <td>
                                    <form class="d-inline" action="{{ route('resource.destroy', ['id' => $id]) }}"
                                        method="POST">
                                        @csrf
                                        <input type="hidden" value="{{$lesson->resource->id}}" name="resource_id">
                                        <button class="btn btn-danger btn-sm my-2 my-sm-0" type="submit">Delet</button>
                                    </form>
                                    <a
                                        href="{{ route('lesson.edit' , ['id' => $id , 'resource_id' => $lesson->resource_id] ) }}"><button
                                            type="button"
                                            class="btn btn-success btn-sm my-2 my-sm-0">Update</button></a>
                                    <a
                                        href="{{ route('lesson.show' , ['id' => $id , 'resource_id' => $lesson->resource_id] ) }}"><button
                                            type="button" class="btn btn-secondary btn-sm my-2 my-sm-0">Show</button></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <a href="{{ route('lesson.creeat' , ['id' => $id] ) }}"><button type="button"
                            class="btn btn-primary w-100">New
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
                            @foreach ($exercises as $exercise)
                            <tr>
                                <td>{{$exercise->practice->resource->title}}</td>
                                <td>{{$exercise->practice->resource->description}}</td>
                                <td>{{$exercise->practice->resource->created_at}}</td>
                                <td>
                                    <form class="d-inline" action="{{ route('resource.destroy', ['id' => $id]) }}"
                                        method="POST">
                                        @csrf
                                        <input type="hidden" value="{{$exercise->practice->resource->id}}"
                                            name="resource_id">
                                        <button class="btn btn-danger btn-sm my-2 my-sm-0" type="submit">Delet</button>
                                    </form>
                                    <a
                                        href="{{ route('exercise.edit' , ['id' => $id , 'practice_id' => $exercise->practice_id ] ) }}"><button
                                            type="button"
                                            class="btn btn-success btn-sm my-2 my-sm-0">Update</button></a>
                                   <a href="{{ route('exercise.show' , ['id' => $id , 'practice_id' => $exercise->practice_id ] ) }}"><button type="button"
                                        class="btn btn-secondary btn-sm my-2 my-sm-0">Show</button></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <a href="{{ route('exercise.creeat' , ['id' => $id] ) }}"><button type="button"
                            class="btn btn-primary w-100">New
                            Exercise </button></a>
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
                            @if (empty($exam))
                            @foreach ($exams as $exam)
                            <tr>
                                <td>{{$exam->practice->resource->title}}</td>
                                <td>{{$exam->practice->resource->description}}</td>
                                <td>{{$exam->practice->resource->created_at}}</td>
                                <td>
                                    <form class="d-inline" action="{{ route('resource.destroy', ['id' => $id]) }}"
                                        method="POST">
                                        @csrf
                                        <input type="hidden" value="{{$exam->practice->resource->id}}"
                                            name="resource_id">
                                        <button class="btn btn-danger btn-sm my-2 my-sm-0" type="submit">Delet</button>
                                    </form>
                                    <a href="{{ route('exam.edit' , ['id' => $id , 'practice_id' => $exam->practice_id ] ) }}"><button type="button"
                                            class="btn btn-success btn-sm my-2 my-sm-0">Update</button></a>
                                    <a href="{{ route('exam.show' , ['id' => $id , 'practice_id' => $exam->practice_id ] ) }}"><button type="button"
                                            class="btn btn-secondary btn-sm my-2 my-sm-0">Show</button></a>
                                    </td>
                            </tr>
                            @endforeach
                            @endif
                        </tbody>
                    </table>
                    @if (empty($exam))
                    <a href="{{ route('exam.creeat' , ['id' => $id] ) }}"><button type="button"
                            class="btn btn-primary w-100">New
                            Exam </button></a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection