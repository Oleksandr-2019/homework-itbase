<?php
// src/Controller/CompanyViewController.php
namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

use App\Entity\Company;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;

class CompanyViewController extends AbstractController
{

    /**
     * @Route("/company/view/{id}", name="view_company")
     */


    public function indexAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $company = $em->getRepository(Company::class)->find($id);
        return $this->render('company/company_view.html.twig', array(
            'idNumber'=>$id,
            'titleCompany' => $company->getTitle(),
        ));
    }
}