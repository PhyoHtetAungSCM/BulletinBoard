@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header font-weight-bold">Update User</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group row mb-4">
                            <div class="col-md-12 d-flex justify-content-center">
                                <div class="user-profile-container">
                                    <img class="user-profile-image" src="/images/{{$user->profile}}"/>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="title" class="col-md-4 col-form-label text-md-right font-weight-bold">
                                Name<span class="text-danger">*</span>
                            </label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="name" value="{{$user->name}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right font-weight-bold">
                                Email Address<span class="text-danger">*</span>
                            </label>
                            <div class="col-md-6">
                                <input type="email" class="form-control" name="email" value="{{$user->email}}">
                            </div>
                        </div>
                        <div class="form-group row dropdown">
                            <label for="type" class="col-md-4 col-form-label text-md-right font-weight-bold">
                                Type<span class="text-danger">*</span>
                            </label>
                            <div class="col-md-6">
                                <select class="form-control">
                                    <option></option>
                                    <option value="0">Admin</option>
                                    <option value="1">User</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="phone" class="col-md-4 col-form-label text-md-right font-weight-bold">
                                Phone
                            </label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="phone" value="{{$user->phone}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="dateOfBirth" class="col-md-4 col-form-label text-md-right font-weight-bold">Date of Birth</label>
                            <div class="col-md-6">
                                <input class="form-control" type="date" value="{{$user->dob}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="profile" class="col-md-4 col-form-label text-md-right font-weight-bold">
                                Profile
                            </label>
                            <div class="col-md-6">
                                <input type="file" accept="image/*" onchange="loadFile(event)">
                                <div class="update-profile-container">
                                    <img id="updateUserProfile" class="update-profile-image"/>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <a href="{{route('user.getChangePassword')}}" class="col-md-4 text-md-right">Change Password</a>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                    Confirm
                                </button>
                                <button type="button" class="btn btn-secondary px-3">
                                    Clear
                                </button>
                            </div>
                        </div>

                        <!-- Confirmation Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title font-weight-bold" id="exampleModalLabel">Update User Confirmation</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group row mb-4">
                                        <div class="col-md-12 d-flex justify-content-center">
                                            <div class="user-profile-container">
                                                <img class="user-profile-image" src="{{asset('images/ace.jpg')}}"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-4 col-form-label font-weight-bold">
                                            Name
                                        </label>
                                        <label class="col-md-8 col-form-label">
                                            Name 1
                                        </label>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-4 col-form-label font-weight-bold">
                                            Email Address
                                        </label>
                                        <label class="col-md-8 col-form-label">
                                            name1@gmail.com
                                        </label>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-4 col-form-label font-weight-bold">
                                            Type
                                        </label>
                                        <label class="col-md-8 col-form-label">
                                            User
                                        </label>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-4 col-form-label font-weight-bold">
                                            Phone
                                        </label>
                                        <label class="col-md-8 col-form-label">
                                            09123456789
                                        </label>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-4 col-form-label font-weight-bold">
                                            Address
                                        </label>
                                        <p class="col-md-8 col-form-label">
                                            This is description for post
                                        </label>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-4 col-form-label font-weight-bold">
                                            Description
                                        </label>
                                        <label class="col-md-8 col-form-label">
                                            This is description for post 1
                                        </label>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" data-dismiss="modal">Update</button>
                                    <button type="button" class="btn btn-secondary">Cancel</button>
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
<script>
    var loadFile = function(event) {
        var updateUserProfile = document.getElementById('updateUserProfile');
        updateUserProfile.src = URL.createObjectURL(event.target.files[0]);
        updateUserProfile.onload = function() {
        URL.revokeObjectURL(updateUserProfile.src) // free memory
        }
    };
</script>
@endsection
