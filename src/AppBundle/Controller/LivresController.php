<?php
    /**
     * Created by PhpStorm.
     * User: jeromesuhard
     * Date: 26/11/2018
     * Time: 15:51
     */
    namespace AppBundle\Controller;


    use AppBundle\Entity\Auteur;
    use AppBundle\Entity\Livre;
    use Symfony\Bundle\FrameworkBundle\Controller\Controller;
    use Symfony\Component\HttpFoundation\Request;
    use Symfony\Component\HttpFoundation\Response;
    use Symfony\Component\Routing\Annotation\Route;


    class LivresController extends Controller
    {
        /**
         * @Route("/livre", name="livre")
         */
        public function LivreTestAction()
        {
            $repository = $this->getDoctrine()->getRepository(Livre::class);

            $livre = $repository->find(1);

        }






        /**
         * @Route("/livres", name="livres")
         */
        public function livresTestAction()

//       Doctrine fait le lien entre la base de données et la programmation objet
        {
            $repository = $this->getDoctrine()->getRepository(Livre::class);

            $livres = $repository->findAll();

            return $this->render("@App/Default/livres.html.twig",
                [
                    'livres' => $livres
                ]);
            return $this->render("@App/Default/nav.html.twig");
        }



        /**
         * @Route("/livre/genre/{genre}", name="livre_genre")
         */
        public function livreGenre($genre)
        {
//          Doctrine fait le lien entre la base de données et la programmation objet
            $repository = $this->getDoctrine()->getRepository(Livre::class);

//                la methode appelé getLivrebyGenre créée dans le fichier 'AuteurRepository
            $livres = $repository->getLivrebyGenre($genre);



            return $this->render("@App/Default/livres.html.twig",
                [
                    'livres' => $livres
                ]);


        }


        /**
         * @Route("/livre-search", name="search_auteur")
         */
        public function livreByWordAction(Request $request)
        {
            $word = $request->query->get('search');
            $repository = $this->getDoctrine()->getRepository(Auteur::class);
            $auteurs = $repository->getAuteurbyWord($word);
            return $this->render('@App/Default/auteurs.html.twig',
                [
                    'auteurs' => $auteurs
                ]);
        }
//Créer

    }