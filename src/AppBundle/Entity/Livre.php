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
     * @ORM\Entity(repositoryClass="AppBundle\Repository\LivreRepository")
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
         * @ORM\Column(type="text")
         */

        private $titre;

        /**
         * @ORM\Column(type="text")
         */

        private $resume;


        /**
         * @ORM\Column(type="date")
         */
        private $parutiondate;

        /**
         * @ORM\Column(type="text")
         */

        private $genre;


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
        public function getTitre()
        {
            return $this->titre;
        }

        /**
         * @param mixed $titre
         */
        public function setTitre($titre)
        {
            $this->titre = $titre;
        }

        /**
         * @return mixed
         */
        public function getResume()
        {
            return $this->resume;
        }

        /**
         * @param mixed $resume
         */
        public function setResume($resume)
        {
            $this->resume = $resume;
        }

        /**
         * @return mixed
         */
        public function getParutiondate()
        {
            return $this->parutiondate;
        }

        /**
         * @param mixed $parutiondate
         */
        public function setParutiondate($parutiondate)
        {
            $this->parutiondate = $parutiondate;
        }

        /**
         * @return mixed
         */
        public function getGenre()
        {
            return $this->genre;
        }

        /**
         * @param mixed $genre
         */
        public function setGenre($genre)
        {
            $this->genre = $genre;
        }

        /**
         * @return mixed
         */
        public function getPrice()
        {
            return $this->price;
        }

        /**
         * @param mixed $price
         */
        public function setPrice($price)
        {
            $this->price = $price;
        }

        /**
         * @return mixed
         */
        public function getAutId()
        {
            return $this->aut_id;
        }

        /**
         * @param mixed $aut_id
         */
        public function setAutId($aut_id)
        {
            $this->aut_id = $aut_id;
        }

        /**
         * @return mixed
         */
        public function getCatId()
        {
            return $this->cat_id;
        }

        /**
         * @param mixed $cat_id
         */
        public function setCatId($cat_id)
        {
            $this->cat_id = $cat_id;
        }



    }
