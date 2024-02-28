<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * class Users
 */
class Users extends Model
{

    /**
     * @var mixed|array|\Laravel\Lumen\Application
     */
    protected mixed $usersLists = [];

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->usersLists = config('users.lists');
    }

    /**
     * @param int $userId
     * @return array|mixed
     */
    public function getUser(int $userId)
    {
        $userData = [];

        foreach ($this->usersLists as $usersList) {
            if ($usersList['id'] == $userId) {
                $userData = $usersList;
                break;
            }
        }

        return $userData;
    }

    /**
     * @return array|\Illuminate\Http\JsonResponse|\Laravel\Lumen\Application|mixed
     */
    public function getAllUsers()
    {
        return $this->usersLists;
    }
}
