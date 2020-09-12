@extends('layouts.app')

@section('content')
<div class="container">
    <script src="{{ asset('js/ckeditor5/ckeditor.js') }}"></script>
    <div class="row">
        <div class="text-center w-100 card-header">
            <h3>Liste Proposed Solutions By Students</h3>
        </div>
        <table class="table table-hover text-center">
            <tbody>
                @foreach ($soulitions as $soulition)
                <tr class="container">
                    <td>
                        <div class="centered">
                            <div id="#editor{{$soulition->id}}">
                                {!! $soulition->reponce->answare !!}
                            </div>
                        </div>
                        <script>
                            ClassicEditor
                                .create( document.querySelector("#editor{{$soulition->id}}"), {
                                 toolbar: []
                                } )
                                .then( editor => {
                                window.editor = editor;
                                } )
                                .catch( err => {
                                console.error( err.stack );
                                } );
                        </script>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#evaluatesolution{{$soulition->id}}">Evaluate Solution</button>
                        
                        <div class="modal fade" id="evaluatesolution{{$soulition->id}}" tabindex="-1" role="dialog"
                            aria-labelledby="evaluatesolution{{$soulition->id}}" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="card-wrapper">
                                        <div class="card fat">
                                            <div class="card-body">
                                                <h4 class="card-title text-center">Evaluate Solution</h4>
                                                <form method="POST" action="{{ url( route('StudentExam.update' , [$id , $soulition->exam_id ]) ) }}">
                                                    @csrf
                                                    <input type="hidden" value="{{$soulition->reponce->id}}" name="id">
                                                    <input type="hidden" value="{{$soulition->id}}" name="examid">
                                                    <div class="form-group">
                                                        <label for="note">Note</label>
                                                        <input id="note" type="text" class="form-control " name="note" required autofocus>
                                                    </div>
                                                    <div class="form-group">
                                                        <textarea name="notice" cols="30" rows="10" class="form-control"></textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="form-group m-5">
                                                            <button type="submit" class="btn btn-primary btn-block">
                                                                Save
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
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="flex-row">
            <a href="{{ route('exam.show' , ['id' => $id , 'practice_id' => $soulition->exam_id ] ) }}">
                <button type="button" class="btn btn-secondary btn-sm my-2 my-sm-0">Back</button>
            </a>
        </div>
    </div>
</div>
@endsection