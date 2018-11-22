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

        /**
         * @ORM\Column(type="date")
         */
        private $birthdate;


        /**
         * @ORM\Column(type="date", nullable=true)
         */
        private $deathdate;


        /**
         * @ORM\Column(type="text")
         */
        private $bio;

        /**
         * @ORM\Column(type="string")
         *
         */
        private $name;

        /**
         * @ORM\Column(type="integer")
         * * @ORM\GeneratedValue(strategy="AUTO")
         */
        private $aut_id;

        /**
         * @ORM\Column(type="integer")
         */
        private $cat_id;

        /**
         * @return mixed
         */
        public function getId()
        {
            return $this->id;
        }


        /**
         * @return mixed
         */
        public function getBirthdate()
        {
            return $this->birthdate;
        }

        /**
         * @param mixed $birthdate
         */
        public function setBirthdate($birthdate)
        {
            $this->birthdate = $birthdate;
        }

        /**
         * @return mixed
         */
        public function getDeathdate()
        {
            return $this->deathdate;
        }

        /**
         * @param mixed $deathdate
         */
        public function setDeathdate($deathdate)
        {
            $this->deathdate = $deathdate;
        }

        /**
         * @return mixed
         */
        public function getBio()
        {
            return $this->bio;
        }

        /**
         * @param mixed $bio
         */
        public function setBio($bio)
        {
            $this->bio = $bio;
        }

        /**
         * @return mixed
         */
        public function getName()
        {
            return $this->name;
        }

        /**
         * @param mixed $name
         */
        public function setName($name)
        {
            $this->name = $name;
        }




    }


