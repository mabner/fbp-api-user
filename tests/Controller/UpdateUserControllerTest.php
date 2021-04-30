<?php

namespace App\Tests\Controller;

use App\Entity\User;
use App\Tests\TestDocDB;
use Symfony\Component\HttpFoundation\Response;

class UpdateUserControllerTest extends TestDocDB
{
    /**
     * @test
     */
    public function userUpdate(): void
    {
        $user = new User();
        $user->setFirstName('Usuario');
        $user->setLastName('Teste');
        $user->setEmail('usu.test@aol.com');
        $this->eMI->persist($user);
        $this->eMI->flush();
        $this->client->request(
            method: 'PUT',
            uri: '/users/1',
            content: json_encode([
                'firstName' => 'UsuarioUp',
                'lastName' => 'TesteDate',
                'email' => 'up.date@aol.com',
            ])
        );
        $statusCode = $this->client->getResponse()->getStatusCode();
        $this->assertSame(
            Response::HTTP_NO_CONTENT,
            $statusCode
        );
    }

    public function updateInvalidUser(): void
    {
        $user = new User();
        $user->setFirstName('Usuario');
        $user->setLastName('Teste');
        $user->setEmail('usu.test@aol.com');
        $this->eMI->persist($user);
        $this->eMI->flush();
        $this->client->request(
            method: 'PUT',
            uri: '/users/1',
            content: json_encode([
                'firstName' => 'Imnot',
                'lastName' => 'Auser',
                'email' => 'nouser@aol.com',
            ])
        );
        $statusCode = $this->client->getResponse()->getStatusCode();
        $this->assertSame(
            Response::HTTP_BAD_REQUEST,
            $statusCode
        );
    }

    public function updateUserNonExistentID(): void
    {
        $user = new User();
        $user->setFirstName('Usuario');
        $user->setLastName('Teste');
        $user->setEmail('usu.teste@aol.com');
        $this->eMI->persist($user);
        $this->eMI->flush();
        $this->client->request(
            method: 'PUT',
            uri: '/users/8',
            content: json_encode([
                'firstName' => 'Idont',
                'lastName' => 'Exist',
            ])
        );
        $statusCode = $this->client->getResponse()->getStatusCode();
        $this->assertSame(
            Response::HTTP_NOT_FOUND,
            $statusCode
        );
    }
}
