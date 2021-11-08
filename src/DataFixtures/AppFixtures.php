<?php

namespace App\DataFixtures;

use App\Entity\Client;
use App\Entity\Phone;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // create 12 phones!
        for ($i = 1; $i < 12; $i++) {
            $phone = new Phone();
            $phone->setName('Iphone ' . $i);
            $phone->setBrand('Iphone');
            $phone->setModel('Pro');
            $phone->setPrice(999.99);
            $phone->setDescription('Le top du top toujours plus chère pour une qualité égalé.');
            $manager->persist($phone);
        }

        $client = new Client();
        $client->setCompanyName('Micromania');
        $client->setMail('contact@micromania.fr');
        $client->setPassword('123456');
        $manager->persist($client);
        $manager->flush();
    }
}
