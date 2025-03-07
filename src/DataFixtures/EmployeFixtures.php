<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Employe;
use App\Entity\Service;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class EmployeFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create("fr_FR");
        for($i = 0 ; $i < 20 ; $i++) {
            $employe = new Employe();
            $employe->setPrenom($faker->firstName())
                    ->setNom($faker->lastName())
                    ->setTelephone($faker->e164PhoneNumber())
                    ->setEmail($faker->email())
                    ->setAdresse($faker->address())
                    ->setPoste($faker->jobTitle())
                    ->setSalaire($faker->randomFloat())
                    ->setDtNaissance($faker->dateTime())
                    ->setIsactive($faker->boolean(0.5))
                    ;
            $manager->persist($employe);
        }
        $manager->flush();
    }

        
        // $product = new Product();
        // $manager->persist($product);
        
    public function getDependencies(): array
    {
        return [
            EmployeFixtures::class
        ];
    }
}
