<?php

namespace App\Contracts\Dao\User;

interface UserDaoInterface
{
  public function getUserList();

  public function userProfile();

  public function getUpdateUser($id);

  public function createUser($request);

  public function searchUser($keyword);

  public function deleteUser($request);
}
