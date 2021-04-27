<?php


namespace App\Controller;


class GetUserController
{
	public function __construct()
	{
	}

	#[Route("/users/{id}", name: "get_user", methods: ["GET"])]
	public function __invoke()
	{
		// TODO: Implement __invoke() method.
	}
}