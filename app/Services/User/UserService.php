<?php

namespace App\Services\User;

use App\Contracts\Dao\User\UserDaoInterface;
use App\Contracts\Services\User\UserServiceInterface;

class UserService implements UserServiceInterface
{
  private $userDao;

  /**
   * Class Constructor
   * @param OperatorUserDaoInterface
   * @return
   */
  public function __construct(UserDaoInterface $userDao)
  {
    $this->userDao = $userDao;
  }

  public function getUserList()
  {
    return $this->userDao->getUserList();
  }

  public function userProfile()
  {
    return $this->userDao->userProfile();
  }

  public function getUpdateUser($id)
  {
    return $this->userDao->getUpdateUser($id);
  }

  public function createUser($request)
  {
    return $this->userDao->createUser($request);
  }

  public function searchUser($keyword)
  {
    return $this->userDao->searchUser($keyword);
  }

  public function deleteUser($request)
  {
    return $this->userDao->deleteUser($request);
  }
}
