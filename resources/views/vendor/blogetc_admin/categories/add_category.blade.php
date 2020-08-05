@extends('blogetc_admin::layouts.home')
@push('css')
    <title>ExpenseNg - Add Category</title>
@endpush
@section('content')
<div class="content" id="app">
    <div class="container-fluid">
        <main class="py-4">
            <div class="row">
                <div class="col-md-9">
    				<h5 class="text-center p-4 text-white" style="background: #6c757d">Add Blog Category</h5>

				    <form method="post" action="{{ route('blogetc.admin.categories.create_category') }}" enctype="multipart/form-data">
				        @csrf
				        @include('blogetc_admin::categories.form', ['category' => new \WebDevEtc\BlogEtc\Models\Category()])

				        <input type="submit" class="btn btn-primary" value="Add New Category">
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

@section('js')
	
@endsection