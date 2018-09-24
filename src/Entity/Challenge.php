<?php
namespace App\Entity ;
use Doctrine\ORM\Mapping as ORM;
/**
* @ORM\Entity()
*
*/
class Challenge {
    /**
    * @ORM\Id
    * @ORM\GeneratedValue(strategy="AUTO")
    * @ORM\Column(type="integer")
    */
    public $id ;
    /**
    * @ORM\Column(type="string")
    */
    public $title;
    /**
    * @ORM\Column(type="text")
    */
    public $shortDescription;
    /**
    * @ORM\Column(type="text")
    */
    public $fullDescription;
    /**
    * @ORM\Column(type="text")
    */
    public $example;
    /**
    * @ORM\Column(type="text")
    */
    public $solution;

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of title
     */ 
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set the value of title
     *
     * @return  self
     */ 
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get the value of shortDescription
     */ 
    public function getShortDescription()
    {
        return $this->shortDescription;
    }

    /**
     * Set the value of shortDescription
     *
     * @return  self
     */ 
    public function setShortDescription($shortDescription)
    {
        $this->shortDescription = $shortDescription;

        return $this;
    }

    /**
     * Get the value of fullDescription
     */ 
    public function getFullDescription()
    {
        return $this->fullDescription;
    }

    /**
     * Set the value of fullDescription
     *
     * @return  self
     */ 
    public function setFullDescription($fullDescription)
    {
        $this->fullDescription = $fullDescription;

        return $this;
    }

    /**
     * Get the value of example
     */ 
    public function getExample()
    {
        return $this->example;
    }

    /**
     * Set the value of example
     *
     * @return  self
     */ 
    public function setExample($example)
    {
        $this->example = $example;

        return $this;
    }

    /**
     * Get the value of solution
     */ 
    public function getSolution()
    {
        return $this->solution;
    }

    /**
     * Set the value of solution
     *
     * @return  self
     */ 
    public function setSolution($solution)
    {
        $this->solution = $solution;

        return $this;
    }
}
?>