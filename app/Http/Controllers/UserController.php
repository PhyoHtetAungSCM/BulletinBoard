<?php

namespace App\Http\Controllers;

// use App\Contracts\Services\Post\UserServiceInterface;
use App\Http\Controllers\Controller;
use App\User;

use Illuminate\Http\Request;

class UserController extends Controller
{
    // private $userInterface;

    /**
    * Create a new controller instance.
    *
    * @return void
    */

    // public function __construct(UserServiceInterface $userInterface)
    // {
    //     $this->middleware('auth');
    //     $this->userInterface = $userInterface;
    // }

    public function index() {
        return view('user/user-list');
    }

    public function userDetail() {
        return view('user/user-detail');
    }

    public function getCreateUser() {
        return view('user/create-user');
    }

    public function getUpdateUser() {
        return view('user/update-user');
    }

    public function getUserProfile() {
        return view('user/user-profile');
    }
}
