<?php
// src/Controller/StaffSetController.php
namespace App\Controller;

use App\Entity\Staff;
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

        $staff = new Staff();
        $staff->setFullName('Pupkin');
        $staff->setEmail('Pupkun@gmail.com');
        $staff->setPhone(28979789);
        $staff->setCreatedAt('text2 for CreatedAt');
        $staff->setSkills('Html, CSS, SCSS, JS, PHP, Wordpress, Symfony');
        $staff->setComments('Middle developer');


        // tell Doctrine you want to (eventually) save the Company (no queries yet)
        $entityManager->persist($staff);

        // actually executes the queries (i.e. the INSERT query)
        $entityManager->flush();

        return new Response('Saved this staff:'
        .'</br>'.$staff->getFullName()
        .'</br>'.$staff->getEmail()
        .'</br>'.$staff->getPhone()
        .'</br>'.$staff->getCreatedAt()
        .'</br>'.$staff->getSkills()
        .'</br>'.$staff->getComments()
        );
    }
}