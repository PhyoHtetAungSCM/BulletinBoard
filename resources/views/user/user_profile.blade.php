@extends('layouts.app')

@section('css')
	<link href="{{ asset('css/user/user_profile_style.css') }}" rel="stylesheet">
@endsection

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
								@if($userProfile->profile)
									<img class="user-profile-image" src="/images/{{ $userProfile->profile }}"/>
								@endif
							</div>
						</div>
					</div>
					<div class="form-group row mb-0">
						<div class="col-md-12 d-flex justify-content-center mb-3">
							<a type="button" class="btn btn-secondary bn-sm" href="{{ route('user.getUpdateUser', ['id' => $userProfile->id]) }}">Edit</a>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-md-6 col-form-label font-weight-bold text-md-right">
							Name:
						</label>
						<label class="col-md-6 col-form-label">
							{{ $userProfile->name }}
						</label>                      
					</div>
					<div class="form-group row">
						<label class="col-md-6 col-form-label font-weight-bold text-md-right">
							Email Address:
						</label>
						<label class="col-md-6 col-form-label">
							{{ $userProfile->email }}
						</label> 
					</div>
					<div class="form-group row">
						<label class="col-md-6 col-form-label font-weight-bold text-md-right">
							Type:
						</label>
						<label class="col-md-6 col-form-label">
							@if($userProfile->type === 0)
								Admin
							@elseif($userProfile->type === 1)
								User
							@endif
						</label> 
					</div>
					<div class="form-group row">
						<label class="col-md-6 col-form-label font-weight-bold text-md-right">
							Phone:
						</label>
						<label class="col-md-6 col-form-label">
							{{ $userProfile->phone }}
						</label> 
					</div>
					<div class="form-group row">
						<label class="col-md-6 col-form-label font-weight-bold text-md-right">
							Date of Birth:
						</label>
						<label class="col-md-6 col-form-label">
							{{ $userProfile->dob }}
						</label> 
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
