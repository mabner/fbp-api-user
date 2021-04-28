<?php


namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;


class ListUserController
{
	public function __construct()
	{
	}

	#[Route("/users", methods: ["GET"])]
	public function __invoke()
	{
		// TODO: Implement __invoke() method.
	}
}