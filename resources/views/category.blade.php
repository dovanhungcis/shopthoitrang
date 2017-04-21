@extends('layouts.app') @section('container')
<!-- .site-header -->
<div class="container  js-container">
	<section class="content">
		<meta property="fb:pages" content="1749821155276961" />
		<div
			class="page-content  blog-archive blog-archive--masonry-full  has-sidebar inf_scroll">
			<div class="page-content__wrapper">
				<div class="heading headin--main">
					<h2 class="hN">{{ $posts[0]->name }}</h2>
					<span class="archive__side-title beta">{{$value}}</span>
				</div>
				<hr class="separator" />
				<div class="mosaic-wrapper">
					<div class="mosaic  infinite_scroll" data-maxpages="46">
						@foreach($posts as $post)
						<article
							class="mosaic__item article-archive article-archive--masonry has-thumbnail post-23357 post type-post status-publish format-standard has-post-thumbnail hentry category-beauty-tips category-beauty category-beauty-products tag-co-dinh-lop-trang-diem tag-cushion tag-gel-khoa-mau-son tag-giu-lop-trang-diem-lau-troi tag-hien-tuong-troi-phan tag-kem-duong tag-mascara-chong-tham-nuoc tag-mascara-thuong tag-phan-khoang-dang-bot tag-phan-nuoc tag-phan-phu-dang-bot tag-phan-phu-dang-bot-cua-innisfree tag-san-pham-co-dinh-mau-son tag-san-pham-trang-diem tag-thuong-hieu-my-pham-cao-cap tag-urban-decay tag-xit-khoang">
							<header class="article__header">
								<div class="article__featured-image" style="padding-top: 66.75%">
									<a href="/post/{{ $post->id }}/{{ $post->slug }}"> <img
										src="/admin1/assets/uploads/posts/{{ $post->img }}" alt="{{ $post->title }}" />
										<div class="article__featured-image-meta">
											<div class="flexbox">
												<div class="flexbox__item">
													<hr class="separator" />
													<span class="read-more">Read more</span>
													<hr class="separator" />
												</div>
											</div>
										</div>
									</a>
								</div>
								<ol class="nav  article__categories">
									
								</ol>
								<h3 class="article__title entry-title">
									<a href="/post/{{ $post->id }}/{{ $post->slug }}" rel="bookmark">{{
										$post->title }}</a>
								</h3>
								<span class="vcard author"><span class="fn"><span
										class="value-title" title="Xu" /></span></span>
							
							</header>
							<section class="article__content entry-summary">
								<a href="/post/{{ $post->id }}/{{ $post->slug }}">
									<p style="text-align: justify;">{{ Str::words($post->description, 50,'....') }}</p>
								</a>
							</section>
							<footer class="article__meta">
								<span class="meta-box  article__date"> <i class="icon-time"></i>
									<span class="meta-text"><abbr class="published updated"
										title="{{ date('F j, Y',strtotime($post->updated_at)) }}"> 
										 
										{{ date('F j, Y',strtotime($post->updated_at)) }}
										 
										</abbr></span>
								</span> <span class="meta-box  article__likes"> <i
									class="icon-heart"></i> <span class="meta-text"> {{ $post->likes }} </span>
								</span>
							</footer>
						</article>
						@endforeach
						 
						</article>
					</div>
					<!-- .mosaic -->
					<div class="pagination">{{ $posts->links() }}</div>
				</div>
				<!-- .mosaic__wrapper -->
				<!-- Pagination -->
			</div>
			<!-- .page-content__wrapper -->
		</div>
		@endsection