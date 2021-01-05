<?php

namespace App\Dao\User;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use App\Contracts\Dao\User\UserDaoInterface;
use App\User;
use Carbon\Carbon;

/**
 * System Name: Bulletinboard
 * Module Name: User Dao
 */
class UserDao implements UserDaoInterface
{
    /**
     * Get User List
     *
     * @return user List ($userList)
     */
    public function getUserList()
    {
        $userList = User::where('status', 1)->paginate(5);
        return $userList;
    }

    /**
     * Get Updated User
     *
     * @param $id
     * @return updated user ($user)
     */
    public function getUpdateUser($id)
    {
        $user = User::find($id);
        return $user;
    }

    /**
     * Get User Profile
     *
     * @return user detail ($userProfile)
     */
    public function userProfile()
    {
        $authId = Auth::id();
        $userProfile = User::find($authId);
        return $userProfile;
    }

    /**
     * Create User
     *
     * @param $request
     * @return saved user response
     */
    public function createUser($request)
    {
        /** Retrieve data from session */
        $sessionUser = session()->get('create-user');
        $name = $sessionUser['name'];
        $email = $sessionUser['email'];
        $password = $sessionUser['password'];
        $type = $sessionUser['type'];
        $phone = $sessionUser['phone'];
        $address = $sessionUser['address'];
        $dob = $sessionUser['dob'];
        $profile = $sessionUser['profile'];

        /** Remove Session */
        session()->forget('create-user');

        /** Save data into database */
        $user = new User();
        $user->name = $name;
        $user->email = $email;
        $user->password = Hash::make($password);
        $user->type = $type;
        $user->phone = $phone;
        $user->address = $address;
        $user->dob = $dob;
        $user->profile = $profile;
        $user->create_user_id = Auth::id();
        $user->updated_user_id = Auth::id();
        return $user->save();
    }

    /**
     * Search User
     *
     * @param $keyword
     * @return search result ($userList)
     */
    public function searchUser($keyword)
    {
        $userList = User::where('name', 'like', "%{$keyword->name}%")
                    ->when($keyword->email, function ($query) use ($keyword) {
                        $query->where('email', 'like', "%{$keyword->email}%");
                    })
                    ->when($keyword->created_from, function ($query) use ($keyword) {
                        $query->where('created_at', '=', $keyword->created_from);
                    })
                    ->when($keyword->created_to, function ($query) use ($keyword) {
                        $query->where('updated_at', '=', $keyword->created_to);
                    })->paginate(5);
        return $userList;
    }

    /**
     * Update User
     *
     * @param $request
     * @param $id
     * @return updated user response
     */
    public function updateUser($request, $id)
    {
        /** Retrieve data from session */
        $sessionUser = session()->get('update-user');
        $name = $sessionUser['name'];
        $email = $sessionUser['email'];
        $type = $sessionUser['type'];
        $phone = $sessionUser['phone'];
        $address = $sessionUser['address'];
        $dob = $sessionUser['dob'];
        $profile = $sessionUser['profile'];

        /** Remove Session */
        session()->forget('update-user');

        /** Save data into database */
        $updateUser = User::find($id);
        $updateUser->name = $name;
        $updateUser->email = $email;
        $updateUser->type = $type;
        $updateUser->phone = $phone;
        $updateUser->address = $address;
        $updateUser->dob = $dob;
        if ($profile) {
            $updateUser->profile = $profile;
        }
        $updateUser->create_user_id = Auth::id();
        $updateUser->updated_user_id = Auth::id();
        return $updateUser->save();
    }

    /**
     * Update User Confirmation
     *
     * @param $request
     * @param $id
     * @return profile image
     */
    public function updateUserConfirm($request, $id)
    {
        $updateUser = User::find($id);
        $profile = $updateUser->profile;
        return $profile;
    }

    /**
     * Delete User
     *
     * @param $request
     * @return deleted user response
     */
    public function deleteUser($request)
    {
        $deleteUser = User::find($request->input('deleteUserId'));
        $deleteUser->status = 0;
        return $deleteUser->save();
    }

    /**
     * Change Password
     *
     * @param $request
     * @return changed password response
     */
    public function changePassword($request)
    {
        $user = User::find(Auth::id());
        $user->password = Hash::make($request->new_password);
        $user->updated_user_id = Auth::id();
        $user->updated_at = Auth::id();
        return $user->save();
    }
}
