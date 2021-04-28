<?php


namespace App\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\SerializerInterface;


class ListUserController
{
	public function __construct(
		private EntityManagerInterface $entityManager,
		private SerializerInterface $serializer
	) {
	}

	#[Route("/users", methods: ["GET"])]
	public function __invoke(): Response
	{
		// TODO: Implement __invoke() method.

		$repository = $this->entityManager->getRepository(User::class);
		$users = $repository->findAll();
		$response = $this->serializer->serialize($users, 'json');

		return JsonResponse::fromJsonString($response);
	}
}
