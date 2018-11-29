<?php
    /**
     * Created by PhpStorm.
     * User: jeromesuhard
     * Date: 28/11/2018
     * Time: 11:06
     */

    namespace AppBundle\Entity;
    use Symfony\Component\Security\Core\User\UserInterface;
    use Doctrine\ORM\Mapping as ORM;

    /**
     * @ORM\Entity(repositoryClass="AppBundle\Repository\User_Repository")
     * @ORM\Table(name="user")
     */
    class User
    {
        /**
         * @ORM\Column(type="integer")
         * @ORM\Id
         * @ORM\GeneratedValue(strategy="AUTO")
         */
        private $id;

        /**
         * @ORM\Column(type="string")
         */

        private $pseudo;

//        /**
//         * @Assert\Email(
//         *     message = "The email '{{ value }}' is not a valid email.",
//         *     checkMX = true
//         * )
//         */
//        private $email;

        /**
         *
         */


    }