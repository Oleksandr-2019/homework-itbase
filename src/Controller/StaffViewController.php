<?php
// src/Controller/StaffViewController.php
namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

use App\Entity\Staff;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;

class StaffViewController extends AbstractController
{

    /**
     * @Route("/staff/view/{id}", name="view_staff")
     */

    public function indexAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $staff = $em->getRepository(Staff::class)->find($id);
        return $this->render('staff/staff_view.html.twig', array(
            'idNumber'=>$id,
            'fullNameStaff' => $staff->getFullName(),
            'fullEmail' => $staff->getEmail(),
            'fullPhone' => $staff->getPhone(),
            'fullCreatedAt' => $staff->getCreatedAt(),
            'fullSkills' => $staff->getSkills(),
            'fullComments' => $staff->getComments(),
        ));
    }
}