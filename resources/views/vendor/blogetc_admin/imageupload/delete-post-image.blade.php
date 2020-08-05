@extends('blogetc_admin::layouts.home')
@section('content')
<div class="content" id="app">
    <div class="container-fluid">
        <main class="py-4">
            <div class="row">
                <div class="col-md-9">   
				    <p>Are you sure you want to delete the featured image for the selected post?</p>

				    <form method="post" action="{{ route('blogetc.admin.images.delete-post-image-confirmed', $postId) }}">
				        @method('DELETE')
				        @csrf
				        <input type="submit" value="Delete the images" class="btn btn-danger" />
				    </form>
				</div>
			</div>
		</main>
	</div>
</div>
@endsection
