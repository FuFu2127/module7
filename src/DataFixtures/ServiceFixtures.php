<?php

namespace App\DataFixtures;

use Faker\Factory;
use DateTimeImmutable;
use App\Entity\Service;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class ServiceFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create("fr_FR");

        for ($i = 0 ; $i < 20 ; $i++){
            $service = new Service();
            $service->setNom($faker->lastName())
                    ->setDescription($faker->realText(200))
                    ->setDtCreation(new DateTimeImmutable($faker->dateTimeThisCentury()->format('Y-m-d H:i:s')))
                    ;
        $manager->persist(($service));
        }
        $manager->flush();
    }
    public function getDependencies(): array
    {
        return [
            ServiceFixtures::class
        ];
    }
        // $product = new Product();
        // $manager->persist($product);

}
