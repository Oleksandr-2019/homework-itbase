<?php
// src/Controller/DepartmentSetController.php
namespace App\Controller;

use App\Entity\Department;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

class DepartmentSetController extends AbstractController
{
    /**
     * @Route("/department/set", name="create_department")
     */
    public function createDepartment(): Response
    {
        // you can fetch the EntityManager via $this->getDoctrine()
        // or you can add an argument to the action: createCompany(EntityManagerInterface $entityManager)
        $entityManager = $this->getDoctrine()->getManager();

        $department = new Department();
        $department->setTitle('Frontend');
        $department->setDescription('Browser side development');
        $department->setTeamLead('Spiderman');

        // tell Doctrine you want to (eventually) save the Company (no queries yet)
        $entityManager->persist($department);

        // actually executes the queries (i.e. the INSERT query)
        $entityManager->flush();

        return new Response('Saved detail for department: '.$department->getTitle());
    }
}