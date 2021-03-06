<?php


namespace App\Controller;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;


class DeleteUserController
{
	public function __construct(private EntityManagerInterface $entityManager)
	{
	}

	#[Route("/users/{id}", name: "deleteUser", methods: ["DELETE"])]
	public function __invoke(int $id): Response
	{
		// TODO: Implement __invoke() method.
		$repository = $this->entityManager->getRepository(User::class);
		$user = $repository->find($id);

		if (null === $user) {
			return new JsonResponse(['error' => 'User not found in the registry.'
			], Response::HTTP_NOT_FOUND);
		}

		$this->entityManager->remove($user);
		$this->entityManager->flush();

		return new JsonResponse(
			[
				'Success' => 'User deleted from the registry.'
			],
			Response::HTTP_ACCEPTED
		);
	}
}
