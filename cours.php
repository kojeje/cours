<?php
    /**
     * Created by PhpStorm.
     * User: jeromesuhard
     * Date: 21/11/2018
     * Time: 14:45
     */
    // src/AppBundle/Entity/Product.php

//    CREATION de Base de donnees (doctrine)
    namespace AppBundle\Entity;

    use Doctrine\ORM\Mapping as ORM;

    /**
     * @ORM\Entity
     * @ORM\Table(name="product")
     */
//    On crée une class par table
//    ----------------------------
    class Product
    {
        /**
         * @ORM\Column(type="integer")
         * @ORM\Id
         * @ORM\GeneratedValue(strategy="AUTO")
         */

//        On crée un parametre privée par colonne
//        ---------------------------------------
        private $id;

        /**
         * @ORM\Column(type="string", length=100)
         */
        private $name;

        /**
         * @ORM\Column(type="decimal", scale=2)
         */
        private $price;

        /**
         * @ORM\Column(type="text")
         */
        private $description;
    }
