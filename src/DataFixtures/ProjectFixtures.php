<?php

namespace App\DataFixtures;

use App\Entity\Category;
use App\Entity\Project;
use App\Entity\Technology;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class ProjectFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        for ($i=0; $i <15; $i++) {
            $project = new Project();
            $project->setName('Application Android');
            $project->setCategory($this->getReference(Category::SIDE_IDENTIFIER));
            $project->addTechnology($this->getReference('Java'));
            $project->addTechnology($this->getReference('php'));
            $project->addTechnology($this->getReference('Android'));
            $project->setDescription('Application scan code barre / API');
            $manager->persist($project);
        }
        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            TechnologyFixtures::class,
            CategoryFixtures::class,
        ];
    }


}
