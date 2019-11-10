<?php

// src/Controller/DepartmentViewController.php
namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

use App\Entity\Number;
use App\Entity\Department;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;

use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\HttpFoundation\Request;
use App\Form\Type\GetNumberType;

class DepartmentViewController extends AbstractController
{

    /**
     * @Route("/department/view", name="view_department")
     */

    public function indexAction(Request $request)
    {

        $id = 1;
        $entityManager = $this->getDoctrine()->getManager();
        $number = $entityManager->getRepository(Department::class)->find($id);

        $number = new Number();

        $form = $this->createFormBuilder($number)
            ->add('Number', IntegerType::class)
            ->add('Show', SubmitType::class, ['label' => 'Show this department'])
            ->getForm();

        $form = $this->createForm(GetNumberType::class, $number);

        $form->handleRequest($request);


        if ($form->isSubmitted() && $form->isValid()) {
            // данные - это массив с ключами "name", "email", и "message"
            $data = $form->getData();
            $id = $data->getNumber();



            $entityManager = $this->getDoctrine()->getManager();
            $department = $entityManager->getRepository(Department::class)->find($id);
            echo($department->getTitle());
        }


        return $this->render('company/company_view.html.twig', [
            'form' => $form->createView(),
        ]);


      /*
        $em = $this->getDoctrine()->getManager();
        $staff = $em->getRepository(Department::class)->find($id);

        return $this->render('department/department_view.html.twig', array(
            'idNumber' => $id,
            'fullTitle' => $staff->getTitle(),
            'fullDescription' => $staff->getDescription(),
            'fullTeamLead' => $staff->getTeamLead(),
        ));
      */
    }
}