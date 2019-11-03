<?php
// src/Controller/DepartmentDeleteController.php
namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

use App\Entity\Department;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;

class DepartmentDeleteController extends AbstractController
{
    /**
     * @Route("/department/delete/{id}")
     */
    public function delete($id)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $department = $entityManager->getRepository(Department::class)->find($id);

        if (!$department) {
            throw $this->createNotFoundException(
                'Delete for id '.$id
            );
        }

        $entityManager->remove($department);
        $entityManager->flush();
        return $this->render('department/department_delete.html.twig', array(

        ));
    }
}