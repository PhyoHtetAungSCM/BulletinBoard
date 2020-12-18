@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header font-weight-bold">Create User</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('user.createUser') }}">
                        @csrf
                        <div class="form-group row">
                            <label for="title" class="col-md-4 col-form-label text-md-right">
                                Name<span class="text-danger">*</span>
                            </label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="name" name="name" autofocus>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">
                                Email Address<span class="text-danger">*</span>
                            </label>
                            <div class="col-md-6">
                                <input type="email" class="form-control" id="email" name="email">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">
                                Password<span class="text-danger">*</span>
                            </label>
                            <div class="col-md-6">
                                <input type="password" class="form-control" id="password" name="password">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="confirmPassword" class="col-md-4 col-form-label text-md-right">
                                Confirm Password<span class="text-danger">*</span>
                            </label>
                            <div class="col-md-6">
                                <input type="password" class="form-control" name="confirmPassword">
                            </div>
                        </div>
                        <div class="form-group row dropdown">
                            <label for="type" class="col-md-4 col-form-label text-md-right">
                                Type<span class="text-danger">*</span>
                            </label>
                            <div class="col-md-6">
                                <select class="form-control" id="type" name="type">
                                    <option></option>
                                    <option  value="0">Admin</option>
                                    <option  value="1">User</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="phone" class="col-md-4 col-form-label text-md-right">
                                Phone
                            </label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="phone" name="phone">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="dateOfBirth" class="col-md-4 col-form-label text-md-right">Date of Birth</label>
                            <div class="col-md-6">
                                <input class="form-control" type="date" value="2000-12-31" id="dob" name="dob">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="profile" class="col-md-4 col-form-label text-md-right">
                                Profile
                            </label>
                            <div class="col-md-6">
                                <input type="file" accept="image/*" onchange="loadFile(event)" id="profile" name="profile">
                                <div class="create-profile-container">
                                    <img id="createUserProfile" class="create-profile-image"/>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createUserModal" onclick="confirmCreateUser()">
                                    Confirm
                                </button>
                                <button type="button" class="btn btn-secondary px-3">
                                    Clear
                                </button>
                            </div>
                        </div>

                        <!-- Confirmation Modal -->
                        <div class="modal fade" id="createUserModal" tabindex="-1" role="dialog" aria-labelledby="createUserModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title font-weight-bold" id="createUserModalLabel">Create User Confirmation</h5>
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
                                        <label class="col-md-8 col-form-label" id="confirmName"></label>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-4 col-form-label font-weight-bold">
                                            Email Address
                                        </label>
                                        <label class="col-md-8 col-form-label" id="confirmAddress"></label>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-4 col-form-label font-weight-bold">
                                            Type
                                        </label>
                                        <label class="col-md-8 col-form-label" id="confirmType"></label>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-4 col-form-label font-weight-bold">
                                            Phone
                                        </label>
                                        <label class="col-md-8 col-form-label" id="confirmPhone"></label>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-4 col-form-label font-weight-bold">
                                            DOB
                                        </label>
                                        <label class="col-md-8 col-form-label" id="confirmDob"></label>
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
    <script src="{{ asset('js/confirm-create-user.js') }}" defer></script>
    <script>
        var loadFile = function(event) {
            var createUserProfile = document.getElementById('createUserProfile');
            createUserProfile.src = URL.createObjectURL(event.target.files[0]);
            createUserProfile.onload = function() {
            URL.revokeObjectURL(createUserProfile.src) // free memory
            }
        };
    </script>
@endsection
