@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header font-weight-bold">{{ __('User List') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <!-- User Input Form -->
                        <div class="form-group row">
                            <div class="col-lg-4 col-md-12 col-sm-12 p-1 my-col">
                                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Search...">
                            </div>
                            <div class="col-lg-2 col-md-6 col-sm-12 p-1 my-col">
                                <input type="submit" class="btn btn-primary btn-block" value="Search">
                            </div>
                            <div class="col-lg-2 col-md-6 col-sm-12 p-1 my-col">
                                <input type="submit" class="btn btn-primary btn-block" value="Add">
                            </div>
                            <div class="col-lg-2 col-md-6 col-sm-12 p-1 my-col">
                                <input type="submit" class="btn btn-primary btn-block" value="Upload">
                            </div>
                            <div class="col-lg-2 col-md-6 col-sm-12 p-1 my-col">
                                <button type="submit" class="btn btn-primary btn-block">Download</button>
                            </div>
                        </div>
                    </form>
                    <!-- User List -->
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Phone Number</th>
                                <th scope="col">Address</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Name 1</td>
                                <td>Email 1</td>
                                <td>Phone Number1</td>
                                <td>Address 1</td>
                                <td><a href="#">Edit</a></td>
                                <td><a href="#">Delete</a></td>
                            </tr>
                            <tr>
                                <td>Name 2</td>
                                <td>Email 2</td>
                                <td>Phone Number2</td>
                                <td>Address 2</td>
                                <td><a href="#">Edit</a></td>
                                <td><a href="#">Delete</a></td>
                            </tr>
                            <tr>
                                <td>Name 3</td>
                                <td>Email 3</td>
                                <td>Phone Number3</td>
                                <td>Address 3</td>
                                <td><a href="#">Edit</a></td>
                                <td><a href="#">Delete</a></td>
                            </tr>
                            <tr>
                                <td>Name 4</td>
                                <td>Email 4</td>
                                <td>Phone Number4</td>
                                <td>Address 4</td>
                                <td><a href="#">Edit</a></td>
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
