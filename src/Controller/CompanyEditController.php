<?php
// src/Controller/CompanyEditController.php
namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

use App\Entity\Company;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;

class CompanyEditController extends AbstractController
{
    /**
     * @Route("/company/edit/{id}")
     */
    public function update($id)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $company= $entityManager->getRepository(Company::class)->find($id);

        if (!$company) {
            throw $this->createNotFoundException(
                'No company found for id '.$id
            );
        }

        $company->setTitle('WebGroup');

        $entityManager->flush();

        return new Response(
            'Edit company with id: '.$company->getTitle()
        );
    }
}