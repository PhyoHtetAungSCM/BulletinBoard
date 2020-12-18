@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 user-detail-wrap">
            <div class="card">
                <div class="card-header font-weight-bold">
                    <a href="{{ route('user.index') }}">User Detail</a> 
                </div>

                <div class="card-body">
                    <!-- User Detail Form -->
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group row">
                            <div class="col-lg-2 col-md-3 col-sm-6 p-1 my-col">
                                <input type="text" class="form-control" placeholder="Name">
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-6 p-1 my-col">
                                <input type="text" class="form-control" placeholder="Email">
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-6 p-1 my-col">
                                <input type="text" class="form-control" placeholder="Created From">
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-6 p-1 my-col">
                                <input type="text" class="form-control" placeholder="Created To">
                            </div>
                            <div class="col-lg-2 col-md-6 col-sm-6 p-1 my-col">
                                <input type="submit" class="btn btn-primary btn-block" value="Search">
                            </div>
                            <div class="col-lg-2 col-md-6 col-sm-6 p-1 my-col">
                                <a href="{{ route('post.getCreateUser') }}" type="button" class="btn btn-primary btn-block">Add</a>
                            </div>
                        </div>
                    </form>
                    <!-- User Detail -->
                    <table class="table user-detail-table">
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
                            @foreach($userDetailList as $user)
                                <tr>
                                    <td><a href="#">{{$user->name}}</a></td>
                                    <td>{{$user->email}}</td>
                                    <td>Type</td>
                                    <td>Phone</td>
                                    <td>DOB</td>
                                    <td>Created User</td>
                                    <td>Updated User</td>
                                    <td><button type="button" class="btn btn-danger btn-sm btn-block">Delete</button></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
               <!-- pagination -->
               <div class="d-flex justify-content-center">
                    {!! $userDetailList->links() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
