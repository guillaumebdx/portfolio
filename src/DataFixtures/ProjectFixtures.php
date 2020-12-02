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
            'picture' => 'kotation.png',
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
            'picture' => 'android.jpg',
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
            'picture' => 'advisor.png',
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
            'name' => 'Bot Twitter',
            'picture' => 'twitter-api.png',
            'category' => Category::SIDE_IDENTIFIER,
            'technologies' => [
                'Symfony',
                'php',
            ],
            'description' => 'Bot twitter / Symfony Command & crontab',
            'content' => '### La genèse
Alors, ce bot, franchement, je l\'ai fais pour le fun.  
Enfin, un peu plus que du fun. L\'idée était surtout de voir ce qui était possible de réaliser avec l\'[API de twitter](https://developer.twitter.com/en/docs).

### Le résultat
Ce robot satirique immite les supporteurs qui changent d\'équipe de coeur régulièrement.  
Toutes les 20 minutes, il supporte une nouvelle ville !  
D\'après mes calculs, il en a jusqu\'en 2023 !  
Allez le découvrir ici --> [Bot du FC Procuration](https://mobile.twitter.com/FProcuration)


### Le challenge technique
* Jouer un peu avec les jetons d\'accés
* Nettoyer le dataset de toutes les villes de France (supprimer les doublons !)
* Création d\'une commande Symfony que j\'exécute à l\'aide de la crontab !  

[Source github](https://github.com/guillaumebdx/symfony-twitter)'
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
            'picture' => 'vivavox.png',
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
            'picture' => 'newdeal.png',
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
            'picture' => 'audi.jpg',
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
            if (isset($projectData['picture'])) {
                $project->setPoster($projectData['picture']);
            }
            if (isset($projectData['content'])) {
                $project->setContent($projectData['content']);
            }
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
