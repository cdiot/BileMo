<?php

namespace App\Tests;

use App\Entity\Client;
use PHPUnit\Framework\TestCase;

class ClientTest extends TestCase
{
    public function testIsTrue()
    {
        $client = new Client();

        $client->setCompanyName('Micromania');
        $client->setMail('contact@micromania.fr');
        $client->setPassword('123456');


        $this->assertTrue($client->getCompanyName() === 'Micromania');
        $this->assertTrue($client->getMail() === 'contact@micromania.fr');
        $this->assertTrue($client->getPassword() === '123456');
    }

    public function testIsFalse()
    {
        $client = new Client();

        $client->setCompanyName('Micromania');
        $client->setMail('contact@micromania.fr');
        $client->setPassword('123456');

        $this->assertFalse($client->getCompanyName() === 'Playstation');
        $this->assertFalse($client->getMail() === 'contact@playstation.fr');
        $this->assertFalse($client->getPassword() === '1234567');
    }

    public function testIsEmpty()
    {
        $client = new Client();

        $client->setCompanyName('');
        $client->setMail('');
        $client->setPassword('');

        $this->assertEmpty($client->getCompanyName());
        $this->assertEmpty($client->getMail());
        $this->assertEmpty($client->getPassword());
    }
}
