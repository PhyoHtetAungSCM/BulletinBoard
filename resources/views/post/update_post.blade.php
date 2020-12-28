@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-8">
			<div class="card">
				<div class="card-header font-weight-bold">Update Post</div>
				<div class="card-body">
					<form method="POST" action="{{ route('post.updatePostConfirm', ['id' => $post->id]) }}">
						@csrf
						@if($errors->any())
							<div class="post-error-box">
								@foreach($errors->all() as $error)
									<span class="post-error-message">{{ $error }}</span>
								@endforeach
							</div>
						@endif
						<div class="form-group row">
							<label for="title" class="col-md-4 col-form-label text-md-right font-weight-bold">
								Title<span class="text-danger">*</span>
							</label>
							<div class="col-md-6">
								<input type="text" class="form-control" id="title" name="title" value="{{ old('title') ? old('title') : $post->title }}">
							</div>
						</div>
						<div class="form-group row">
							<label for="description" class="col-md-4 col-form-label text-md-right font-weight-bold">
								Description<span class="text-danger">*</span>
							</label>
							<div class="col-md-6">
								<textarea rows="3" class="form-control" id="description" name="description">{{ old('description') ? old('title') : $post->description }}</textarea>
							</div>
						</div>
						<div class="form-group row">
							<label for="status" class="col-md-4 col-sm-2 col-form-label text-md-right font-weight-bold">
								Status
							</label>
							<div class="col-md-6 col-sm-8 form-check">
								<div class="form-check">
									<input type="checkbox" class="form-check-input" id="status" name="status" checked>
								</div>
							</div>
						</div>
						<div class="form-group row mb-0">
							<div class="col-md-8 offset-md-4">
								<button type="submit" class="btn btn-primary">
									Confirm
								</button>
								<button type="button" class="btn btn-secondary" onclick="updatePostClearance()">
									Clear
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

@section('scripts')
	<script src="{{ asset('js/post/update_post.js') }}" defer></script>
@endsection