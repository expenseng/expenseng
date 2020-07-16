@extends('layouts.master')
@push('css')
<title>FG Expense - Home</title>
<link rel="stylesheet" href="{{ asset('css/aboutus-header_footer.css') }}">
<link rel="stylesheet" href="{{ asset('css/aboutus.style.css')}}">
@endpush

@section('main')

<h1>Edit Tweet</h1>
{{ Form::model($tweet, array('method' => 'PATCH', 'route' => array('tweets.update', $tweet->id))) }}
	<ul>
        <li>
            {{ Form::label('body', 'Body:') }}
            {{ Form::textarea('body', $tweet->body, array('style' => 'width: 850px;')) }}
        </li>

        <li>
        	{{ Form::select('tags[]', $tags, $selectedTags, array('multiple', 'size' => 10)) }}
        </li>

		<li>
			{{ Form::submit('Update', array('class' => 'btn btn-info')) }}
			{{ link_to_route('tweets.show', 'Cancel', $tweet->id, array('class' => 'btn')) }}
		</li>
	</ul>
{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop