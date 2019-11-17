<?php
// src/Form/Type/Project/ProjectType.php
namespace App\Form\Type\Project;

use App\Entity\Project;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProjectType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('title', TextType::class,  array(
            'label' => 'Enter Title'
        ))
        ->add('description', TextType::class,  array(
            'label' => 'Enter Description'
        ))
        ->add('projectPeople', TextType::class,  array(
            'label' => 'Enter TeamLead'
        ))
        ->add('save', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'dataProject_class' => Project::class
        ]);
    }
}