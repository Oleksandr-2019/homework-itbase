<?php
// src/Controller/DepartmentSetController.php
namespace App\Controller;

use App\Entity\Department;
use App\Entity\Staff;
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

        $staff = new Staff();
        $staff->setFullName('Eremenko');
        $staff->setEmail('Eremenko@gmail.com');
        $staff->setPhone(263243);
        $staff->setCreatedAt('text3 for CreatedAt');
        $staff->setSkills('Html, CSS, SCSS, JS, PHP, Wordpress, Symfony');
        $staff->setComments('Junior developer');

        $department = new Department();
        $department->setTitle('Backend');
        $department->setDescription('Server side development');
        $department->setTeamLead('Terminator');

        // relates this product to the category
        //s$department->addFullName($staff);

        // tell Doctrine you want to (eventually) save the Company (no queries yet)
        $entityManager->persist($department);
        $entityManager->persist($staff);

        // actually executes the queries (i.e. the INSERT query)
        $entityManager->flush();

        return $this->render('department/department_set.html.twig', array(

        ));
    }
}