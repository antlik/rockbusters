<?php

namespace Rockbusters\EmBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class TeamMemberController extends Controller
{
    /**
     * @Route("/team")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        
        $team_members = $em->getRepository('RockbustersEmBundle:TeamMember')->findAll();
        
        $seoPage = $this->container->get('sonata.seo.page');

        $seoPage->setTitle($seoPage->getTitle() .'| Team Page');        
        
        return array('team' => $team_members);
    }
    
    public function showAction($slug)
    {
        $em = $this->getDoctrine()->getManager();
        
        $member = $em->getRepository('RockbustersEmBundle:TeamMember')->findOneBy(array('slug' => $slug));

        $seoPage = $this->container->get('sonata.seo.page');

        $seoPage->setTitle($seoPage->getTitle() .'| Team Member Page | '. $member->getName());
    
        return $this->render('RockbustersEmBundle:TeamMember:show.html.twig', array(
            'member' => $member,
        ));
    }
}
