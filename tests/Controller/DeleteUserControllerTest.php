<?php

declare(strict_types=1);

namespace App\Tests\Controller;

use App\Entity\User;
use App\Tests\TestDocDB;
use Symfony\Component\HttpFoundation\Response;

class DeleteUserControllerTest extends TestDocDB
{
    public function deleteUser(): void
    {
        $user = new User();
        $user->setFirstName('Usuario');
        $user->setLastName('Teste');
        $user->setEmail('usu.test@aol.com');
        $this->eMI->persist($user);
        $this->eMI->flush();
        $this->client->request(
            method: 'DELETE',
            uri: '/users/1'
        );
        $statusCode = $this->client->getResponse()->getStatusCode();
        $this->assertSame(
            Response::HTTP_ACCEPTED,
            $statusCode
        );
    }

    public function deleteInexistentUser(): void
    {
        $this->client->request(
            method: 'DELETE',
            uri: '/users/8'
        );
        $statusCode = $this->client->getResponse()->getStatusCode();
        $this->assertSame(
            Response::HTTP_NOT_FOUND,
            $statusCode
        );
    }
}
