<?php

namespace AppBundle\Controller;

use AppBundle\Form\FeedbackType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction()
    {

        // replace this example code with whatever you need
        return $this->render('@App/default/index.html.twig');
    }


    //================ Robota s Formami ========================
    /**
     * @Route("/feedback", name="feedback")
     */
    public function feedbackAction(Request $request){

        $form = $this->createForm(FeedbackType::class );
        $form->add('submit', SubmitType::class);

        $form->handleRequest($request);

        //======= Validate form ===========
        if ($form->isSubmitted() && $form->isValid()){
            $feedback = $form->getData();

            //========= Add gets data to DB ==========
            $em = $this->getDoctrine()->getManager();
            $em->persist($feedback);
            $em->flush();

            //============ Flash message use bootstrap ======
            $this->addFlash('success', 'saved');

            //========= redirect after success insert in DB
            return $this->redirectToRoute('feedback');

            //save
            //redirect
        }




        return $this->render('@App/default/feedback.html.twig', [
            'feedback_form' => $form->createView()
        ]);
    }
}
