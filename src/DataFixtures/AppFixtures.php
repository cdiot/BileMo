<?php

namespace App\DataFixtures;

use App\Entity\Client;
use App\Entity\Customer;
use App\Entity\Phone;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AppFixtures extends Fixture
{
    public function __construct(UserPasswordHasherInterface $passwordHasher)
    {
        $this->passwordHasher = $passwordHasher;
    }

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
        $client->setEmail('contact@micromania.fr');
        $client->setPassword($this->passwordHasher->hashPassword(
            $client,
            '123456'
        ));
        $manager->persist($client);

        $client2 = new Client();
        $client2->setCompanyName('Apple');
        $client2->setEmail('contact@apple.fr');
        $client2->setPassword($this->passwordHasher->hashPassword(
            $client2,
            '123456'
        ));
        $manager->persist($client2);

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

        // create 6 Customer!
        for ($i = 1; $i < 6; $i++) {
            $customer = new Customer();
            $customer->setFisrtname('louis' . $i);
            $customer->setLastname('dupont' . $i);
            $customer->setMail('contact@louisdupont' . $i . '.fr');
            $customer->setClient($client2);
            $customer->setCity('Lille');
            $customer->setPhone(060334567 . $i);
            $customer->setAddress($i . 'rue de paris');
            $customer->setZipcode('75000');
            $manager->persist($customer);
        }

        $manager->flush();
    }
}
