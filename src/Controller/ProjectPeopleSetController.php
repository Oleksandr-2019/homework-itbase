<?php
// src/Controller/ProjectPeopleSetController.php
namespace App\Controller;

use App\Entity\ProjectPeople;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

class ProjectPeopleSetController extends AbstractController
{
    /**
     * @Route("/projectpeople/set", name="create_projectpeople")
     */
    public function createProjectPeople(): Response
    {
        // you can fetch the EntityManager via $this->getDoctrine()
        // or you can add an argument to the action: create ProjectPeople(EntityManagerInterface $entityManager)
        $entityManager = $this->getDoctrine()->getManager();

        $projectPeople = new ProjectPeople();
        $projectPeople->setType('Backend');
        $projectPeople->setResponsibility('Text for Backend Responsibility');

        // tell Doctrine you want to (eventually) save the Company (no queries yet)
        $entityManager->persist($projectPeople);

        // actually executes the queries (i.e. the INSERT query)
        $entityManager->flush();

        return new Response('Saved name company '.$projectPeople->getType());
    }
}