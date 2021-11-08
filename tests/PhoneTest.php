<?php

namespace App\Tests;

use App\Entity\Phone;
use PHPUnit\Framework\TestCase;

class PhoneTest extends TestCase
{
    public function testIsTrue()
    {
        $phone = new Phone();

        $phone->setName('Iphone 12');
        $phone->setBrand('Iphone');
        $phone->setModel('Pro');
        $phone->setPrice(999.99);
        $phone->setDescription('Le top du top toujours plus chère pour une qualité égalé.');

        $this->assertTrue($phone->getName() === 'Iphone 12');
        $this->assertTrue($phone->getBrand() === 'Iphone');
        $this->assertTrue($phone->getModel() === 'Pro');
        $this->assertTrue($phone->getPrice() === 999.99);
        $this->assertTrue($phone->getDescription() === 'Le top du top toujours plus chère pour une qualité égalé.');
    }

    public function testIsFalse()
    {
        $phone = new Phone();

        $phone->setName('Iphone 12');
        $phone->setBrand('Iphone');
        $phone->setModel('Pro');
        $phone->setPrice(999.99);
        $phone->setDescription('Le top du top toujours plus chère pour une qualité égalé.');

        $this->assertFalse($phone->getName() === 'Samsung S22');
        $this->assertFalse($phone->getBrand() === 'Samsung');
        $this->assertFalse($phone->getModel() === 'Pro +');
        $this->assertFalse($phone->getPrice() === 499.99);
        $this->assertFalse($phone->getDescription() === 'Top toujours des prix raisonnable pour une qualité normale.');
    }

    public function testIsEmpty()
    {
        $phone = new Phone();

        $phone->setName('');
        $phone->setBrand('');
        $phone->setModel('');
        $phone->setPrice(00.00);
        $phone->setDescription('');

        $this->assertEmpty($phone->getName());
        $this->assertEmpty($phone->getBrand());
        $this->assertEmpty($phone->getModel());
        $this->assertEmpty($phone->getPrice());
        $this->assertEmpty($phone->getDescription());
    }
}
