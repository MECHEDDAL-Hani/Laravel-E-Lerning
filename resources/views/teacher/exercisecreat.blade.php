@extends('layouts.app')

@section('content')
<div class="container">

    <div class="card">
        <h4 class="card-title text-center">New Exercise</h4>
        <form method="POST" class="my-login-validation" action="{{ url( route('exercise.store') ) }}">
            @csrf
            <input type="hidden" value="{{ $id }}" name="id_course">
            <div class="form-group">
                <label for="title">Title</label>
                <input id="title" type="text" class="form-control " name="title" required autofocus>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <input id="description" type="text" class="form-control " name="description" required>
            </div>
            <div class="form-group">
                <label for="editor">Content</label>
                <div class="centered">
                    <textarea name="content" id="editor" cols="30" rows="10" class="form-control"></textarea>
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