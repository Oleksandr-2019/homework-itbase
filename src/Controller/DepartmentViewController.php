<?php

// src/Controller/DepartmentViewController.php
namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

use App\Entity\Department;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;

class DepartmentViewController extends AbstractController
{

    /**
     * @Route("/department/view/{id}", name="view_department")
     */

    public function indexAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $staff = $em->getRepository(Department::class)->find($id);
        return $this->render('department/department_view.html.twig', array(
            'idNumber' => $id,
            'fullTitle' => $staff->getTitle(),
            'fullDescription' => $staff->getDescription(),
            'fullTeamLead' => $staff->getTeamLead(),
        ));
    }
}