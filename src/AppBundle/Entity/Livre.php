<?php
    /**
     * Created by PhpStorm.
     * User: jeromesuhard
     * Date: 21/11/2018
     * Time: 16:23
     */

    namespace AppBundle\Entity;
    use Doctrine\ORM\Mapping as ORM;
    /**
     * @ORM\ Entity
     * @ORM\Table(name="livre")
     */

    class Livre
    {
        /**
         * @ORM\Column(type="integer")
         * @ORM\Id
         * @ORM\GeneratedValue(strategy="AUTO")
         */
        private $id;

        /**
         * @ORM\Column(type="date")
         */
        private $parutiondate;


        /**
         * @ORM\Column(type="text")
         */

        private $editor;


        /**
         * @ORM\Column(type="integer")
         */
        private $price;

        /**
         * @ORM\Column(type="integer")
         */
        private $aut_id;

        /**
         * @ORM\Column(type="integer")
         */
        private $cat_id;




    }
