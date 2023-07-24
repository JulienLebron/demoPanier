<?php

namespace App\DataFixtures;

use App\Entity\Product;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ProductFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {

        $faker = \Faker\Factory::create('fr_FR');

        for($i = 1; $i <= 10; $i++) 
        {
            $product = new Product;
            $product->setTitle($faker->sentence(3))
                    ->setImage($faker->imageUrl())
                    ->setPrice($faker->randomFloat(2, 10, 100)); // 2 chiffres après la virgule, min 10, max 100
            $manager->persist($product);
        }
        $manager->flush();
    }
}
