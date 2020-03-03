<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class LearningController extends AbstractController {
    private $name;
    private function getName() {
        return $this->name;
    }

    /**
     * @Route("/about-me", name="aboutMe")
     */
    public function aboutMe() {
        return $this->render('learning/index.html.twig', [
        ]);
    }

    /**
     * @Route("/show-name", name="showName")
     */
    public function showMyName() {
        if (empty($_POST['myName'])){
            return $this->redirectToRoute('changeName');
        } else {
            $this->name = $_POST['myName'];
            return $this->render('learning/showname.html.twig', [
                'name' => $this->getName()
            ]);
        }

    }

    /**
     * @Route("/", name="changeName")
     */
    public function changeMyName() {
        return $this->render('learning/changename.html.twig');
    }
}
