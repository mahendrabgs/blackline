<?php

namespace App\Interfaces;

/**
 * class UserInterface
 */
interface UserInterface
{
    /**
     * @param array $data
     * @return mixed
     */
    public function getAllUsers(array $data);

    /**
     * @param array $data
     * @return mixed
     */
    public function getUser(array $data);
}
