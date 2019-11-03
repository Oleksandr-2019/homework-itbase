<?php
// src/Controller/ProjectEditController.php
namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

use App\Entity\Project;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;

class ProjectEditController extends AbstractController
{
    /**
     * @Route("/project/edit/{id}")
     */
    public function update($id)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $project= $entityManager->getRepository(Project::class)->find($id);

        if (!$project) {
            throw $this->createNotFoundException(
                'No project found for id '.$id
            );
        }

        $project->setTitle('Dog');
        $project->setDescription('Help for animal');

        $entityManager->flush();

        return $this->render('project/project_edit.html.twig', array(

        ));
    }
}