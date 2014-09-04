<?php

namespace Rockbusters\EmBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class DefaultController extends Controller
{
    /**
     * @Route("/hello/{name}")
     * @Template()
     */
    public function indexAction($name)
    {
        return array('name' => $name);
    }
    
    /**
     * @Route("/location/{slug}")
     * @Template()
     */
    public function locationAction($slug)
    {
        
                $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('RockbustersEmBundle:Location')->findAll();

        return array(
            'entities' => $entities,
        );
        
        return array('slug' => $slug);
    }    
}
