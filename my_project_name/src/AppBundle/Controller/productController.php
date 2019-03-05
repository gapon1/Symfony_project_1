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
        $products = [];

        for($i = 0; $i <= 10; $i++){
            $products[] = rand(1,100);
        }

       return ['products'=>$products];
    }





    /**
     * @Route("/products/{id}", name="product_item", requirements={"id": "[0-9]+"})
     * @Template()
     */
    public function showAction($id)
    {
        return ['id' => $id];
    }

}