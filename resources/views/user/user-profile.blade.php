@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header font-weight-bold">Profile</div>
                <div class="card-body">
                    @csrf
                    <div class="form-group row mb-4">
                        <div class="col-md-12 d-flex justify-content-center">
                            <div class="user-profile-container">
                                <img class="user-profile-image" src="{{asset('images/ace.jpg')}}"/>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row mb-0">
                        <div class="col-md-12 d-flex justify-content-center mb-3">
                            <button type="button" class="btn btn-secondary px-4" data-toggle="modal" data-target="#exampleModal">
                                Edit
                            </button>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-6 col-form-label text-md-right">
                            Name:
                        </label>
                        <label class="col-md-6 col-form-label">
                            Portgas D Ace
                        </label>                      
                    </div>
                    <div class="form-group row">
                        <label class="col-md-6 col-form-label text-md-right">
                            Email Address:
                        </label>
                        <label class="col-md-6 col-form-label">
                            pgdace@gmail.com
                        </label> 
                    </div>
                    <div class="form-group row">
                        <label class="col-md-6 col-form-label text-md-right">
                            Type:
                        </label>
                        <label class="col-md-6 col-form-label">
                            User
                        </label> 
                    </div>
                    <div class="form-group row">
                        <label class="col-md-6 col-form-label text-md-right">
                            Phone:
                        </label>
                        <label class="col-md-6 col-form-label">
                            09123456789
                        </label> 
                    </div>
                    <div class="form-group row">
                        <label class="col-md-6 col-form-label text-md-right">
                            Date of Birth:
                        </label>
                        <label class="col-md-6 col-form-label">
                            20/01/2000
                        </label> 
                    </div>
                    <div class="form-group row">
                        <label class="col-md-6 col-form-label text-md-right">
                            Email Address:
                        </label>
                        <label class="col-md-6 col-form-label">
                            pgdace@gmail.com
                        </label> 
                    </div>
                    

                    <!-- Confirmation Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title font-weight-bold" id="exampleModalLabel">Create User Confirmation</h5>
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
                                <button type="button" class="btn btn-primary" data-dismiss="modal">Create</button>
                                <button type="button" class="btn btn-secondary">Cancel</button>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
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
