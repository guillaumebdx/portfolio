<?php

namespace App\Form;

use App\Entity\Category;
use App\Entity\Project;
use App\Entity\Technology;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Vich\UploaderBundle\Form\Type\VichFileType;

class ProjectType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('description')
            ->add('category', EntityType::class, [
                'choice_label' => 'name',
                'class'        => Category::class
            ])
            ->add('technologies', EntityType::class, [
                'choice_label' => 'name',
                'label_attr'   => [
                    'class' => 'checkbox-custom',
                ],
                'class'        => Technology::class,
                'multiple'     => true,
                'expanded'     => true,
            ])
            ->add('posterFile', VichFileType::class, [
                'required'     => false,
                'allow_delete' => true,
                'download_uri' => true,
                ])
            ->add('content', TextareaType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Project::class,
        ]);
    }
}
