 <?php
    use WebDevEtc\BlogEtc\Models\Category;
    use WebDevEtc\BlogEtc\Models\Comment;
?>
<style type="text/css">
    .list-group-item+.list-group-item {
    border-top-width: 1px;
}
</style>
<ul class="list-group mb-3">
    <li class="list-group-item justify-content-between lh-condensed mb-3 p-0">
        <div>  
            <div class="">
                <a href="{{ route('blogetc.admin.index') }}"
                   class="list-group-item list-group-item-action @if(Request::route()->getName() === 'blogetc.admin.index') active @endif text-white" style="background: #6c757d">
                    <i class="fa fa-th fa-fw" aria-hidden="true"></i>
                    All Posts - {{\WebDevEtc\BlogEtc\Models\Post::count()}}
                </a>
                <a href="{{ route('blogetc.admin.create_post') }}"
                   class="list-group-item list-group-item-action  @if(Request::route()->getName() === 'blogetc.admin.create_post') active @endif">
                    <i class="fa fa-plus fa-fw" aria-hidden="true"></i>
                    Add Post
                </a>
            </div>
        </div>
    </li>


    <li class="list-group-item justify-content-between lh-condensed mb-3 p-0">
        <div>
            <a class="list-group-item list-group-item-action text-white"  href="{{ route('blogetc.admin.comments.index') }}" style="background: #6c757d">Comments - 
                <span class="">
                    @php
                        $commentCount = Comment::withoutGlobalScopes()->count();
                    @endphp

                    {{ $commentCount}}   
                </span>
            </a>
           
            <div class="">
                <a href="{{ route('blogetc.admin.comments.index') }}"
                   class="list-group-item list-group-item-action  @if(Request::route()->getName() === 'blogetc.admin.comments.index' && !Request::get("waiting_for_approval")) active @endif   ">
                    <i class="fa  fa-fw fa-comments" aria-hidden="true"></i>
                    All Comments
                </a>

                <?php $comment_approval_count = Comment::withoutGlobalScopes()
                    ->where('approved', false)->count(); ?>

                <a href="{{ route('blogetc.admin.comments.index') }}?waiting_for_approval=true"
                   class="list-group-item list-group-item-action  @if(Request::route()->getName() === 'blogetc.admin.comments.index' && Request::get("waiting_for_approval")) active @elseif($comment_approval_count>0) list-group-item-warning @endif  ">
                    <i class="fa  fa-fw fa-comments" aria-hidden="true"></i>
                    {{ $comment_approval_count }}
                    Waiting for approval
                </a>
            </div>
        </div>
    </li>

    <li class="list-group-item justify-content-between lh-condensed mb-3 p-0">
        <div>
            <a class="list-group-item list-group-item-action text-white"  href="{{ route('blogetc.admin.categories.index') }}" style="background: #6c757d">Categories - 
                <span class="">
                    @php
                        $postCount = Category::count();
                    @endphp

                    {{ $postCount}}   
                </span>
            </a>
            
            <div class=" ">
                <a href="{{ route('blogetc.admin.categories.index') }}"
                   class="list-group-item list-group-item-action  @if(Request::route()->getName() === 'blogetc.admin.categories.index') active @endif">
                    <i class="fa fa-object-group fa-fw" aria-hidden="true"></i>
                    All Categories
                </a>
                <a href="{{ route('blogetc.admin.categories.create_category') }}"
                   class="list-group-item list-group-item-action  @if(Request::route()->getName() === 'blogetc.admin.categories.create_category') active @endif  ">
                    <i class="fa fa-plus fa-fw" aria-hidden="true"></i>
                    Add Category
                </a>
            </div>
        </div>

    </li>

    @if(config("blogetc.image_upload_enabled"))
        <li class="list-group-item justify-content-between lh-condensed mb-3 p-0">
            <div>
                <a class="list-group-item list-group-item-action text-white" href="{{ route('blogetc.admin.images.upload') }}" style="background: #6c757d">Upload images</a>
                 
                <div class=" ">

                    <a href="{{ route('blogetc.admin.images.all') }}"
                       class="list-group-item list-group-item-action  @if(Request::route()->getName() === 'blogetc.admin.images.all') active @endif  ">
                        <i class="fa fa-picture-o fa-fw" aria-hidden="true"></i>
                        View All
                    </a>

                    <a href="{{ route('blogetc.admin.images.upload') }}"
                       class="list-group-item list-group-item-action  @if(Request::route()->getName() === 'blogetc.admin.images.upload') active @endif  ">
                        <i class="fa fa-upload fa-fw" aria-hidden="true"></i>
                        Upload
                    </a>
                </div>
            </div>
        </li>
    @endif
</ul>
