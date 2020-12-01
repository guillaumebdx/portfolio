<?php

namespace App\DataFixtures;

use App\Entity\Technology;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class TechnologyFixtures extends Fixture
{
    const TECHNOLOGIES = [
        'php' => 'fab fa-php',
        'Javascript' => 'fab fa-js-square',
        'Java' => 'fab fa-java',
        'Android' => 'fab fa-android',
        'html' => 'fab fa-html5',
        'css' => 'fab fa-css3-alt',
        'Symfony' => 'fab fa-symfony',
        'React' => 'fab fa-react',
    ];

    public function load(ObjectManager $manager)
    {

        foreach (self::TECHNOLOGIES as $technologyName => $logo) {
            $technology = new Technology();
            $technology->setName($technologyName);
            $technology->setLogo($logo);
            $this->addReference($technologyName, $technology);
            $manager->persist($technology);
        }
        $manager->flush();
    }
}
