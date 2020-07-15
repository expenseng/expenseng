@extends('layouts.scaffold')
@push('css')
<title>FG Expense - Home</title>
<link rel="stylesheet" href="{{ asset('css/aboutus-header_footer.css') }}">
<link rel="stylesheet" href="{{ asset('css/aboutus.style.css')}}">
@endpush

@section('main')

<h1>Create Tweet</h1>

{{ Form::open(array('route' => 'tweets.store')) }}
	<ul>
        <li>
            {{ Form::label('body', 'Body:') }}
            {{ Form::textarea('body', null, array('style' => 'width: 850px;')) }}
        </li>

        <li>
        	{{ Form::select('tags[]', $tags, null, array('multiple', 'size' => 10)) }}
        </li>

		<li>
			{{ Form::submit('Submit', array('class' => 'btn btn-info')) }}
		</li>
	</ul>
{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop