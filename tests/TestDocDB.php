<?php

declare(strict_types=1);

namespace App\Tests;

use App\Entity\User;
use Doctrine\ORM\Tools\SchemaTool;
use Doctrine\ORM\Tools\ToolsException;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class TestDocDB extends WebTestCase
{
    protected EntityManagerInterface $eMI;
    protected KernelBrowser $client;

    /**
     * @test
     */
    protected function start(): void
    {
        $this->client = self::createClient();
        $this->eMI = self::$kernel->getContainer()->get('doctrine')->getManager();
        $sgdb = new SchemaTool($this->eMI);
        $data = $this->eMI->getClassMetadata(User::class);
        $sgdb->dropDatabase();

        try {
            $sgdb->createSchema([$data]);
        } catch (ToolsException $error) {
            $this->fail('Could not create the database. Error: "' . $error->getMessage() . '"');
        }
    }
}
