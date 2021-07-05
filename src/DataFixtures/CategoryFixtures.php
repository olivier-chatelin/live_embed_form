<?php

namespace App\DataFixtures;

use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CategoryFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $category1 = new Category();
        $category1->setTitle('Entrée');
        $category1->setDescription('Se mange après l\'apéro');
        $manager->persist($category1);
        $category2 = new Category();
        $category2->setTitle('Dessert');
        $category2->setDescription('Se mange avant le digestif');
        $manager->persist($category2);

        $manager->flush();
    }
}
