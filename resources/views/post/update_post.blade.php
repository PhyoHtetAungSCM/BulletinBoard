@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header font-weight-bold">Update Post</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('post.updatePost', ['id' => $post->id]) }}">
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
                                <input type="text" class="form-control" id="title" name="title" value="{{ $post->title }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="description" class="col-md-4 col-form-label text-md-right font-weight-bold">
                                Description<span class="text-danger">*</span>
                            </label>
                            <div class="col-md-6">
                                <textarea rows="3" class="form-control" id="description" name="description">{{ $post->description }}</textarea>
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
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#updatePostModal" onclick="updatePostConfirmation()">
                                    Update
                                </button>
                                <button type="button" class="btn btn-secondary" onclick="updatePostClearance()">
                                    Clear
                                </button>
                            </div>
                        </div>

                        <!-- Update Post Modal -->
                        <div class="modal fade" id="updatePostModal" tabindex="-1" role="dialog" aria-labelledby="updatePostModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title font-weight-bold" id="updatePostModalLabel">Update Post Confirmation</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group row">
                                            <label class="col-md-4 col-sm-3 col-form-label font-weight-bold">
                                                Title
                                            </label>
                                            <label class="col-md-8 col-sm-9 col-form-label" id="confirmTitle"></label>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-4 col-sm-3 col-form-label font-weight-bold">
                                                Description
                                            </label>
                                            <label class="col-md-8 col-sm-9 col-form-label" id="confirmDescription"></label>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-4 col-sm-3 col-form-label font-weight-bold">
                                                Status
                                            </label>
                                            <label class="col-md-8 col-sm-9 col-form-label" id="confirmStatus"></label>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary">Create</button>
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                    </div>
                                </div>
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