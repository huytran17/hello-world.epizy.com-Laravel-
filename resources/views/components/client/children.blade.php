<div id="colorlib-main">
	<section class="ftco-section ftco-no-pt ftco-no-pb">
		<div class="container px-0">
			<div class="row no-gutters">
				@foreach($category->children as $ch)
				<div class="col-md-12 blog-wrap">
					<div class="row no-gutters align-items-center">
						<div class="col-md-6 img js-fullheight" style="background-image: url({{$ch->thumbnail_photo_path}});">

						</div>
						<div class="col-md-6">
							<div class="text p-md-5 p-4 ftco-animate">
								<div class="heading">
									<div class="meta-wrap">
										<p class="meta">
											<span><i class="icon-calendar mr-2"></i>{{ $ch->created_at }}</span>
											<span><a href="client.category.index"><i class="icon-folder-o mr-2"></i>{{ $ch->title }}</a></span>
											{{-- <span><i class="icon-comment2 mr-2"></i>5 Comment</span> --}}
										</p>
									</div>
									<h2 class="mb-5"><a href="single.html">Post</a></h2>
								</div>
								<p>{!! $ch->description !!}</p>
								<div class="icon d-flex align-items-center my-5">
									<div class="img" style="background-image: url({{$ch->user->profile_photo_path}});"></div>
									<div class="position pl-3">
										<h4 class="mb-0">{{$ch->user->name }}</h4>
										<span>Thành viên</span>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				@endforeach
			</div>
		</div>
	</section>
</div><!-- END COLORLIB-MAIN -->