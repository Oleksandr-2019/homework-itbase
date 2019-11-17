<?php
// src/Form/Type/Department/DepartmentType.php
namespace App\Form\Type\Department;

use App\Entity\Department;
use App\Entity\Project;
use App\Services\GetProjectService;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;


use Doctrine\ORM\EntityManagerInterface;


class DepartmentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {



        $projects = new Project();



        $builder
            ->add('title', TextType::class,  array(
                'label' => 'Enter Title'
            ))
            ->add('description', TextType::class,  array(
                'label' => 'Enter Description'
            ))
            ->add('teamLead', TextType::class,  array(
                'label' => 'Enter TeamLead'
            ))
            ->add('projects', EntityType::class, [
                'label' => 'Enter communication',
                'class' => Project::class,
                'choices' => $projects->getTitle(),
            ])
            ->add('save', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'dataDepartment_class' => Department::class
        ]);
    }
}