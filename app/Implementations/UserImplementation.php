<?php

namespace App\Implementations;

use App\Interfaces\UserInterface;
use App\Models\Users;

class UserImplementation implements UserInterface
{

    /**
     * @param array $data
     * @return mixed
     */
    public function getAllUsers(array $data): mixed
    {
        $usersLists = (new Users())->getAllUsers($data);

        if (!count($usersLists)) {
            return response()->json(['error' => 'Users lists is empty'], 412, ['Content-Type' => 'application/json']);
        }

        return ['user_details' => $usersLists];
    }

    /**
     * @param array $data
     * @return mixed
     */
    public function getUser(array $data): mixed
    {
        $userData = (new Users())->getUser($data['id']);

        if (!count($userData)) {
            return response()->json(['error' => 'User data is not found'], 412, ['Content-Type' => 'application/json']);
        }

        return ['user_data' => $userData];
    }
}
