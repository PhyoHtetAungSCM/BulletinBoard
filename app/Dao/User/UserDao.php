<?php

namespace App\Dao\User;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

// Collection Paginate
// use Illuminate\Pagination\Paginator;
// use Illuminate\Support\Collection;
// use Illuminate\Pagination\LengthAwarePaginator;

use App\Contracts\Dao\User\UserDaoInterface;
use App\Post;
use App\User;

class UserDao implements UserDaoInterface
{
  /**
   * Get Operator List
   * @param Object
   * @return $operatorList
   */

  public function getUserList()
  {
    $userList = User::where('status', 1)->paginate(5);
    return $userList;
  }

  public function userProfile()
  {
    $authId = Auth::id();
    $userProfile = User::find($authId);
    return $userProfile;
  }

  public function getUpdateUser($id)
  {
    $user = User::find($id);
    return $user;
  }

  public function createUser($request)
  {
    $authId = Auth::id();
    $user = new User();
    $user->name = $request->name;
    $user->email = $request->email;
    $user->password = Hash::make($request->password);

    if($file = $request->hasFile('profile')) {
      $file = $request->file('profile') ;
      $fileName = $file->getClientOriginalName() ;
      $destinationPath = public_path().'/images/' ;
      $file->move($destinationPath, $fileName);
      $user->profile = $fileName ;
    }

    $user->type = $request->type;
    $user->phone = $request->phone;
    $user->dob = $request->dob;
    $user->create_user_id = $authId;
    $user->updated_user_id = $authId;
    $user->deleted_user_id = $authId;
    
    return $user->save();
  }

  public function searchUser($keyword)
  {
    $userList = User::all();

    if($keyword->name) {
      $userList = User::where('name', 'like', "%{$keyword->name}%");
    }

    if($keyword->email) {
      $userList = User::where('email', 'like', "%{$keyword->email}%");
    }

    return $userList->paginate(5);
  }

  public function deleteUser($request)
  {
    $deleteUser = User::find($request->input('deleteUserId'));
    $deleteUser->status = 0;
    return $deleteUser->save();
  }

  // Collection Paginate
  // public function paginate($items, $perPage = 5, $page = null, $options = [])
  // {
  //     $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
  //     $items = $items instanceof Collection ? $items : Collection::make($items);
  //     return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
  // }
}
