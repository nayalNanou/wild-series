<?php
// src/Controller/DefaultController.php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Program;

class DefaultController extends AbstractController
{

    /**
     * @Route("/", name="app_index")
     */
    public function index(): Response
    {
        $programs = $this->getDoctrine()
            ->getRepository(program::class)
            ->findAll();

        $programs = array_reverse($programs);

        return $this->render('index.html.twig', [
            'website' => 'Wild Series',
            'programs' => $programs,
        ]);
    }
}
