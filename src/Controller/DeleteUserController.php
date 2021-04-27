<?php


namespace App\Controller;


class DeleteUserController
{
	public function __construct()
	{
	}

	#[Route("/users/{id}", name: "delete_user", methods: ["DELETE"])]
	public function __invoke()
	{
		// TODO: Implement __invoke() method.
	}
}