<?php
// src/Controller/ProjectPeopleEditController.php
namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

use App\Entity\ProjectPeople;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;

class ProjectPeopleEditController extends AbstractController
{
    /**
     * @Route("/projectpeople/edit/{id}")
     */
    public function update($id)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $projectPeople= $entityManager->getRepository(ProjectPeople::class)->find($id);

        if (!$projectPeople) {
            throw $this->createNotFoundException(
                'No project people found for id '.$id
            );
        }

        $projectPeople->setType('Backend');
        $projectPeople->setResponsibility('text for Backend');

        $entityManager->flush();

        return $this->render('projectpeople/projectpeople_edit.html.twig', array(

        ));
    }
}