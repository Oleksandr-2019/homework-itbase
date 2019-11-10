<?php
// src/Form/Type/Department/DepartmentType.php
namespace App\Form\Type\Department;

use App\Entity\Department;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DepartmentType extends AbstractType
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
            ->add('teamLead', TextType::class,  array(
                'label' => 'Enter TeamLead'
            ))
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