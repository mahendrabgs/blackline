<?php
namespace Tests;

class UserTest extends TestCase
{

    public function testShouldReturnAUsers()
    {
        $this->get('http://localhost:8000/users/1', ['api-auth-key' => '78f7c1eac6765f7c']);
        $this->seeStatusCode(200);
        $this->seeJsonStructure([
            'id',
            'name',
            'emailId'
        ]);
    }

}
