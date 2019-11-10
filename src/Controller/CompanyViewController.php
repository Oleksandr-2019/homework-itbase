<?php
// src/Controller/CompanyViewController.php
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

class CompanyViewController extends AbstractController
{

    /**
     * @Route("/company/view", name="view_company")
     */


    public function indexAction(Request $request)
    {

        $id = 1;
        $entityManager = $this->getDoctrine()->getManager();
        $number = $entityManager->getRepository(Company::class)->find($id);

        $number = new Number();

        $form = $this->createFormBuilder($number)
            ->add('Number', IntegerType::class)
            ->add('Show', SubmitType::class, ['label' => 'Show this company'])
            ->getForm();

        $form = $this->createForm(CompanyDeleteType::class, $number);

        $form->handleRequest($request);






        if ($form->isSubmitted() && $form->isValid()) {
            // данные - это массив с ключами "name", "email", и "message"
            $data = $form->getData();
            $id = $data->getNumber();



            $entityManager = $this->getDoctrine()->getManager();
            $company = $entityManager->getRepository(Company::class)->find($id);
            echo($company->getTitle());
        }


        return $this->render('company/company_view.html.twig', [
            'form' => $form->createView(),
        ]);
    }







}