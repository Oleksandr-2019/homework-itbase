<?php

// src/Controller/ProjectPeopleViewController.php
namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

use App\Entity\ProjectPeople;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;

class ProjectPeopleViewController extends AbstractController
{

    /**
     * @Route("/projectpeople/view/{id}", name="view_projectpeople")
     */

    public function indexAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $projectpeople = $em->getRepository(ProjectPeople::class)->find($id);
        return $this->render('projectpeople/projectpeople_view.html.twig', array(
            'idNumber' => $id,
            'typeProjectPeople' => $projectpeople->getType(),
            'responsibilityProjectPeople' => $projectpeople->getResponsibility(),
        ));
    }
}
