<?php
// src/Controller/CompanyDeleteController.php
namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;


use App\Entity\Number;
use App\Entity\Company;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;


use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\HttpFoundation\Request;
use App\Form\Type\CompanyDeleteType;

class CompanyDeleteController extends AbstractController
{
    /**
     * @Route("/company/delete")
     */
    public function delete(Request $request)
    {

        $id = 1;
        $entityManager = $this->getDoctrine()->getManager();
        $number = $entityManager = $this->getDoctrine()->getManager();

        //$number = $entityManager->getRepository(Number::class)->find($id);
        $number = new Number();


        $form = $this->createFormBuilder($number)
            ->add('Number', IntegerType::class)
            ->add('Delete', SubmitType::class, ['label' => 'Delete this company'])
            ->getForm();

        $form = $this->createForm(CompanyDeleteType::class, $number);

        $form->handleRequest($request);




        if ($form->isSubmitted() && $form->isValid()) {
            // данные - это массив с ключами "name", "email", и "message"
            $data = $form->getData();
            $id = $data->getNumber();



            $entityManager = $this->getDoctrine()->getManager();
            $company = $entityManager->getRepository(Company::class)->find($id);
            $entityManager->remove($company);
            $entityManager->flush();
        }








        return $this->render('company/company_delete.html.twig', array(
            'form' => $form->createView(),
        ));
    }
}