<?php

namespace App\Tests;

use PHPUnit\Framework\TestCase;

class CustomerTest extends TestCase
{
    public function testIsTrue()
    {
        $phone = new Client();

        $phone->setCompanyName('Micromania');
        $phone->setMail('contact@micromania.fr');
        $phone->setPassword('123456');


        $this->assertTrue($phone->getCompanyName() === 'Micromania');
        $this->assertTrue($phone->getMail() === 'contact@micromania.fr');
        $this->assertTrue($phone->getPassword() === '123456');
    }

    public function testIsFalse()
    {
        $phone = new Client();

        $phone->setCompanyName('Micromania');
        $phone->setMail('contact@micromania.fr');
        $phone->setPassword('123456');

        $this->assertFalse($phone->getCompanyName() === 'Playstation');
        $this->assertFalse($phone->getMail() === 'contact@playstation.fr');
        $this->assertFalse($phone->getPassword() === '1234567');
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
