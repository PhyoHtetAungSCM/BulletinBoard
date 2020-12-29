@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header font-weight-bold">
					User List
				</div>

				<div class="card-body">
					<!-- User List Options Form -->
					<form method="POST" action="{{ route('user.searchUser') }}">
						@csrf
						<div class="form-group row">
							<div class="col-lg-2 col-md-3 col-sm-6 p-1">
								<input type="text" class="form-control" name="name" placeholder="Name">
							</div>
							<div class="col-lg-2 col-md-3 col-sm-6 p-1">
								<input type="text" class="form-control" name="email" placeholder="Email">
							</div>
							<div class="col-lg-2 col-md-3 col-sm-6 p-1">
								<input type="text" class="form-control" name="created_from" placeholder="Created From">
							</div>
							<div class="col-lg-2 col-md-3 col-sm-6 p-1">
								<input type="text" class="form-control" name="created_to" placeholder="Created To">
							</div>
							<div class="col-lg-2 col-md-6 col-sm-6 p-1">
								<input type="submit" class="btn btn-primary btn-block" value="Search">
							</div>
							<div class="col-lg-2 col-md-6 col-sm-6 p-1">
								<a href="{{ route('user.getCreateUser') }}" type="button" class="btn btn-primary btn-block">Add</a>
							</div>
						</div>
					</form>
					<!-- User Detail -->
					<table class="table">
						<thead>
							<tr>
								<th scope="col">Name</th>
								<th scope="col">Email</th>
								<th scope="col">Type</th>
								<th scope="col">Phone</th>
								<th scope="col">Date Of Birth</th>
								<th scope="col">Created User</th>
								<th scope="col">Updated User</th>
								<th scope="col"></th>
							</tr>
						</thead>
						<tbody>
							@foreach($userList as $user)
								<tr>
									<td>
										<a 
											href="#"
											class="userDetail"
											data-name = "{{ $user->name }}" 
											data-email = "{{ $user->email }}"
											data-type = "{{ $user->type }}"
											data-phone = "{{ $user->phone }}"
											data-dob = "{{ $user->dob }}"
											data-profile = "{{ $user->profile }}"
										>
											{{ $user->name }}
										</a>
									</td>
									<td>{{ $user->email }}</td>
									<td>
										@if($user->type === 1)
											User
										@elseif($user->type === 0)
											Admin
										@endif
									</td>
									<td>{{ $user->phone }}</td>
									<td>{{ $user->dob }}</td>
									<td>{{ $user->getUserName->name }}</td>
									<td>{{ $user->getUserName->name }}</td>
									<td>
										<button type="button" class="btn btn-danger btn-sm btn-block deleteUser" data-deleteUserId = "{{$user->id}}">Delete</button>
									</td>
								</tr>
							@endforeach
						</tbody>
					</table>

					<!-- User Detail Modal -->
					<div class="modal fade" id="userDetailModal" tabindex="-1" role="dialog" aria-labelledby="userDetailModalLabel" aria-hidden="true">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title font-weight-bold" id="userDetailModalLabel">User Detail</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="form-group row mb-4">
									<div class="col-md-12 d-flex justify-content-center">
										<div class="user-profile-container">
											<img class="user-profile-image" id="detailProfile"/>
										</div>
									</div>
								</div>
								<div class="modal-body">
									<div class="form-group row">
										<label class="col-md-4 col-sm-3 font-weight-bold">Name</label>
										<span class="col-md-8 col-sm-9" id="detailName"></span>
									</div>
									<div class="form-group row">
										<label class="col-md-4 col-sm-3 font-weight-bold">Email</label>
										<span class="col-md-8 col-sm-9" id="detailEmail"></span>
									</div>
									<div class="form-group row">
										<label class="col-md-4 col-sm-3 font-weight-bold">Type</label>
										<span class="col-md-8 col-sm-9" id="detailType"></span>
									</div>
									<div class="form-group row">
										<label class="col-md-4 col-sm-3 font-weight-bold">Phone</label>
										<span class="col-md-8 col-sm-9" id="detailPhone"></span>
									</div>
									<div class="form-group row">
										<label class="col-md-4 col-sm-3 font-weight-bold">Date of Birth</label>
										<span class="col-md-8 col-sm-9" id="detailDob"></span>
									</div>
								</div>
							</div>
						</div>
					</div>

					<!-- Delete Confirm Modal -->
					<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
						<div class="modal-dialog" role="document">
							<form method="POST" action="{{ route('user.deleteUser') }}">
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
										<input type="hidden" name="deleteUserId" id="deleteUserId">
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
					{!! $userList->links() !!}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

@section('scripts')
	<script src="{{ asset('js/user/user_list.js') }}" defer></script>
@endsection
