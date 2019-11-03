<?php
// src/Controller/StaffDeleteController.php
namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

use App\Entity\Staff;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;

class StaffDeleteController extends AbstractController
{
    /**
     * @Route("/staff/delete/{id}")
     */
    public function delete($id)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $staff = $entityManager->getRepository(Staff::class)->find($id);

        if (!$staff) {
            throw $this->createNotFoundException(
                'Delete for id '.$id
            );
        }

        $entityManager->remove($staff);
        $entityManager->flush();
        return $this->render('staff/staff_delete.html.twig', array(

        ));
    }
}