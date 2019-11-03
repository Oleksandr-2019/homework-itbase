<?php
// src/Controller/StaffEditController.php
namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

use App\Entity\Staff;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;

class StaffEditController extends AbstractController
{
    /**
     * @Route("/staff/edit/{id}")
     */
    public function update($id)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $staff= $entityManager->getRepository(Staff::class)->find($id);

        if (!$staff) {
            throw $this->createNotFoundException(
                'No developer found for id '.$id
            );
        }

        $staff->setFullName('Eremenko Oleksandr');
        $staff->setEmail('Eremenko@gmail.com');
        $staff->setPhone(28979789);
        $staff->setCreatedAt('second text for CreatedAt');
        $staff->setSkills('Html, CSS, SCSS, JS, PHP, Wordpress, Symfony');
        $staff->setComments('Junior developer');

        $entityManager->flush();

        return $this->render('staff/staff_edit.html.twig', array(

        ));
    }
}