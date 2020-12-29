@extends('layouts.app')

@section('css')
	<link href="{{ asset('css/user/create_user_style.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-8">
			<div class="card">
				<div class="card-header font-weight-bold">Create User</div>
				<div class="card-body">
					<form id="form" method="POST" action="{{ route('user.createUser') }}" enctype="multipart/form-data">
						@csrf
						@if(session('success'))
							<div class="user-success-box">
								<span class="user-success-message">{{ session('success') }}</span>
							</div>
						@endif
						@if($errors->any())
							<div class="user-error-box">
								@foreach($errors->all() as $error)
									<span class="user-error-message">{{ $error }}</span>
								@endforeach
							</div>
						@endif
						<div class="form-group row">
							<label for="title" class="col-md-4 col-form-label text-md-right font-weight-bold">
								Name<span class="text-danger">*</span>
							</label>
							<div class="col-md-6">
								<input type="text" class="form-control" id="name" name="name">
							</div>
						</div>
						<div class="form-group row">
							<label for="email" class="col-md-4 col-form-label text-md-right font-weight-bold">
								Email Address<span class="text-danger">*</span>
							</label>
							<div class="col-md-6">
								<input type="text" class="form-control" id="email" name="email">
							</div>
						</div>
						<div class="form-group row">
							<label for="password" class="col-md-4 col-form-label text-md-right font-weight-bold">
								Password<span class="text-danger">*</span>
							</label>
							<div class="col-md-6">
								<input type="password" class="form-control" id="password" name="password">
							</div>
						</div>
						<div class="form-group row">
							<label for="passwordConfirmation" class="col-md-4 col-form-label text-md-right font-weight-bold">
								Confirm Password<span class="text-danger">*</span>
							</label>
							<div class="col-md-6">
								<input type="password" class="form-control" id="passwordConfirmation" name="password_confirmation">
							</div>
						</div>
						<div class="form-group row dropdown">
							<label for="type" class="col-md-4 col-form-label text-md-right font-weight-bold">
								Type<span class="text-danger">*</span>
							</label>
							<div class="col-md-6">
								<select class="form-control" id="type" name="type">
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
								<input type="text" class="form-control" id="phone" name="phone">
							</div>
						</div>
						<div class="form-group row">
							<label for="dob" class="col-md-4 col-form-label text-md-right font-weight-bold">Date of Birth</label>
							<div class="col-md-6">
								<input type="date" class="form-control"  id="dob" name="dob">
							</div>
						</div>
						<div class="form-group row">
							<label for="profile" class="col-md-4 col-form-label text-md-right font-weight-bold">
								Profile
							</label>
							<div class="col-md-6">
								<input type="file" accept="image/*" onchange="loadFile(event)" id="profile" name="profile">
								<div class="profile-container">
									<img id="createUserProfile" class="profile-image"/>
								</div>
							</div>
						</div>
						<div class="form-group row mb-0">
							<div class="col-md-8 offset-md-4">
								<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createUserModal" onclick="createUserConfirmation()">
									Create
								</button>
								<button type="button" class="btn btn-secondary px-3" onclick="createUserClearance()">
									Clear
								</button>
							</div>
						</div>

						<!-- Create User Modal -->
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
												<div class="profile-container circle">
													<img class="profile-image circle" id="confirmProfile"/>
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
											<label class="col-md-8 col-form-label" id="confirmEmail"></label>
										</div>
										<div class="form-group row">
											<label class="col-md-4 col-form-label font-weight-bold">
												Password
											</label>
											<label class="col-md-8 col-form-label" id="confirmPassword" style="-webkit-text-security: disc;"></label>
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
	<script src="{{ asset('js/user/create_user.js') }}" defer></script>
@endsection