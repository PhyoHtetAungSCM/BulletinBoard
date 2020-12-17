@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header font-weight-bold">Post Detail</div>

                <div class="card-body">
                    <!-- User Detail Form -->
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group row">
                            <div class="col-lg-2 col-md-3 col-sm-6 p-1">
                                <input type="text" class="form-control" placeholder="Title">
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-6 p-1">
                                <input type="text" class="form-control" placeholder="User Name">
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-6 p-1">
                                <input type="text" class="form-control" placeholder="Posted Date">
                            </div>
                            <div class="dropdown col-lg-2 col-md-3 col-sm-6 p-1">
                                <button class="btn btn-secondary dropdown-toggle px-4" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Status
                                </button>
                                <div class="dropdown-menu col-lg-2 col-md-3 col-sm-6 p-1">
                                    <button class="dropdown-item" type="button">Active</button>
                                    <button class="dropdown-item" type="button">Inactive</button>
                                </div>
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
                                <th scope="col">Title</th>
                                <th scope="col">Description</th>
                                <th scope="col">User ID</th>
                                <th scope="col">Posted Date</th>
                                <th scope="col">Modified Date</th>
                                <th scope="col">Status</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><a href="#">Title 1</a></td>
                                <td>Description 1</td>
                                <td>User 1</td>
                                <td><a href="#">01/01/01</a></td>
                                <td><a href="#">01/01/01</a></td>
                                <td>0</td>
                                <td><a href="#">Delete</a></td>
                            </tr>
                            <tr>
                                <td><a href="#">Title 2</a></td>
                                <td>Description 2</td>
                                <td>User 2</td>
                                <td><a href="#">01/01/01</a></td>
                                <td><a href="#">01/01/01</a></td>
                                <td>1</td>
                                <td><a href="#">Delete</a></td>
                            </tr>
                            <tr>
                                <td><a href="#">Title 3</a></td>
                                <td>Description 3</td>
                                <td>User 3</td>
                                <td><a href="#">01/01/01</a></td>
                                <td><a href="#">01/01/01</a></td>
                                <td>0</td>
                                <td><a href="#">Delete</a></td>
                            </tr>
                            <tr>
                                <td><a href="#">Title 4</a></td>
                                <td>Description 4</td>
                                <td>User 4</td>
                                <td><a href="#">01/01/01</a></td>
                                <td><a href="#">01/01/01</a></td>
                                <td>0</td>
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
