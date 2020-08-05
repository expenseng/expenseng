@php
    /** @var \WebDevEtc\BlogEtc\Models\Post $post */
@endphp
@extends('blogetc_admin::layouts.home')
@push('css')
    <title>ExpenseNg - Blog</title>
@endpush

@section('content')
<div class="content" id="app">
    <div class="container-fluid">
        <main class="py-4">
                <div class="row">
                    <div class="col-md-3">
                        @include("blogetc_admin::layouts.sidebar")
                    </div>
                    <div class="col-md-8">
                        <h4>Admin - Editing post
                            <a target="_blank" href="{{ $post->url() }}" class="float-right btn btn-primary">
                                View post
                            </a>
                        </h4>

                        <form method="post" action="{{ route('blogetc.admin.update_post', $post->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('patch')
                            @include('blogetc_admin::posts.form', ['post' => $post])
                            <input type="submit" class="btn btn-primary" value="Save Changes">
                        </form>
                    </div>
@endsection

@section('js')
@if( config("blogetc.use_wysiwyg") && config("blogetc.echo_html") && (in_array( Request::route()->getName() ,[ 'blogetc.admin.create_post' , 'blogetc.admin.edit_post'  ])))
    <script src="https://cdn.ckeditor.com/4.14.1/standard/ckeditor.js" integrity="sha256-wURXWeMdyFKDl3v/rGzRT42o2lslbozA3ppL/M7ZVGI=" crossorigin="anonymous"></script>

    <script>
      if (typeof (CKEDITOR) !== 'undefined') {
        CKEDITOR.replace('post_body');
      }
    </script>
@endif
@endsection