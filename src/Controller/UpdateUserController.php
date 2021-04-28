<?php


namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;


class UpdateUserController
{
	public function __construct()
	{
	}

	#[Route("/users/{id}", methods: ["PUT"])]
	public function __invoke()
	{
		// TODO: Implement __invoke() method.
	}
}