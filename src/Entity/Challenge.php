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
    public $description;
}
?>