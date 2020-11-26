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
    const PROJECTS = [
        [
            'name' => 'Kotation',
            'category' => Category::DEV_IDENTIFIER,
            'technologies' => [
                'Symfony',
                'php',
                'Javascript',
                'React',
            ],
            'description' => 'Deviseur',
        ],
        [
            'name' => 'Application Android',
            'category' => Category::SIDE_IDENTIFIER,
            'technologies' => [
                'Java',
                'php',
                'Android',
            ],
            'description' => 'Application scan code barre / API',
        ],
        [
            'name' => 'Robo Advisor',
            'category' => Category::SIDE_IDENTIFIER,
            'technologies' => [
                'php',
                'Javascript',
                'Symfony',
                'React',
            ],
            'description' => 'Calcul des partage et droits de successions',
        ],
        [
            'name' => 'Kortex',
            'category' => Category::DEV_IDENTIFIER,
            'technologies' => [
                'Symfony',
                'php',
                'Javascript',
            ],
            'description' => 'Gestionnaire de licences',
        ],
        [
            'name' => 'Kiamo-center',
            'category' => Category::DEV_IDENTIFIER,
            'technologies' => [
                'Symfony',
                'php',
                'Javascript',
            ],
            'description' => 'CRM interne / Gestion commerciale',
        ],
        [
            'name' => 'ChatBot',
            'category' => Category::SIDE_IDENTIFIER,
            'technologies' => [
                'php',
            ],
            'description' => 'ChatBot réalisé avec Google Assistant / Hackathon',
        ],
        [
            'name' => 'Vivavox',
            'category' => Category::DEV_IDENTIFIER,
            'technologies' => [
                'Symfony',
                'php',
                'Javascript',
            ],
            'description' => 'Plateforme de mise en relation de conférenciers',
        ],
        [
            'name' => 'Nemea',
            'category' => Category::LEAD_IDENTIFIER,
            'technologies' => [
                'Symfony',
                'php',
                'Javascript',
            ],
            'description' => 'Application on boarding React',
        ],
        [
            'name' => 'Newdeal',
            'category' => Category::LEAD_IDENTIFIER,
            'technologies' => [
                'Symfony',
                'php',
                'Javascript',
            ],
            'description' => 'Deviseur + Gestion pipeline de prospects',
        ],
        [
            'name' => 'Jobtech',
            'category' => Category::LEAD_IDENTIFIER,
            'technologies' => [
                'Symfony',
                'php',
                'Javascript',
            ],
            'description' => 'Plateforme de recrutement + questionnaire de personnalité',
        ],
        [
            'name' => 'Audi DBF',
            'category' => Category::LEAD_IDENTIFIER,
            'technologies' => [
                'Symfony',
                'php',
                'Javascript',
            ],
            'description' => 'CRM Gestion d\'appels entrants',
        ],

    ];
    public function load(ObjectManager $manager)
    {
        foreach (self::PROJECTS as $projectData) {
            $project = new Project();
            $project->setName($projectData['name']);
            $project->setCategory($this->getReference($projectData['category']));
            foreach ($projectData['technologies'] as $technology) {
                $project->addTechnology($this->getReference($technology));
            }
            $project->setDescription($projectData['description']);
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
