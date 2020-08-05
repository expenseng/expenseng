@extends('blogetc_admin::layouts.home')
@push('css')
    <title>ExpenseNg - Categories</title>
@endpush
@section('content')
<div class="content" id="app">
    <div class="container-fluid">
        <!-- flash messages  -->
        @include('backend.partials.flash')
        <!-- ======================================== -->
        <main class="py-4">
            <div class="row">
                <div class="col-md-9">
                    <h5 class="text-center p-4 text-white" style="background: #6c757d">Blog Categories</h5>
                    @forelse ($categories as $category)
                        <div class="card m-4" style="">
                            <div class="card-body">
                                <h5 class="card-title"><a href="{{$category->url()}}">{{$category->category_name}}</a></h5>
                                <a href="{{$category->url()}}" class="card-link btn ">
                                    View Posts in this category
                                </a>
                                <a href="{{$category->edit_url()}}" class="card-link btn btn-defualt">Edit Category</a>
                                <form
                                        onsubmit="return confirm('Are you sure you want to delete this blog post category?\n You cannot undo this action!');"
                                        method="post"
                                        action="{{route("blogetc.admin.categories.destroy_category", $category->id)}}"
                                        class="float-right">
                                    @csrf
                                    @method('DELETE')
                                    <input type="submit" class="btn btn-danger btn-sm" value="Delete">
                                </form>
                            </div>
                        </div>
                    @empty
                        <div class="alert alert-danger">None found, why don't you add one?</div>
                    @endforelse
                </div>
                <div class="col-md-3">
                    @include("blogetc_admin::layouts.sidebar")
                </div>
            </div>
        </main>
    </div>
</div>

    <div class="text-center">
        {{ $categories->links() }}
    </div>
@endsection
