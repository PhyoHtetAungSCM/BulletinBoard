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
    if($user->profile) {
      $user->profile = decrypt($user->profile);
    }
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
    if($userProfile->profile) {
      $userProfile->profile = decrypt($userProfile->profile);
    }
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
    $user = new User();
    $user->name = $request->name;
    $user->email = $request->email;
    $user->password = Hash::make($request->password);
    $user->type = $request->type;
    $user->phone = $request->phone;
    $user->dob = $request->dob;

    // http://www.expertphp.in/article/how-to-upload-save-and-display-file-from-database-in-laravel-52
    if($file = $request->hasFile('profile')) {
      $file = $request->file('profile') ;
      $fileName = $file->getClientOriginalName() ;
      $destinationPath = public_path().'/images/' ;
      $file->move($destinationPath, $fileName);
      $user->profile = encrypt($fileName);
    }

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
                        ->when($keyword->email, function($query) use($keyword) {
                            $query->where('email', 'like', "%{$keyword->email}%");
                          })
                        ->when($keyword->created_at, function($query) use($keyword) {
                            $query->where('created_at', 'like', "%{$keyword->createdFrom}%");
                          })
                        ->when($keyword->created_at, function($query) use($keyword) {
                            $query->where('title', 'like', "%{$keyword->createdTo}%");;
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
    $updateUser = User::find($id);
    $updateUser->name = $request->name;
    $updateUser->email = $request->email;
    $updateUser->type = $request->type;
    $updateUser->phone = $request->phone;
    $updateUser->dob = $request->dob;

    // http://www.expertphp.in/article/how-to-upload-save-and-display-file-from-database-in-laravel-52
    if($file = $request->hasFile('profile')) {
      $file = $request->file('profile') ;
      $fileName = $file->getClientOriginalName() ;
      $destinationPath = public_path().'/images/' ;
      $file->move($destinationPath, $fileName);
      $updateUser->profile = encrypt($fileName);
    }
    
    $updateUser->updated_user_id = Auth::id();
    $updateUser->updated_at = Carbon::now();
    return $updateUser->save();
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
}