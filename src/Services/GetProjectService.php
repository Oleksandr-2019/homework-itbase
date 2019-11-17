<?php
namespace App\Services;

use App\Entity\Department;
use App\Entity\Project;
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

class GetProjectService extends AbstractController
{

    public function createDepartment()
    {
        $projects = new Project();


        $em = $this->getDoctrine()->getManager();
        /** @var Project $projects */
        $projects = $em->getRepository(Project::class)->findAll();
        $deps = $projects;
        var_dump($deps);

        foreach ($deps as $dep) {
            //var_dump($dep->getTitle());
            $depAll = $dep->getTitle();
            var_dump($depAll);
        }
    }
}
