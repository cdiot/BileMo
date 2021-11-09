<?php

namespace App\Tests;

use App\Entity\Client;
use App\Entity\Customer;
use PHPUnit\Framework\TestCase;

class ClientTest extends TestCase
{
    public function testIsTrue()
    {
        $client = new Client();
        $customer = new Customer();

        $customer->setFisrtname('Kevin');
        $customer->setLastname('Dumont');
        $customer->setMail('contact@kevindumont.fr');
        $customer->setClient($client);


        $this->assertTrue($customer->getFisrtname() === 'Kevin');
        $this->assertTrue($customer->getLastname() === 'Dumont');
        $this->assertTrue($customer->getMail() === 'contact@kevindumont.fr');
        $this->assertSame($client, $customer->getClient());
    }

    public function testIsFalse()
    {
        $client = new Client();
        $customer = new Customer();

        $customer->setFisrtname('Kevin');
        $customer->setLastname('Dumont');
        $customer->setMail('contact@kevindumont.fr');
        $customer->setClient($client);

        $this->assertFalse($customer->getFisrtname() === 'Alan');
        $this->assertFalse($customer->getLastname() === 'Lepetit');
        $this->assertFalse($customer->getMail() === 'contact@alanlepetit.fr');
        $this->assertNotSame(new Client(), $customer->getClient());
    }

    public function testIsEmpty()
    {
        $customer = new Customer();

        $this->assertEmpty($customer->getFisrtname());
        $this->assertEmpty($customer->getLastname());
        $this->assertEmpty($customer->getMail());
        $this->assertEmpty($customer->getClient());
    }
}
