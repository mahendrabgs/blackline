<?php

namespace Tests;

class UsersTest extends TestCase
{

    public function testShouldReturnAllUsers()
    {

        $this->get('http://localhost:8000/users', ['api-auth-key' => '78f7c1eac6765f7c']);
        $this->seeStatusCode(200);
        $this->seeJsonStructure([
            'user_details' => ['*' =>
                [
                    'id',
                    'name',
                    'emailId'
                ]
            ]
        ]);
    }

}
