<?php
    /**
     * Created by PhpStorm.
     * User: jeromesuhard
     * Date: 21/11/2018
     * Time: 14:49
     */

    namespace AppBundle\Entity;

    use Doctrine\ORM\Mapping as ORM;
    /**
     * @ORM\ Entity
     * @ORM\Table(name="auteur")
     */

    class Auteur
    {
        /**
         * @ORM\Column(type="integer")
         * @ORM\Id
         * @ORM\GeneratedValue(strategy="AUTO")
         */

        private $id;
    }


