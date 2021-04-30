<?php

namespace App\Tests\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class CreateUserTest extends WebTestCase
{
    public function createUser(): void
    {
        $client = static::createClient();
        $client->request(
            method: 'POST',
            uri: '/users',
            content: json_encode([
                'firstName' => 'Usuario',
                'lastName' => 'Teste',
                'email' => 'usu.teste@aol.com',
            ])
        );

        $statusCode = $client->getResponse()->getStatusCode();
        $this->assertSame(Response::HTTP_CREATED, $statusCode);
    }

    public function userErrorNoLastName(): void
    {
        $client = static::createClient();
        $client->request(
            method: 'POST',
            uri: '/users',
            content: json_encode([
                'firstName' => 'Usuario',
                'email' => 'usu.teste@aol.com',
            ])
        );

        $statusCode = $client->getResponse()->getStatusCode();
        $this->assertSame(Response::HTTP_BAD_REQUEST, $statusCode);
    }
}
