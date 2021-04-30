<?php


namespace App\Controller;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\SerializerInterface;


class GetUserController
{
	public function __construct(
		private EntityManagerInterface $entityManager,
		private SerializerInterface $serializer
	) {
	}

	#[Route("/users/{id}", name: "getUser", methods: ["GET"])]
	public function __invoke(int $id): Response
	{
		// TODO: Presenting 'circular reference has been detected' error.
		$repository = $this->entityManager->getRepository(User::class);
		$user = $repository->find($id);
		if (null === $user) {
			return new JsonResponse(
				['error' => 'User not found in the registry.'],
				Response::HTTP_NOT_FOUND
			);
		}
		return JsonResponse::fromJsonString($this->serializer->serialize($user, 'json'));
	}
}
