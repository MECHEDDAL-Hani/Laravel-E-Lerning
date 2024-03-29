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
    <div class="form-inline d-flex justify-content-between bd-highlight">
        <div class="flex-row">
            <a href="{{ route('course.info' , ['id' => $id] ) }}">
                <button type="button" class="btn btn-secondary btn-sm my-2 my-sm-0">Back</button>
            </a>
        </div>
        <div class="flex-row flex-row-reverse">
            <a href="{{ route('exercise.edit' , ['id' => $id , 'practice_id' => $exercise->practice_id ]  ) }}">
                <button type="button" class="btn btn-success btn-sm my-2 my-sm-0">Update</button>
            </a>
            <a href="{{ route('StudentExercise.show' , ['id' => $id , 'practice_id' => $exercise->practice_id ]  ) }}">
                <button type="button" class="btn btn-info btn-sm my-2 my-sm-0">See Proposed Solutions</button>
            </a>
        </div>
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
</script>
@endsection