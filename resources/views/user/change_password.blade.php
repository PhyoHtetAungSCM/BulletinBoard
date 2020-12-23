@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header font-weight-bold">Change Password</div>
                <div class="card-body">
                    <form method="POST" action="#" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="oldPpassword" class="col-md-4 col-form-label text-md-right font-weight-bold">
                                Old Password<span class="text-danger">*</span>
                            </label>
                            <div class="col-md-6">
                                <input type="password" class="form-control" id="oldPassword" name="oldPassword">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="confirmPassword" class="col-md-4 col-form-label text-md-right font-weight-bold">
                                Confirm Password<span class="text-danger">*</span>
                            </label>
                            <div class="col-md-6">
                                <input type="password" class="form-control" id="confirmPassword" name="confirmPassword">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="newPassword" class="col-md-4 col-form-label text-md-right font-weight-bold">
                                New Password<span class="text-danger">*</span>
                            </label>
                            <div class="col-md-6">
                                <input type="password" class="form-control" id="newPassword" name="newPassword">
                            </div>
                        </div>
                        
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#changePasswordModal" onclick="confirmCreateUser()">
                                    Change
                                </button>
                                <button type="button" class="btn btn-secondary px-3" onclick="clearChangePassword()">
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