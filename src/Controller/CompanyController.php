<?php
// src/Controller/ProductController.php
namespace App\Controller;

use App\Entity\Company;
use App\Entity\Staff;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

class CompanyController extends AbstractController
{
    /**
     * @Route("/company", name="create_company")
     */
    public function createCompany(): Response
    {
        // you can fetch the EntityManager via $this->getDoctrine()
        // or you can add an argument to the action: createCompany(EntityManagerInterface $entityManager)
        $entityManager = $this->getDoctrine()->getManager();

        $company = new Company();
        $company->setTitle('WebDevelopment');

        // tell Doctrine you want to (eventually) save the Company (no queries yet)
        $entityManager->persist($company);

        // actually executes the queries (i.e. the INSERT query)
        $entityManager->flush();

        return $this->render('company/company_set.html.twig', array(

        ));
    }
}