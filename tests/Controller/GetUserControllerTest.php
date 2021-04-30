<?php

namespace App\Tests\Controller;

use App\Entity\User;
use App\Tests\TestDocDB;
use Symfony\Component\HttpFoundation\Response;

class GetUserControllerTest extends TestDocDB
{
    public function getUserOK(): void
    {
        $user = new User();
        $user->setFirstName('Usuario');
        $user->setLastName('Teste');
        $user->setEmail('usu.test@aol.com');
        $this->eMI->persist($user);
        $this->eMI->flush();
        $this->client->request(
            method: 'GET',
            uri: '/users/1'
        );
        $statusCode = $this->client->getResponse()->getStatusCode();
        $this->assertSame(
            Response::HTTP_OK,
            $statusCode
        );
    }

    public function getUserNotFound(): void
    {
        $this->client->request(
            method: 'GET',
            uri: '/users/8'
        );
        $statusCode = $this->client->getResponse()->getStatusCode();
        $this->assertSame(
            Response::HTTP_NOT_FOUND,
            $statusCode
        );
    }
}
