<?php
// src/Controller/DepartmentSetController.php
namespace App\Controller;

use App\Entity\Department;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use App\Form\Type\Department\DepartmentType;



class DepartmentSetController extends AbstractController
{
    /**
     * @Route("/department/set", name="create_department")
     */
    public function createDepartment(Request $request): Response
    {

        $entityManager = $this->getDoctrine()->getManager();

        $department = new Department();

        $formDepartment = $this->createForm(DepartmentType::class, $department);

        $formDepartment->handleRequest($request);

        if ($formDepartment->isSubmitted() && $formDepartment->isValid()) {

            $formDepartment->getData();

            $department = $formDepartment->getData();

            $entityManager = $this->getDoctrine()->getManager();

            $entityManager->persist($department);

            $entityManager->flush();

            $id = $department->getId();

            $url = $this->generateUrl(
                'edit_department',
                array('id' => $id)
            );
            return $this->redirect($url);
        }

        return $this->render('department/department_set.html.twig', [
            'formDepartment' => $formDepartment->createView(),
        ]);

    }
}