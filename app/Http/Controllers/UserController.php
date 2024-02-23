<?php

namespace App\Http\Controllers;
use App\Interfaces\UserInterface;
use Illuminate\Http\Request;

/**
 * class UserController
 */
class UserController extends Controller
{
    /**
     * @var UserInterface|string
     */
    public UserInterface $userInterface;

    /**
     * @param UserInterface $userInterface
     */
    public function __construct(UserInterface $userInterface)
    {
        $this->userInterface = $userInterface;
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function getAllUsers(Request $request)
    {
        $data = $request->all();
        return $this->userInterface->getAllUsers($data);
    }

    /**
     * @param Request $request
     * @param $id
     * @return mixed
     */
    public function getUser(Request $request, $id)
    {
        $data = $request->all();
        $data['id'] = $id;
        return $this->userInterface->getUser($data);
    }
}
