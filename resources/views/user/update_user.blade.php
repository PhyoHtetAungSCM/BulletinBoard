@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header font-weight-bold">Update User</div>
        <div class="card-body">
          <form method="POST" action="{{ route('user.updateUser', ['id' => $user->id]) }}" enctype="multipart/form-data">
            @csrf
            @if($errors->any())
							<div class="user-error-box">
								@foreach($errors->all() as $error)
									<span class="user-error-message">{{ $error }}</span>
								@endforeach
							</div>
						@endif
            <div class="form-group row mb-4">
              <div class="col-md-12 d-flex justify-content-center">
                <div class="user-profile-container">
                  @if($user->profile)
                    <img class="user-profile-image" id="uploadedProfile" src="/images/{{ $user->profile }}"/>
                  @endif
                </div>
              </div>
            </div>
            <div class="form-group row">
              <label for="title" class="col-md-4 col-form-label text-md-right font-weight-bold">
                Name<span class="text-danger">*</span>
              </label>
              <div class="col-md-6">
                <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}">
              </div>
            </div>
            <div class="form-group row">
              <label for="email" class="col-md-4 col-form-label text-md-right font-weight-bold">
                Email Address<span class="text-danger">*</span>
              </label>
              <div class="col-md-6">
                <input type="text" class="form-control" id="email" name="email" value="{{ $user->email }}">
              </div>
            </div>
            <div class="form-group row dropdown">
              <label for="type" class="col-md-4 col-form-label text-md-right font-weight-bold">
                Type<span class="text-danger">*</span>
              </label>
              <div class="col-md-6">
                <select class="form-control" id="type" name="type">
                  @if($user->type === 0)
                    <option value="0">Admin</option>
                    <option value="1">User</option>
                  @else
                    <option value="1">User</option>
                    <option value="0">Admin</option>
                  @endif
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label for="phone" class="col-md-4 col-form-label text-md-right font-weight-bold">
                Phone
              </label>
              <div class="col-md-6">
                <input type="text" class="form-control" id="phone" name="phone" value="{{ $user->phone }}">
              </div>
            </div>
            <div class="form-group row">
              <label for="dateOfBirth" class="col-md-4 col-form-label text-md-right font-weight-bold">Date of Birth</label>
              <div class="col-md-6">
                <input type="date" class="form-control" id="dob" name="dob" value="{{ $user->dob }}">
              </div>
            </div>
            <div class="form-group row">
              <label for="profile" class="col-md-4 col-form-label text-md-right font-weight-bold">
                Profile
              </label>
              <div class="col-md-6">
                <input type="file" accept="image/*" onchange="loadFile(event)" id="profile" name="profile">
                <div class="update-profile-container">
                  <img id="updateUserProfile" class="update-profile-image"/>
                </div>
              </div>
            </div>
            <div class="form-group row">
              <a href="{{ route('user.getChangePassword') }}" class="col-md-4 text-md-right">Change Password</a>
            </div>
            <div class="form-group row mb-0">
              <div class="col-md-8 offset-md-4">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#updateUserModal" onclick="updateUserConfirmation()">
                  Update
                </button>
                <button type="button" class="btn btn-secondary px-3" onclick="updateUserClearance()">
                  Clear
                </button>
              </div>
            </div>

            <!-- Update User Modal -->
            <div class="modal fade" id="updateUserModal" tabindex="-1" role="dialog" aria-labelledby="updateUserModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title font-weight-bold" id="updateUserModalLabel">Update User Confirmation</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <div class="form-group row mb-4">
                      <div class="col-md-12 d-flex justify-content-center">
                        <div class="user-profile-container">
                          <img class="user-profile-image" id="confirmProfile"/>
                        </div>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-md-4 col-sm-3 font-weight-bold">
                        Name
                      </label>
                      <label class="col-md-8 col-sm-9" id="confirmName"></label>
                    </div>
                    <div class="form-group row">
                      <label class="col-md-4 col-sm-3 font-weight-bold">
                        Email Address
                      </label>
                      <label class="col-md-8 col-sm-9" id="confirmEmail"></label>
                    </div>
                    <div class="form-group row">
                      <label class="col-md-4 col-sm-3 font-weight-bold">
                        Type
                      </label>
                      <label class="col-md-8 col-sm-9" id="confirmType"></label>
                    </div>
                    <div class="form-group row">
                      <label class="col-md-4 col-sm-3 font-weight-bold">
                        Phone
                      </label>
                      <label class="col-md-8 col-sm-9" id="confirmPhone"></label>
                    </div>
                    <div class="form-group row">
                      <label class="col-md-4 col-sm-3 font-weight-bold">
                        Date of Birth
                      </label>
                      <label class="col-md-8 col-sm-9" id="confirmDob"></label>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Update</button>
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
  <script src="{{ asset('js/user/update_user.js') }}" defer></script>
@endsection
