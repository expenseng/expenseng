<nav aria-label="..." class="table-responsive">
	  <ul class="pagination pagination-md">
	  		<li class=page-item">
	            <a class="page-link" href="/blog">All</a>
	        </li>
	  	@foreach(\WebDevEtc\BlogEtc\Models\Category::orderBy('category_name')->limit(5)->get() as $category)
		    <li class=page-item">
	            <a class="page-link" href="{{ $category->url() }}">{{ $category->category_name }}</a>
	        </li>
		@endforeach
	  	</ul>
 </nav>