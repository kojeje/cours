<?php
    /**
     * Created by PhpStorm.
     * User: jeromesuhard
     * Date: 21/11/2018
     * Time: 18:41
     */

    namespace AppBundle\Entity;
    use Doctrine\ORM\Mapping as ORM;
    /**
     * //appelle une classe Entity
     * -----------------------------
     * @ORM\ Entity
     *
     * //Nomme la classe
     * ------------------
     * @ORM\Table(name="category")
     */
    class category
    {

        /**
         * annotations ORM
         * Type de chaine
         * ---------------
         * @ORM\Column(type="integer")
         *
         * Determine la clé Primaire
         * --------------------------
         * @ORM\Id
         *
         * Auto-incrémente
         * ---------------
         * @ORM\GeneratedValue(strategy="AUTO")
         */

//      Crée  colonnes de la table (parametres de la class)
//      -------------------------------------------------------
        private $id;
//
//      etc.


        /**
         * @ORM\Column(type="text")
         */
        private $lbl;

        /**
         * @ORM\Column(type="integer")
         * @ORM\GeneratedValue(strategy="AUTO")
         */
        private $cat_id;










    }