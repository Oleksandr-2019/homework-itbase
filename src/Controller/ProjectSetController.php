<?php
// src/Controller/ProjectSetController.php
namespace App\Controller;

use App\Entity\Project;
use App\Entity\ProjectPeople;
use App\Entity\Department;
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


        $department = new Department();
        $department->setTitle('Full step');
        $department->setDescription('Server and browser side development');
        $department->setTeamLead('Eremenko');

        $project = new Project();
        $project->setTitle('Energy news');
        $project->setDescription('News about world energy');
        $project->addProjectPeople($projectPeople);
        $project->addDepartment($department);


        // tell Doctrine you want to (eventually) save the Company (no queries yet)
        $entityManager->persist($project);
        $entityManager->persist($projectPeople);
        $entityManager->persist($department);

        // actually executes the queries (i.e. the INSERT query)
        $entityManager->flush();

        return new Response('Saved detail for project '.$project->getTitle());
    }
}