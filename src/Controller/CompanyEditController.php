<?php
// src/Controller/CompanyEditController.php
namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

use App\Entity\Company;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;


use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use App\Form\Type\CompanyType;

class CompanyEditController extends AbstractController
{
    /**
     * @Route("/company/edit/{id}", name="edit_company")
     */
    public function update($id, Request $request)
    {
        // you can fetch the EntityManager via $this->getDoctrine()
        // or you can add an argument to the action: createCompany(EntityManagerInterface $entityManager)

        $entityManager = $this->getDoctrine()->getManager();

        $company= $entityManager->getRepository(Company::class)->find($id);

        // creates a task object and initializes some data for this example
        
        $company->setTitle('');

        $form = $this->createFormBuilder($company)
            ->add('title', TextType::class)
            ->add('save', SubmitType::class, ['label' => 'Create companion record '])
            ->getForm();

        $form = $this->createForm(CompanyType::class, $company);

        $form->handleRequest($request);


        if ($form->isSubmitted() && $form->isValid()) {

            //holds the submitted values
            $form->getData();

            // but, the original `$task` variable has also been updated
            $company = $form->getData();

            // ... perform some action, such as saving the task to the database
            // for example, if Task is a Doctrine entity, save it!
            $entityManager = $this->getDoctrine()->getManager();

            $company= $entityManager->getRepository(Company::class)->find($id);

            $entityManager->persist($company);

            $entityManager->flush();


        } else {
            return $this->render('company/company_set.html.twig', [
                'form' => $form->createView(),
            ]);
        }

        return $this->render('company/company_set.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}