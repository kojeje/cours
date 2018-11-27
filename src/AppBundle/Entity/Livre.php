<?php
    /**
     * Created by PhpStorm.
     * User: jeromesuhard
     * Date: 21/11/2018
     * Time: 16:23
     */

    namespace AppBundle\Entity;
    use Doctrine\ORM\Mapping as ORM;
    use AppBundle\Entity\Auteur;
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

//        /**
//         * @ORM\ManyToOne(targetEntity="Auteur", inversedBy="livres")
//         */
//        private $auteur;


        /**
         * @return mixed
         */
        public function getId()
        {
            return $this->id;
        }
//
//        /**
//         * @return mixed
//         */
//        public function getAuteur()
//        {
//            return $this->auteur;
//        }
//
//        /**
//         * @param mixed $auteur
//         */
//        public function setAuteur($auteur)
//        {
//            $this->auteur = $auteur;
//        }
//

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



    }
