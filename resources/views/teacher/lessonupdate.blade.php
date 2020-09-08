@extends('layouts.app')

@section('content')
<div class="container">

    <div class="card">
        <h4 class="card-title text-center">Update Lesson</h4>
        <form method="POST" class="my-login-validation" action="{{ url( route('lesson.update', [$id]) ) }}">
            @csrf
            <input type="hidden" value="{{ $lesson->resource->id }}" name="resource_id">
            <div class="form-group">
                <label for="title">Title</label>
                <input id="title" type="text" class="form-control" value="{{ $lesson->resource->title }}" name="title" required autofocus>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <input id="description" type="text" class="form-control" value="{{ $lesson->resource->description }}" name="description" required>
            </div>
            <div class="form-group">
                <label for="editor">Content</label>
                <div class="centered">
                    <textarea name="content" id="editor" cols="30" rows="10" class="form-control">
                       {{  $lesson->resource->content }}
                    </textarea>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <input type="submit" name="save" value="Update" class="btn btn-primary w-100">
                        </div>
                    </div>
                </div>
        </form>
    </div>
    <script src="{{ asset('js/ckeditor5/ckeditor.js') }}"></script>
    <script>
        ClassicEditor
        .create( document.querySelector( '#editor' ), {
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