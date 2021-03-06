<?php
/**
 * Created by PhpStorm.
 * User: pro
 * Date: 2019-03-05
 * Time: 18:16
 */

namespace AppBundle\Controller;

use AppBundle\Entity\Category;
use AppBundle\Entity\Product;
use AppBundle\Service\SerializeProductService;
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
        $products = $this
            ->getDoctrine()
            ->getRepository('AppBundle:Product')
            ->findActive();

       return ['products'=>$products];
    }




    /**
     * @Route("/products/{id}", name="product_item", requirements={"id": "[0-9]+"})
     * @Template()
     * @param Product $product
     * @return array
     */
    public function showAction(Product $product)
    {

//============= Services ==============
//        $serialize = $this->container->get('app.serializer');
//        dump($serialize->serialize($product));
//        die();


        return ['product' => $product];

    }

    /**
     * @Route("/category/{id}", name="product_by_category", requirements={"id": "[0-9]+"})
     * @Template()
     * @param Category $category
     * @return array
     */
    public function listByCategoryAction(Category $category){

        //--------- Get data from DB product table ------------
        $products = $this
            ->getDoctrine()
            ->getRepository('AppBundle:Product')
            ->findByCategory($category);

        return ['products'=>$products];
    }

}