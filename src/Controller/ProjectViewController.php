<?php

// src/Controller/ProjectViewController.php
namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

use App\Entity\Project;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;

class ProjectViewController extends AbstractController
{

    /**
     * @Route("/project/view/{id}", name="view_project")
     */

    public function indexAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $project = $em->getRepository(Project::class)->find($id);



        return $this->render('project/project_view.html.twig', array(
            'idNumber' => $id,
            'titleProject' => $project->getTitle(),
            'descriptionProject' => $project->getDescription(),
        ));
    }
}