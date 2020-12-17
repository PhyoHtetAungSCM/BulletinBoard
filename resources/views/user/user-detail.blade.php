@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 user-detail-wrap">
            <div class="card">
                <div class="card-header font-weight-bold">User Detail</div>

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
                                <input type="submit" class="btn btn-primary btn-block" value="Add">
                            </div>
                        </div>
                    </form>
                    <!-- User Detail -->
                    <table class="table user-detail-table">
                        <thead>
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Created User</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Birth Date</th>
                                <th scope="col">Address</th>
                                <th scope="col">Created Date</th>
                                <th scope="col">Updated Date</th>
                                <th scope="col">Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><a href="#">User 1</a></td>
                                <td>user1@gmail.com</td>
                                <td>User 1</td>
                                <td>0912345789</td>
                                <td>01/01/01</td>
                                <td>user1 address</td>
                                <td><a href="#">01/01/01</a></td>
                                <td><a href="#">01/01/01</a></td>
                                <td><a href="#">Delete</a></td>
                            </tr>
                            <tr>
                                <td><a href="#">User 2</a></td>
                                <td>user2@gmail.com</td>
                                <td>User 2</td>
                                <td>0912345789</td>
                                <td>01/01/01</td>
                                <td>user2 address</td>
                                <td><a href="#">01/01/01</a></td>
                                <td><a href="#">01/01/01</a></td>
                                <td><a href="#">Delete</a></td>
                            </tr>
                            <tr>
                                <td><a href="#">User 3</a></td>
                                <td>user3@gmail.com</td>
                                <td>User 3</td>
                                <td>0912345789</td>
                                <td>01/01/01</td>
                                <td>user3 address</td>
                                <td><a href="#">01/01/01</a></td>
                                <td><a href="#">01/01/01</a></td>
                                <td><a href="#">Delete</a></td>
                            </tr>
                            <tr>
                                <td><a href="#">User 4</a></td>
                                <td>user1@gmail.com</td>
                                <td>User 4</td>
                                <td>0912345789</td>
                                <td>01/01/01</td>
                                <td>user4 address</td>
                                <td><a href="#">01/01/01</a></td>
                                <td><a href="#">01/01/01</a></td>
                                <td><a href="#">Delete</a></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!-- Pagination -->
                <div class="card-footer d-flex justify-content-center font-weight-bold">"This gonna be pagination"</div>
            </div>
        </div>
    </div>
</div>
@endsection
