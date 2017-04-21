@extends('layouts.app') @section('container')
<!-- .site-header -->
<div class="container  js-container">
	<section class="content">
		<meta property="fb:pages" content="1749821155276961" />
		<div
			class="page-content  blog-archive blog-archive--masonry-full  has-sidebar inf_scroll">
			<div class="page-content__wrapper">
				<div class="mosaic-wrapper">
					<div class="mosaic  infinite_scroll" data-maxpages="46">
						<header class="article__header">
							<div class="article__featured-image">
								<img
									src="{{url('admin1/assets/uploads/posts/')}}/{{ $post->img }}"
									alt="{{$post->title}}" />
							</div>
							<h1 class="article__title entry-title" itemtype="name">{{
								$post->title }}</h1>
							<hr class="separator" />
							<div class="entry__meta--header">
								<div class="grid">
									<div class="grid__item lap-and-up-one-half">
										<time class="article__time"
											datetime="{{ date('F j, Y',strtotime($post->updated_at)) }}">
											<span> Published on <abbr class="published"
												title="2017-03-16T08:00:02+00:00">{{ date('F j,
													Y',strtotime($post->updated_at)) }}</abbr>
										
										</time>
										. </span>
									</div>
								</div>
							</div>
						</header>
						<!-- .article__header -->
						<section class="article__content entry-content js-post-gallery">
							<p style="text-align: justify;">{{ $post->description }}</p>
							<p>{!! $post->content !!}</p>
							<p style="text-align: justify;">
							
							
							<div id="jp-relatedposts" class="jp-relatedposts"
								style="display: block;">
								<h3 class="jp-relatedposts-headline">
									<em>Related</em>
								</h3>
								<div class="jp-relatedposts-items jp-relatedposts-items-visual">
									@foreach($related as $val)
									<div
										class="jp-relatedposts-post jp-relatedposts-post0 jp-relatedposts-post-thumbs"
										data-post-id="23187" data-post-format="false">
										<a class="jp-relatedposts-post-a"
											href="/post/{{ $val->id }}/{{ $val->slug }}"
											title="{{ $val->title }} 
											{{Str::words($val->description, 50,'....')}}"
											rel="nofollow" data-origin="23357" data-position="0"><img
											class="jp-relatedposts-post-img"
											src="/admin1/assets/uploads/posts/{{ $val->img }}"
											width="350" alt="{{ $val->title }}"></a>
										<h4 class="jp-relatedposts-post-title">
											<a class="jp-relatedposts-post-a"
												href="/post/{{ $val->id }}/{{ $val->slug }}"
												title="{{ $val->title }} 
												{{Str::words($val->description, 50,'....')}}
												"
												rel="nofollow" data-origin="23357" data-position="0">{{
												$val->title }}</a>
										</h4>
										<p class="jp-relatedposts-post-excerpt">{{Str::words($val->description,
											50,'....')}}</p>
										<p class="jp-relatedposts-post-date">{{ date('F j,
											Y',strtotime($val->updated_at)) }}</p>
										<p class="jp-relatedposts-post-context">In "{{ $val->name }}"</p>
									</div>
									@endforeach
								</div>
							</div>
						</section>
						<!-- .article__content -->
						<div class="grid">
								<div class="grid__item  lap-and-up-one-half">
									<div id="pixlikes" class="share-item  pixlikes-box  liked "
										data-id="23357">
										<span class="like-link" id="like"><span id ="heart"><i class="fa fa-heart-o" aria-hidden="true"></i> </span><span
											class="likes-text"> <span class="likes-count" id="like-count">{{ $post->likes
													}}</span>&nbsp;likes
										</span> </span>
									</div>
								</div>
							</div>
						<footer class="article__footer  push--bottom">
							<div class="meta--categories btn-list  meta-list">
								<span class="btn  btn--small  btn--secondary  list-head">Categories</span>
								@foreach($post->category as $cate) <a
									class="btn  btn--small  btn--tertiary"
									href="/category/{{ $cate->slug }}"
									title="View all posts in $cate->name" rel="tag">{{$cate->name}}</a>
								@endforeach
							</div>
							<div class="meta--tags  btn-list  meta-list">
								<span class="btn  btn--small  btn--secondary  list-head">Tags</span>
								@foreach($post->tag as $tag) <a
									class="btn  btn--small  btn--tertiary"
									href="/tag/{{ $tag->slug }}"
									title="View all posts in $cate->name" rel="tag">{{$tag->name}}</a>
								@endforeach
							</div>
							
							
						</footer>
						<!-- .article__footer -->
					</div>
					<!-- .mosaic -->
				</div>
				<!-- .mosaic__wrapper -->
				<!-- Pagination -->
			</div>
		</div>
		<!-- .page-content__wrapper -->


@endsection

@section('script')
<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
<script src="/js/jquerysession.js"></script>
<script>
	$( "#like" ).click(function() {
	  	$("#like").attr('disabled','disabled');
	  	if (typeof $.session.get('{{$post->slug}}') !== 'undefined') {
	  		console.log('like lam the');
	  	}else{
	  		//console.log('da like');
	  		$.session.set("{{ $post->slug }}",1);
	  		$.ajax({
	  	        url: '/like/{{$post->id}}',
	  	        type: 'get',
	  	        success: function (data) {
	  	            //console.log(data);
	  	          	$( "#like-count" ).empty();
	  	        	$( "#like-count" ).append(data);
	  	        	$( "#heart" ).empty();
	  	        	$( "#heart" ).append("<i class='fa fa-heart' aria-hidden='true'></i>");
	  	      	},
	  	        dataType: 'json'
	  	    });
		}
	});
	$( document ).ready(function() {
		if (typeof $.session.get('{{$post->slug}}') !== 'undefined') {
			$( "#heart" ).empty();
	        $( "#heart" ).append("<i class='fa fa-heart' aria-hidden='true'></i>");
	  	}
	});
</script>
@endsection
