<?php

namespace App\Dao\User;

use Illuminate\Support\Facades\Auth;

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

  public function getUserDetailList()
  {
    $userDetailList = User::paginate(5);
    return $userDetailList;
  }

  public function createUser($request)
  {
    $authId = Auth::id();
    $user = new User();
    $user->name = $request->name;
    $user->email = $request->email;
    $user->password = $request->password;
    $user->profile = $request->profile;
    $user->type = $request->type;
    $user->phone = $request->phone;
    $user->dob = $request->dob;
    $user->create_user_id = $authId;
    $user->updated_user_id = $authId;
    $user->deleted_user_id = $authId;
    return $user->save();
  }
}
