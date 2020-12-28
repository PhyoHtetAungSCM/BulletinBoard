<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use App\Contracts\Services\User\UserServiceInterface;
use App\Http\Controllers\Controller;
use App\User;

/**
 * System Name: Bulletinboard
 * Module Name: User Screen
 */
class UserController extends Controller
{
    /** User Interface */
    private $userInterface;

    /**
    * Create a new controller instance.
    *
    * @return void
    */
    public function __construct(UserServiceInterface $userInterface)
    {
        $this->userInterface = $userInterface;
    }

    /**
     * Get User List
     * 
     * @return IlluminateHttpResponse with userList
     */
    public function index() {
        $userList = $this->userInterface->getUserList();
        return view('user/user_list', [
            'userList' => $userList
        ]);
    }

    /**
     * Get Create User Screen
     * 
     * @return IlluminateHttpResponse
     */
    public function getCreateUser() {
        return view('user/create_user');
    }

    /**
     * Get Update User Screen
     * 
     * @return IlluminateHttpResponse with user
     */
    public function getUpdateUser($id) {
        $user = $this->userInterface->getUpdateUser($id);
        return view('user/update_user', [
            'user' => $user
        ]);
    }

    /**
     * Get User Profile Screen
     * 
     * @return IlluminateHttpResponse with userProfile
     */
    public function getUserProfile() {
        $userProfile = $this->userInterface->userProfile();
        return view('user/user_profile', [
            'userProfile' => $userProfile
        ]);
    }

    /**
     * Get Change Password
     * 
     * @return IlluminateHttpResponse
     */
    public function getChangePassword() {
        return view('user/change_password');
    }

    /**
     * Create User
     * 
     * @param Request $request
     * @return IlluminateHttpResponse with success message
     */
    public function createUser(Request $request) {
        $request->validate([
            'name' => 'required|string',
            'email'   => 'required|email',
            'password' => 'required|confirmed|min:6',
            'phone' => 'nullable|regex:/(09)[0-9]{9}/',
            'profile' => 'nullable|mimes:jpeg,jpg,bmp,png|max:2048'
            
        ]);
        $this->userInterface->createUser($request);
        return redirect()->back()->withSuccess('Create User Successful');
    }

    /**
     * Search User
     * 
     * @param Request $keyword
     * @return IlluminateHttpResponse with userList
     */
    public function searchUser(Request $keyword) {
        $userList = $this->userInterface->searchUser($keyword);
        return view('user/user_list', [
            'userList' => $userList
        ]);
    }

    /**
     * Update User
     * 
     * @param Request $request
     * @param $id
     * @return IlluminateHttpResponse
     */
    public function updateUser(Request $request, $id) 
    {
        $request->validate([
            'name' => 'required|string',
            'email'   => 'required|email',
            'phone' => 'nullable|regex:/(09)[0-9]{9}/',
            'profile' => 'mimes:jpeg,jpg,bmp,png|max:2048',
        ]);
        $this->userInterface->updateUser($request, $id);
        return redirect()->route('user.index');
    }

    /**
     * Delete User
     * 
     * @param Request $request
     * @return IlluminateHttpResponse
     */
    public function deleteUser(Request $request) {
        $this->userInterface->deleteUser($request);
        return redirect()->route('user.index');
    }

    public function changePassword(Request $request) 
    {
        $request->validate([
            'password' => [
                'required',  function($attribute, $value, $fail) {
                    if(!Hash::check($value, Auth::user()->password)) {
                        $fail('The old password is not correct.');
                    }
                }, 'confirmed', 'min:6'
            ],
            'new_password'   => 'required|min:6'
        ]);
        $this->userInterface->changePassword($request);
        return redirect()->route('post.index');
    }
}