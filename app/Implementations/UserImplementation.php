<?php

namespace App\Implementations;

use App\Interfaces\UserInterface;
use App\Models\Users;
use Illuminate\Http\Response;

class UserImplementation implements UserInterface
{

    /**
     * @param array $data
     * @return array|\Illuminate\Http\JsonResponse
     */
    public function getAllUsers(array $data): array|\Illuminate\Http\JsonResponse
    {
        $usersLists = (new Users())->getAllUsers();

        if (!count($usersLists)) {
            return response()->json(['error' => 'Users lists is empty'], Response::HTTP_NOT_FOUND, ['Content-Type' => 'application/json']);
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
            return response()->json(['error' => 'User data is not found'], Response::HTTP_NOT_FOUND, ['Content-Type' => 'application/json']);
        }

        return $userData;
    }
}
