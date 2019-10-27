<?php
// src/Controller/ProjectDeleteController.php
namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

use App\Entity\Project;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;

class ProjectDeleteController extends AbstractController
{
    /**
     * @Route("/project/delete/{id}")
     */
    public function delete($id)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $project = $entityManager->getRepository(Project::class)->find($id);

        if (!$project) {
            throw $this->createNotFoundException(
                'Delete for id '.$id
            );
        }

        $entityManager->remove($project);
        $entityManager->flush();
        return new Response('Delete this project: '.$project->getTitle());

    }
}