<?php

namespace Rockbusters\EmBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class LocationController extends Controller
{
    /**
     * @Route("/hello/{name}")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        
        $locations = $em->getRepository('RockbustersEmBundle:Location')->findAll();
        
        return array('locations' => $locations);
    }
    
    public function showAction($slug)
    {
        $em = $this->getDoctrine()->getManager();
        
        $location = $em->getRepository('RockbustersEmBundle:Location')->findOneBy(array('slug' => $slug));

        return $this->render('RockbustersEmBundle:Location:show.html.twig', array(
            'location' => $location,
        ));
    }
}
