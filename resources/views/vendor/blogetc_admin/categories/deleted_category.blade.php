@extends('blogetc_admin::layouts.home')
@push('css')
    <title>ExpenseNg - Delete Category</title>
@endpush
@section('title','Category Deleted')
@section('content')
<div class="content" id="app">
    <div class="container-fluid">
    	<!-- flash messages  -->
        	@include('backend.partials.flash')
        <!-- ======================================== -->
        <main class="py-4">
            <div class="row">
                <div class="col-md-9">
				    <p class="alert alert-success">
				        <b>Category deleted</b>
				    </p>
				</div>
				<div class="col-md-3">
                	@include("blogetc_admin::layouts.sidebar")
            	</div>
			</div>
		</main>
	</div>
</div>
@endsection
