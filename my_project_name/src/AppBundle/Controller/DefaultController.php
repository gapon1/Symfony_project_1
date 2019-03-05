<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $a = 11122;
        $someArray = [1,2,"sobaka"];
        $someValue = false;

        // replace this example code with whatever you need
        return $this->render('default/index.html.twig',
            ['a' => $a,
                'someArray' => $someArray,
                'some_value' => $someValue
            ]);
    }

    /**
     * @Route("/feedback", name="feedback")
     */
    public function feddbackAction(){
        die('Works');
    }
}
