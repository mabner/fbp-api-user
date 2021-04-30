<?php

namespace App\Tests\Controller;

use App\Entity\User;
use App\Tests\TestDocDB;
use Symfony\Component\HttpFoundation\Response;

class ListUserControllerTest extends TestDocDB
{
    /**
     * @test
     */
    public function listExistingUsersOK(): void
    {
        $user = new User();
        $user->setFirstName('Usuario');
        $user->setLastName('Teste');
        $user->setEmail('usu.test@aol.com');
        $this->eMI->persist($user);
        $this->eMI->flush();
        $this->client->request(
            method: 'GET',
            uri: '/users'
        );
        $statusCode = $this->client->getResponse()->getStatusCode();
        $this->assertSame(
            Response::HTTP_OK,
            $statusCode
        );
    }
}
