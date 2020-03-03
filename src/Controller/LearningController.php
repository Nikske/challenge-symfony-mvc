<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class LearningController extends AbstractController {
    private $name;

    /**
     * @Route("/about-me", name="aboutMe")
     */
    public function aboutMe() {
        return $this->render('learning/index.html.twig', [
            'controller_name' => 'LearningController',
        ]);
    }
    private function getName() {
        return $this->name;
    }

    /**
     * @Route("/show-name", name="showName")
     */
    public function showMyName() {
        if (!isset($_POST['myName'])) {
            $_POST['myName']= "undefined";
        }
        $this->name = $_POST['myName'];
        return $this->render('learning/showname.html.twig', [
            'controller_name' => 'LearningController',
            'name' => $this->getName()
        ]);
    }

    /**
     * @Route("/", name="changeName")
     */
    public function changeMyName() {
        return $this->render('learning/changename.html.twig', [
            'controller_name' => 'LearningController',
            'name' => $this->getName()
        ]);
    }
}
