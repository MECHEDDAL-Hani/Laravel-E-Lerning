@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row center">
        <h1 class="w-100 text-center">{{ $exercise->practice->resource->title }}</h1>
    </div>
    <div class="row center">
        <p class="w-100 text-center">{{ $exercise->practice->resource->description }}</p>
    </div>
    <div class="form-group">
        <label for="editor">Content</label>
        <div class="centered">
            <div id="editor">
                {!! $exercise->practice->resource->content !!}
            </div>
        </div>
    </div>
    <div class="card">
        <h4 class="card-title text-center">Solve Exercise</h4>
        <form method="POST" class="my-login-validation" action="{{ url( route('studentexercise.store') ) }}">
            @csrf
            <input type="hidden" value="{{ $exercise->practice_id }}" name="exercise_id">
            <input type="hidden" value="{{ $id }}" name="id">
            <div class="form-group">
                <label for="editor">Content</label>
                <div class="centered">
                    <textarea name="answare" id="editor2" cols="30" rows="10" class="form-control"></textarea>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <input type="submit" name="save" value="Save" class="btn btn-primary w-100">
                        </div>
                    </div>
                </div>
        </form>
    </div>
    <div class="form-inline justify-content-between">
        <a href="{{ route('course.info2' , ['id' => $id] ) }}">
            <button type="button" class="btn btn-secondary btn-sm my-2 my-sm-0">Back</button>
        </a>
    </div>
</div>
</div>

<script src="{{ asset('js/ckeditor5/ckeditor.js') }}"></script>
<script>
    ClassicEditor
        .create( document.querySelector( '#editor' ), {
         toolbar: []
        } )
        .then( editor => {
        window.editor = editor;
        } )
        .catch( err => {
        console.error( err.stack );
        } );

    ClassicEditor
            .create( document.querySelector( '#editor2' ), {
            // toolbar: [ 'heading', '|', 'bold', 'italic', 'link' ]
            } )
            .then( editor => {
            window.editor = editor;
            } )
            .catch( err => {
            console.error( err.stack );
            } );
</script>
@endsection