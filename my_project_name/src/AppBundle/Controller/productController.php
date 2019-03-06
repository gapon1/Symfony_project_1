<?php
/**
 * Created by PhpStorm.
 * User: pro
 * Date: 2019-03-05
 * Time: 18:16
 */

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class productController extends Controller
{




    /**
     * @Route("/products", name="product_list")
     * @Template()
     */
    public function indexAction()
    {

        //--------- Get data from DB product table ------------
        $products = $this->getDoctrine()->getRepository('AppBundle:Product')->findAll();

       return ['products'=>$products];
    }





    /**
     * @Route("/products/{id}", name="product_item", requirements={"id": "[0-9]+"})
     * @Template()
     */
    public function showAction($id)
    {
        $products = $this->getDoctrine()->getRepository('AppBundle:Product')->find($id);

        if (!$products){
            throw $this->createNotFoundException('Product not found');
        }

        return ['product' => $products];
    }

}