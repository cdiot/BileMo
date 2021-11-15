<?php

namespace App\DataFixtures;

use App\Entity\Client;
use App\Entity\Customer;
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
            $phone->setDescription('Le top toujours plus chère pour une qualité au rendez vous.');
            $manager->persist($phone);
        }

        $client = new Client();
        $client->setCompanyName('Micromania');
        $client->setMail('contact@micromania.fr');
        $client->setPassword('123456');
        $manager->persist($client);

        // create 6 Customer!
        for ($i = 1; $i < 6; $i++) {
            $customer = new Customer();
            $customer->setFisrtname('Kevin' . $i);
            $customer->setLastname('Dumont' . $i);
            $customer->setMail('contact@kevindumont' . $i . '.fr');
            $customer->setClient($client);
            $customer->setCity('Paris');
            $customer->setPhone(060334567 . $i);
            $customer->setAddress($i . 'rue de lille');
            $customer->setZipcode('59000');
            $manager->persist($customer);
        }

        $manager->flush();
    }
}
