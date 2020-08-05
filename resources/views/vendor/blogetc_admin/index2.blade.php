@extends("blogetc_admin::layouts.home")
@push('css')
    <title>ExpenseNg - Blog</title>
@endpush
@section("content")
<div class="content" id="app">
    <div class="container-fluid">
        <main class="py-4">
                <div class="row">
                    
                    <div class="col-md-9">
                        <h4 class="text-center p-4 text-white" style="background: #6c757d">MANAGE BLOG POST</h4>
                        <div class="row">
                                <div class="card m-12">
                                    <div class="card-body p-1">
                                        <table class="table table-striped mt-3 table-responsive">
                                            <thead class="">
                                                <tr>
                                                    <td>Image</td>
                                                    <td>Title</td>
                                                    <td>Author</td>
                                                    <td>Date</td>
                                                    <td>Published</td>
                                                    <td>Category</td>
                                                    <td></td>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                @forelse($posts as $post)
                                                <tr>
                                                    <td>{!! $post->imageTag('thumbnail', true, 'img-fluid') !!}</td>
                                                    <td>{{$post->title}}</td>
                                                    <td>{{$post->author_string()}}</td>
                                                    <td>{{$post->posted_at}}</td>
                                                    <td>
                                                        {!!($post->is_published ? "Yes" : '<span class="border border-danger rounded p-1">No</span>')!!}
                                                    </td>
                                                    <td>
                                                        @if(count($post->categories))
                                                        @foreach($post->categories as $category)
                                                        <a class="btn-sm m-1" href="{{$category->edit_url()}}">
                                                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>

                                                            {{$category->category_name}}
                                                        </a>
                                                    @endforeach
                                                    @else No Categories
                                                    @endif
                                                    </td>
                                                    <td>
                                                         <a title="view" style="border: 0" href="{{$post->url()}}" class="btn">
                                                            <i class="fa fa-file-text-o" aria-hidden="true"></i>
                                                         </a>

                                                        <a title="edit" style="border: 0" href="{{$post->edit_url()}}" class="btn">
                                                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                        </a>
                                            

                                                        

                                                        <form onsubmit="return confirm('Are you sure you want to delete this blog post?\n You cannot undo this action!');"
                                                             method='post' action='{{route("blogetc.admin.destroy_post", $post->id)}}' class='float-right'>
                                                         @csrf
                                                        <input name="_method" type="hidden"/>
                                                        <button style="border: 0" type='submit' class='btn btn-danger btn-sm'>
                                                            <i class="fa fa-trash-o" aria-hidden="true"></i>
                                                        </button>
                                                        </form>

                                                    </td>
                                                </tr>
                                                 @empty
                                                        <div class="alert alert-warning">No posts to show you. Why don't you add one?</div>
                                                @endforelse
                                            </tbody>
                                        </table>
                                        <div class="text-center">
                                            {{$posts->appends( [] )->links()}}
                                         </div>
                                    </div>
                                </div>
                           
                        </div>
                    </div>

                    <div class="col-md-3">
                        @include("blogetc_admin::layouts.sidebar")
                    </div>

                </div>
        </main>
    </div>
</div>

@endsection
