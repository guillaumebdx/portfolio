<?php

namespace App\DataFixtures;

use App\Entity\Technology;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class TechnologyFixtures extends Fixture
{
    const TECHNOLOGIES = [
        'php',
        'Javascript',
        'Java',
        'Android',
        'html',
        'css',
        'Symfony',
        'React',
    ];

    public function load(ObjectManager $manager)
    {

        foreach (self::TECHNOLOGIES as $technologyName) {
            $technology = new Technology();
            $technology->setName($technologyName);
            $this->addReference($technologyName, $technology);
            $manager->persist($technology);
        }
        $manager->flush();
    }
}
