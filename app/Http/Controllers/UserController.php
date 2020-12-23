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
        $this->userInterface = $userInterface;
    }

    public function index() {
        $userList = $this->userInterface->getUserList();
        return view('user/user_list', [
            'userList' => $userList
        ]);
    }

    public function getUserProfile() {
        $userProfile = $this->userInterface->userProfile();
        return view('user/user_profile', [
            'userProfile' => $userProfile
        ]);
    }

    public function getUpdateUser($id) {
        $user = $this->userInterface->getUpdateUser($id);
        return view('user/update_user', [
            'user' => $user
        ]);
    }

    public function getChangePassword() {
        return view('user/change_password');
    }

    public function getCreateUser() {
        return view('user/create_user');
    }

    public function createUser(Request $request) {
        $this->userInterface->createUser($request);
        return redirect()->route('user.index');
    }

    public function searchUser(Request $keyword) {
        $userList = $this->userInterface->searchUser($keyword);
        return view('user/user_list', [
            'userList' => $userList
        ]);
    }

    public function deleteUser(Request $request) {
        $this->userInterface->deleteUser($request);
        return redirect()->route('user.index');
    }
}
