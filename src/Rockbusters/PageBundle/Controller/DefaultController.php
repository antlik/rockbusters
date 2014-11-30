<?php

namespace Rockbusters\PageBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('RockbustersPageBundle:Default:index.html.twig', array('name' => '$name'));
    }
    
    public function homepageAction()
    {      
        return $this->render('RockbustersPageBundle:Pages:homepage.html.twig', array());
    }
    
    public function contactpageAction()
    {      
        return $this->render('RockbustersPageBundle:Pages:contact.html.twig', array());
    }    
    
    public function showAction($slug)
    {
        $em = $this->getDoctrine()->getManager();
        
        $page = $em->getRepository('RockbustersPageBundle:Page')->findOneBy(array('slug' => $slug));
        
        if (!$page) {
            throw $this->createNotFoundException('The page does not exist');
        }
        return $this->render('RockbustersPageBundle:Page:show.html.twig', array(
            'page' => $page,
        ));
    }
}
