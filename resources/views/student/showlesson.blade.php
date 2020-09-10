@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row center">
        <h1 class="w-100 text-center">{{ $lesson->resource->title }}</h1>
    </div>
    <div class="row center">
        <p class="w-100 text-center">{{ $lesson->resource->description }}</p>
    </div>
    <div class="form-group">
        <label for="editor">Content</label>
        <div class="centered">
            <div id="editor">
                {!! $lesson->resource->content !!}
            </div>
        </div>
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
</script>
@endsection