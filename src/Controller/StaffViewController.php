<?php
// src/Controller/StaffViewController.php
namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

use App\Entity\Staff;
use App\Entity\Department;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\PersistentCollection;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\HttpFoundation\Response;

class StaffViewController extends AbstractController
{

    /**
     * @Route("/staff/view/{id}", name="view_staff")
     */

    public function indexAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        /** @var Staff $staff */
        $staff = $em->getRepository(Staff::class)->find($id);


        $nameOfCompany = $staff->getCompany()->getTitle();
        var_dump($nameOfCompany);

        echo('</br>');
        echo('</br>');
        echo('</br>');
        echo('</br>');
        //$danDep = $staff->getDepartments()->getOwner();
        //var_dump($danDep);
        $deps = $staff->getDepartments();
        foreach ($deps as $dep) {
            var_dump($dep->getId());
        }


        return $this->render('staff/staff_view.html.twig', array(
            'staff' => $staff,
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