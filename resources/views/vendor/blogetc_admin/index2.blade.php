@extends("blogetc_admin::layouts.home")
@push('css')
    <title>ExpenseNg - Blog</title>
@endpush
@section("content")
<div class="content" id="app">
    <div class="container-fluid">
        <main class="py-4">
                <div class="row">
                    

                    <div class="col-md-8">
                        <h4 class="text-center p-4 text-white" style="background: #6c757d">MANAGE BLOG POST</h4>
                        <div class="row">
                             @forelse($posts as $post)
                                <div class="col-md-6">
                                <div class="card m-4">
                                    <div class="card-body p-1">
                                        <h5 class="card-title text-center text-muted p-2 irector-name mt-2"><a href="{{$post->url()}}">{{$post->title}}</a></h5>
                                        <h5 class="card-subtitle mb-2 text-muted">{{$post->subtitle}}</h5>
                                        <p class="card-text">{{$post->html}}</p>

                                        {!! $post->imageTag('medium', true, 'img-fluid') !!}

                                        <table class="table table-bordered mt-3 table-responsive">
                                            <thead class="bg-dark text-white">
                                                <tr>
                                                    <td>Author</td>
                                                    <td>Posted at</td>
                                                    <td>Is Published</td>
                                                    <td>Category</td>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                <tr>
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
                                                </tr>
                                            </tbody>
                                        </table>


                                        @if($post->use_view_file)
                                            <h5>Uses Custom Viewfile:</h5>
                                            <div class="m-2 p-1">
                                                <strong>View file:</strong><br>
                                                <code>{{$post->use_view_file}}</code>
                                                @php
                                                    $viewfile = resource_path('views/custom_blog_posts/' . $post->use_view_file . '.blade.php');
                                                @endphp
                                                <br>
                                                <strong>Full filename:</strong>
                                                <br>
                                                <small>
                                                    <code>{{$viewfile}}</code>
                                                </small>

                                                @if(!file_exists($viewfile))
                                                    <div class="alert alert-danger">Warning! The custom view file does not exist. Create the
                                                        file for this post to display correctly.
                                                    </div>
                                                @endif

                                            </div>
                                        @endif


                                        <a href="{{$post->url()}}" class="card-link btn btn-outline-secondary"><i class="fa fa-file-text-o"
                                                                                                                  aria-hidden="true"></i>
                                            View</a>
                                        <a href="{{$post->edit_url()}}" class="card-link btn btn-warning">
                                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                            Edit</a>
                                        <form onsubmit="return confirm('Are you sure you want to delete this blog post?\n You cannot undo this action!');"
                                              method='post' action='{{route("blogetc.admin.destroy_post", $post->id)}}' class='float-right'>
                                            @csrf
                                            <input name="_method" type="hidden" value="DELETE"/>
                                            <button type='submit' class='btn btn-danger btn-sm'>
                                                <i class="fa fa-trash-o" aria-hidden="true"></i>
                                                Delete
                                            </button>
                                        </form>
                                    </div>
                                </div>
                                </div>
                            @empty
                                <div class="alert alert-warning">No posts to show you. Why don't you add one?</div>
                            @endforelse
                        </div>

                        <div class="text-center">
                            {{$posts->appends( [] )->links()}}
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
