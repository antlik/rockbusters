<?php

namespace Rockbusters\EmBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;


/**
 * Event
 *
 * @ORM\Table(name="em_event")
 * @ORM\Entity(repositoryClass="Rockbusters\EmBundle\Repository\EventRepository")
 */
class Event
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    
    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=64)
     */
    private $name;
    
    /**
    * @Gedmo\Slug(fields={"name"}, updatable=true)
    * @ORM\Column(length=255, unique=true)
    */
    
    private $slug;    

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;
    /**
     * Get id
     *
     * @return integer 
     */
    
    /**
     * @ORM\ManyToOne(targetEntity="Rockbusters\EmBundle\Entity\TeamMember", inversedBy="events")
     * @ORM\JoinColumn(name="event_id", referencedColumnName="id")
     */
    protected $teamMember;
    

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Event
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set slug
     *
     * @param string $slug
     * @return Event
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * Get slug
     *
     * @return string 
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Event
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set event
     *
     * @param \Rockbusters\EmBundle\Entity\TeamMember $event
     * @return Event
     */
    public function setTeamMember(\Rockbusters\EmBundle\Entity\TeamMember $event = null)
    {
        $this->teamMember = $teamMember;

        return $this;
    }

    /**
     * Get event
     *
     * @return \Rockbusters\EmBundle\Entity\TeamMember 
     */
    public function getTeamMember()
    {
        return $this->teamMember;
    }
}
