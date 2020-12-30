@extends('layouts.app')

@section('css')
<link href="{{ asset('css/post/post_list_style.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="{{ Auth::check() ? 'col-md-12' : 'col-md-10'}}">
			<div class="card">
				<div class="card-header font-weight-bold">
					Post List
				</div>
				<div class="card-body">
					<form method="GET">
						@csrf
						<div class="form-group row">
							<div class="col-lg-4 col-md-12 col-sm-12 p-1">
								<input type="text" class="form-control" name="search" placeholder="Search...">
							</div>
							<div class="col-lg-2 col-md-6 col-sm-12 p-1">
								<button type="submit" class="btn btn-primary btn-block" value="search">Search</button>
							</div>
							@if(Auth::check())
							<div class="col-lg-2 col-md-6 col-sm-12 p-1">
								<a href="{{ route('post.getCreatePost') }}" type="button"
									class="btn btn-primary btn-block">Add</a>
							</div>
							<div class="col-lg-2 col-md-6 col-sm-12 p-1">
								<a href="{{ route('post.getUploadPost') }}" type="button"
									class="btn btn-primary btn-block">Upload</a>
							</div>
							<div class="col-lg-2 col-md-6 col-sm-12 p-1">
								<a type="button" class="btn btn-primary btn-block" href="{{ route('post.export') }}">
									Download
								</a>
							</div>
							@endif
						</div>
					</form>

					<table class="table">
						<thead>
							<tr>
								<th scope="col">Post Title</th>
								<th scope="col">Post Description</th>
								<th scope="col">Posted User</th>
								<th scope="col">Posted Date</th>
								<th scope="col">Updated Date</th>
								<th scope="col"></th>
								<th scope="col"></th>
							</tr>
						</thead>
						<tbody>
							@foreach($postList as $post)
							<tr>
								<td>
									<a href="#" class="post-detail" data-title="{{ $post->title }}"
										data-description="{{ $post->description }}"
										data-posted-user="{{ $post->user->name }}"
										data-posted-date="{{ $post->created_at->format('Y/m/d') }}"
										data-updated-date="{{ $post->updated_at->format('Y/m/d') }}">
										{{ $post->title }}
									</a>
								</td>
								<td>{{ $post->description }}</td>
								<td>{{ $post->user->name }}</td>
								<td>{{ $post->created_at->format('Y/m/d') }}</td>
								<td>{{ $post->updated_at->format('Y/m/d') }}</td>
								<td class="px-1">
									@if(Auth::check())
									@if(Auth::user()->type === 0 || Auth::user()->id === $post->create_user_id)
									<a type="button" class="btn btn-primary btn-sm post-edit"
										href="{{ route('post.getUpdatePost', ['id' => $post->id]) }}">Edit</a>
									@endif
									@endif
								</td>
								<td class="px-1">
									@if(Auth::check())
									@if(Auth::user()->type === 0 || Auth::user()->id === $post->create_user_id)
									<button type="button" class="btn btn-danger btn-sm post-delete"
										data-deletePostId="{{ $post->id }}">Delete</button>
									@endif
									@endif
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>

					<!-- Post Detail Modal -->
					<div class="modal fade" id="postDetailModal" tabindex="-1" role="dialog"
						aria-labelledby="postDetailModalLabel" aria-hidden="true">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title font-weight-bold" id="postDetailModalLabel">Post Detail</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body">
									<div class="form-group row">
										<label class="col-md-4 col-sm-3 font-weight-bold">Title</label>
										<span class="col-md-8 col-sm-9" id="detailTitle"></span>
									</div>
									<div class="form-group row">
										<label class="col-md-4 col-sm-3 font-weight-bold">Description</label>
										<span class="col-md-8 col-sm-9" id="detailDescription"></span>
									</div>
									<div class="form-group row">
										<label class="col-md-4 col-sm-3 font-weight-bold">Posted User</label>
										<span class="col-md-8 col-sm-9" id="detailPostedUser"></span>
									</div>
									<div class="form-group row">
										<label class="col-md-4 col-sm-3 font-weight-bold">Posted Date</label>
										<span class="col-md-8 col-sm-9" id="detailPostedDate"></span>
									</div>
									<div class="form-group row">
										<label class="col-md-4 col-sm-3 font-weight-bold">Updated Date</label>
										<span class="col-md-8 col-sm-9" id="detailUpdatedDate"></span>
									</div>
								</div>
							</div>
						</div>
					</div>

					<!-- Delete Post Modal -->
					<div class="modal fade" id="deletePostModal" tabindex="-1" role="dialog"
						aria-labelledby="deletePostModalLabel" aria-hidden="true">
						<div class="modal-dialog" role="document">
							<form method="POST" action="{{ route('post.deletePost') }}">
								{{ method_field('delete') }}
								{{ csrf_field() }}
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title font-weight-bold" id="deletePostModalLabel">Delete Post
											Confirmation</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<div class="modal-body">
										<div class="form-group">
											<label class="col-md-12">
												<span>Are you sure that you want to delete?</span>
											</label>
										</div>
										<input type="hidden" name="deletePostId" id="deletePostId">
									</div>
									<div class="modal-footer">
										<button type="submit" class="btn btn-danger">Delete</button>
										<button type="button" class="btn btn-secondary"
											data-dismiss="modal">Cancel</button>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>

				<!-- Pagination -->
				<div class="d-flex justify-content-center">
					{{ $postList->links() }}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

@section('scripts')
<script src="{{ asset('js/post/post_list.js') }}" defer></script>
@endsection