@extends('blogetc_admin::layouts.home')
@push('css')
    <title>ExpenseNg - Edit Category</title>
@endpush
@section('title', 'Edit Category ' . $category->category_name)
@section('content')
<div class="content" id="app">
    <div class="container-fluid">
    	<!-- flash messages  -->
 		@include('backend.partials.flash')
 		<!-- ======================================== -->
        <main class="py-4">
            <div class="row">
                <div class="col-md-9">
    				<h5 class="text-center p-4 text-white" style="background: #6c757d">Edit Category</h5>

				    <form method="post" action="{{ route('blogetc.admin.categories.edit_category', $category->id) }}"
				          enctype="multipart/form-data">
				        @csrf
				        @method('patch')
				        @include('blogetc_admin::categories.form', ['category' => $category])

				        <input type="submit" class="btn btn-primary" value="Save">
				    </form>
				</div>
				<div class="col-md-3">
                	@include("blogetc_admin::layouts.sidebar")
            	</div>
			</div>
		</main>
	</div>
</div>
@endsection
