<?php
// src/Controller/CompanyDeleteController.php
namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

use App\Entity\Company;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;

class CompanyDeleteController extends AbstractController
{
    /**
     * @Route("/company/delete/{id}")
     */
    public function delete($id)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $company = $entityManager->getRepository(Company::class)->find($id);

        if (!$company) {
            throw $this->createNotFoundException(
                'Delete for id '.$id
            );
        }

        $entityManager->remove($company);
        $entityManager->flush();
        return new Response('Delete this company: '.$company->getTitle());

    }
}