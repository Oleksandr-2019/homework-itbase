<?php
// src/Form/Type/Staff/StaffType.php
namespace App\Form\Type\Staff;

use App\Entity\Staff;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class StaffType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('fullName', TextType::class,  array(
                'label' => 'Enter full name'
            ))
            ->add('email', TextType::class,  array(
                'label' => 'Enter email'
            ))
            ->add('phone', TextType::class,  array(
                'label' => 'Enter Phone'
            ))
            ->add('createdAt', TextType::class,  array(
                'label' => 'Enter CreatedAt'
            ))
            ->add('skills', TextType::class,  array(
                'label' => 'Enter Skills'
            ))
            ->add('comments', TextType::class,  array(
                'label' => 'Enter Comments'
            ))
            ->add('save', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'dataStaff_class' => Staff::class
        ]);
    }
}