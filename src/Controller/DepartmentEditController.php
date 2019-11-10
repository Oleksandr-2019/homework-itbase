<?php
// src/Controller/DepartmentEditController.php
namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

use App\Entity\Department;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;

class DepartmentEditController extends AbstractController
{
    /**
     * @Route("/department/edit/{id}", name="edit_department")
     */
    public function update($id)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $department = $entityManager->getRepository(Department::class)->find($id);

        if (!$department) {
            throw $this->createNotFoundException(
                'No department found for id '.$id
            );
        }

        $department->setTitle('Full step');
        $department->setDescription('Full step side development');
        $department->setTeamLead('Betman');


        $entityManager->flush();

        return $this->render('department/department_edit.html.twig', array(

        ));
    }
}