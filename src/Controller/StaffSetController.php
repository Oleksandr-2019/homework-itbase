<?php
// src/Controller/StaffSetController.php
namespace App\Controller;

use App\Entity\Company;
use App\Entity\Staff;
use App\Entity\Department;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

class StaffSetController extends AbstractController
{
    /**
     * @Route("/staff/set", name="create_staff")
     */
    public function createStaff(): Response
    {
        // you can fetch the EntityManager via $this->getDoctrine()
        // or you can add an argument to the action: createCompany(EntityManagerInterface $entityManager)
        $entityManager = $this->getDoctrine()->getManager();

        $department = new Department();
        $department->setTitle('Backend');
        $department->setDescription('Server side development');
        $department->setTeamLead('Terminator');

        $company = new Company();
        $company->setTitle('FF');

        $staff = new Staff();
        $staff->setFullName('Eremenko');
        $staff->setEmail('Eremenko@gmail.com');
        $staff->setPhone(263243);
        $staff->setCreatedAt('text3 for CreatedAt');
        $staff->setSkills('Html, CSS, SCSS, JS, PHP, Wordpress, Symfony');
        $staff->setComments('Junior developer');
        $staff->addDepartment($department);
        $staff->setCompany($company);

        // tell Doctrine you want to (eventually) save the Company (no queries yet)
        $entityManager->persist($company);
        $entityManager->persist($staff);
        $entityManager->persist($department);

        // actually executes the queries (i.e. the INSERT query)
        $entityManager->flush();

        return $this->render('staff/staff_set.html.twig', array(

        ));
    }
}