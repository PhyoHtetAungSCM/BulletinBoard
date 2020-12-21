@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header font-weight-bold">
                    <a href="{{ route('post.index') }}">Post List</a> 
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('post.searchPost') }}">
                        @csrf
                        <div class="form-group row">
                            <div class="col-lg-4 col-md-12 col-sm-12 p-1">
                                <input type="text" class="form-control" name="search" placeholder="Search...">
                            </div>
                            <div class="col-lg-2 col-md-6 col-sm-12 p-1">
                                <button type="submit" class="btn btn-primary btn-block" value="search">Search</button>
                            </div>
                            <div class="col-lg-2 col-md-6 col-sm-12 p-1">
                                <a href="{{ route('post.getCreatePost') }}" type="button" class="btn btn-primary btn-block">Add</a>
                            </div>
                            <div class="col-lg-2 col-md-6 col-sm-12 p-1">
                                <a href="{{ route('post.getUploadPost') }}" type="button" class="btn btn-primary btn-block">Upload</a>
                            </div>
                            <div class="col-lg-2 col-md-6 col-sm-12 p-1">
                                <button type="button" class="btn btn-primary btn-block">
                                    <img src="{{asset('images/download-icon.png')}}"/>
                                </button>
                            </div>
                        </div>
                    </form>
                    
                    <!-- Post List Table -->
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Post Title</th>
                                <th scope="col">Post Description</th>
                                <th scope="col">Posted User</th>
                                <th scope="col">Posted Date</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($postList as $post)
                                <tr>
                                    <td>
                                        <a 
                                            href="#"
                                            class="postDetail"
                                            data-title = "{{$post->title}}" 
                                            data-description = "{{$post->description}}"
                                        >
                                            {{$post->title}}
                                        </a>
                                    </td>
                                    <td>{{$post->description}}</td>
                                    <td>{{$post->user->name}}</td>
                                    <td>{{$post->created_at}}</td>
                                    <td>
                                        <a type="button" class="btn btn-primary btn-sm btn-block" href="{{ route('post.getUpdatePost', ['id' => $post->id]) }}">Edit</a>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-danger btn-sm btn-block deletePost" data-deletePostId = "{{$post->id}}">Delete</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <!-- Post Detail Modal -->
                    <div class="modal fade" id="postDetailModal" tabindex="-1" role="dialog" aria-labelledby="postDetailModalLabel" aria-hidden="true">
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
                                        <label class="col-md-4 col-form-label font-weight-bold">
                                            Title
                                        </label>
                                        <label class="col-form-label" id="detailTitle"></label>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-4 col-form-label font-weight-bold">
                                            Description
                                        </label>
                                        <label class="col-form-label" id="detailDescription"></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Delete Confirm Modal -->
                    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <form method="POST" action="{{ route('post.deletePost') }}">
                                {{ method_field('delete') }}
                                {{ csrf_field() }}
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title font-weight-bold" id="deleteModalLabel">Delete Post Confirmation</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label class="col-md-12 col-form-label">
                                                Are you sure that you want to delete?
                                            </label>
                                        </div>
                                        <input type="hidden" name="deletePostId" id="deletePostId">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Pagination -->
                <div class="d-flex justify-content-center">
                    {!! $postList->links() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script src="{{ asset('js/post/post-list.js') }}" defer></script>
@endsection