<?php
// src/Controller/ProjectSetController.php
namespace App\Controller;

use App\Entity\Project;
use App\Entity\ProjectPeople;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

class ProjectSetController extends AbstractController
{
    /**
     * @Route("/project/set", name="create_project")
     */
    public function create(): Response
    {
        // you can fetch the EntityManager via $this->getDoctrine()
        // or you can add an argument to the action: createCompany(EntityManagerInterface $entityManager)
        $entityManager = $this->getDoctrine()->getManager();

        $projectPeople = new ProjectPeople();
        $projectPeople->setType('Frontend');
        $projectPeople->setResponsibility('Text for browser Responsibility');




        $project = new Project();
        $project->setTitle('Gopchuk');
        $project->setDescription('Medical help');
        $project->addProjectPeople($projectPeople);
        $project->addType('kkkkkkkkkkkkk');

        // tell Doctrine you want to (eventually) save the Company (no queries yet)
        $entityManager->persist($project);
        $entityManager->persist($projectPeople);

        // actually executes the queries (i.e. the INSERT query)
        $entityManager->flush();

        return new Response('Saved detail for project '.$project->getTitle());
    }
}