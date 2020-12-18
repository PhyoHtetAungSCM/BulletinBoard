<?php

namespace App\Http\Controllers;

use App\Contracts\Services\User\UserServiceInterface;
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

    public function __construct(UserServiceInterface $userInterface)
    {
        // $this->middleware('auth');
        $this->userInterface = $userInterface;
    }

    public function index() {
        $userDetailList = $this->userInterface->getUserDetailList();
        return view('user/user-detail', [
            'userDetailList' => $userDetailList
        ]);
    }

    public function getCreateUser() {
        return view('user/create-user');
    }

    public function createUser(Request $request) {
        $this->userInterface->createUser($request);
        return redirect()->route('user.index');
    }

    public function getUserProfile() {
        return view('user/user-profile');
    }
}
