<?php

namespace App\DataFixtures;

use App\Entity\Client;
use App\Entity\User;
use App\Entity\Phone;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Faker\Factory;

class AppFixtures extends Fixture
{
    public function __construct(UserPasswordHasherInterface $passwordHasher)
    {
        $this->passwordHasher = $passwordHasher;
    }

    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');
        // create 12 phones!
        for ($i = 1; $i < 12; $i++) {
            $phone = new Phone();
            $phone->setName('Iphone ' . $i);
            $phone->setBrand('Iphone');
            $phone->setModel('Pro');
            $phone->setPrice(999.99);
            $phone->setDescription($faker->text());
            $manager->persist($phone);
        }

        $client = new Client();
        $client->setCompanyName('Samsung');
        $client->setEmail('contact@samsung.fr');
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
        for ($i = 1; $i < 11; $i++) {
            $user = new User();
            $user->setFisrtname($faker->firstName());
            $user->setLastname($faker->lastName());
            $user->setMail($faker->email());
            $user->setClient($client);
            $user->setCity($faker->city());
            $user->setPhone($faker->numberBetween($min = 0611111111, $max = 0777777777));
            $user->setAddress($faker->address());
            $user->setZipcode($faker->numberBetween($min = 11111, $max = 99999));
            $manager->persist($user);
        }

        // create 6 Customer!
        for ($i = 1; $i < 11; $i++) {
            $user = new User();
            $user->setFisrtname($faker->firstName());
            $user->setLastname($faker->lastName());
            $user->setMail($faker->email());
            $user->setClient($client2);
            $user->setCity($faker->city());
            $user->setPhone($faker->numberBetween($min = 611111111, $max = 777777777));
            $user->setAddress($faker->address());
            $user->setZipcode($faker->numberBetween($min = 11111, $max = 99999));
            $manager->persist($user);
        }

        $manager->flush();
    }
}
