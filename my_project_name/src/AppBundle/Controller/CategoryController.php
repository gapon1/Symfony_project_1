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


class CategoryController extends Controller
{




    /**
     * @Route("/categories", name="categories_list")
     * @Template()
     */
    public function indexAction()
    {

        //--------- Get data from DB product table ------------
        $categories = $this
            ->getDoctrine()
            ->getRepository('AppBundle:Category')
            ->findBy([], ['name' => 'ASC']);

        return ['categories'=>$categories];
    }



}