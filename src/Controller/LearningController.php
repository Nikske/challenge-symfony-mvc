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
        // If the user somehow came upon this page (by entering the URL) without a post, redirect them back to the form.
        if (empty($_POST['myName'])){
            return $this->redirectToRoute('changeName');
        } else {
            if (empty($_SESSION['myName'])) {
                $_SESSION['myName'] = $_POST['myName'];
                $this->name = $_SESSION['myName'];
            }
            $this->name = $_SESSION['myName'];
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
