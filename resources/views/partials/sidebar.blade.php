<!-- .page-content -->
<aside class="sidebar  sidebar--main">
	<div id="wpgrade_social_links-2"
		class="widget widget--sidebar-blog widget_wpgrade_social_links">
		<h3 class="widget__title widget--sidebar-blog__title">KẾT NỐI VỚI
			LEFLAIR</h3>
		<div class="btn-list">
			<a class="social-icon"><i class="fa fa-facebook" aria-hidden="true"></i></a>
			<a class="social-icon"><i class="fa fa-instagram" aria-hidden="true"></i></a>
			<a class="social-icon"><i class="fa fa-linkedin-square"
				aria-hidden="true"></i></a>
		</div>
	</div>
	<div id="image-2" class="widget widget--sidebar-blog widget_image">
		<div class="jetpack-image-container">
			<a target="_blank"
				href="{{url('/sales')}}"><img
				src="{{url('img/blog.jpg')}}" class="alignnone" width="300"
				height="285" /></a>
		</div>
	</div>
	
	<div id="wpgrade_popular_posts-2"
		class="widget widget--sidebar-blog wpgrade_popular_posts">
		<h3 class="widget__title widget--sidebar-blog__title">BÀI VIẾT NỔI BẬT</h3>
		@foreach($featured as $feature)
		<article class="article  article--list">
			<a href="/post/{{$feature->id}}/{{$feature->slug}}"
				title="{{$feature->title}}" class="article--list__link">
				<div class="media__img  article__img  push-half--right">
					<img
						src="{{url('admin1/assets/uploads/posts/')}}/{{ $feature->img }}"
						alt="{{ $feature->title }}" class="popular-posts-widget__img" />
				</div>
				<div class="media__body">
					<span class="article__category">{{$feature->category[0]->name}}</span>
					<div class="article__title  article--list__title">
						<h4 class="hN">{{ $feature->title }}</h4>
					</div>
				</div> <!-- .media__body -->
			</a>
		</article>
		@endforeach
		<!-- .article- -list -->
	</div>
</aside>
<!-- .sidebar -->
<!-- .content -->
</section>