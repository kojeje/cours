<?php

    namespace AppBundle\Controller;


    use AppBundle\Entity\Auteur;
    use AppBundle\Entity\Livre;
    use Symfony\Bundle\FrameworkBundle\Controller\Controller;
    use Symfony\Component\HttpFoundation\Request;
    use Symfony\Component\Routing\Annotation\Route;

    class DefaultController extends Controller
    {
        /**
        * @Route("/livre", name="livre")
        */
        public function LivreTestAction()
        {
            $repository = $this->getDoctrine()->getRepository(Livre::class);

            $livre = $repository->find(1);

            var_dump($livre); die();
        }
        /**
         * @Route("/auteurs", name="auteurs")
         */
        public function auteurTestAction()

//       Doctrine fait le lien entre la base de données et la programmation objet
        {
            $repository = $this->getDoctrine()->getRepository(Auteur::class);

            $auteurs = $repository->findAll();

            return $this->render("@App/Default/auteurs.html.twig",
                [
                    'auteurs'=>$auteurs
                ]);
        }
        /**
         * @Route("/auteur/{id}", name="auteur")
         */
        public function auteurAction($id)
        {
//
//          On retourne le parametre $this->articles en fonction de la valeur de $id (à préciser)
            $repository = $this->getDoctrine()->getRepository(Auteur::class);

            $auteur = $repository->find($id);

            return $this->render(

                "@App/Default/auteur.html.twig",
                [
                    'auteur'=> $auteur
                ]
            );

        }

    }