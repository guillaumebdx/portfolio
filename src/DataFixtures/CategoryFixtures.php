<?php

namespace App\DataFixtures;

use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CategoryFixtures extends Fixture
{
    const CATEGORIES = [
        'Side project' => Category::SIDE_IDENTIFIER,
        'En tant que dev' => Category::DEV_IDENTIFIER,
        'EN tant que lead dev' => Category::LEAD_IDENTIFIER,
    ];

    public function load(ObjectManager $manager)
    {
        foreach (self::CATEGORIES as $categoryName => $categoryIdentifier) {
            $category = new Category();
            $category->setName($categoryName);
            $category->setIdentifier($categoryIdentifier);
            $this->addReference($categoryIdentifier, $category);
            $manager->persist($category);
        }
        $manager->flush();
    }
}
