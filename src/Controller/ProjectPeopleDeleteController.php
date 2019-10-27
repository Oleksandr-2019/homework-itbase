<?php
// src/Controller/ProjectPeopleDeleteController.php
namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

use App\Entity\ProjectPeople;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;

class ProjectPeopleDeleteController extends AbstractController
{
    /**
     * @Route("/projectpeople/delete/{id}")
     */
    public function delete($id)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $projectPeople = $entityManager->getRepository(ProjectPeople::class)->find($id);

        if (!$projectPeople) {
            throw $this->createNotFoundException(
                'Delete for id '.$id
            );
        }

        $entityManager->remove($projectPeople);
        $entityManager->flush();
        return new Response('Delete this project people: '.$projectPeople->getType());

    }
}