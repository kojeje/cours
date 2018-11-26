<?php

    namespace AppBundle\Controller;


    use AppBundle\Entity\Auteur;
    use AppBundle\Entity\Livre;
    use Symfony\Bundle\FrameworkBundle\Controller\Controller;
    use Symfony\Component\HttpFoundation\Request;
    use Symfony\Component\HttpFoundation\Response;
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

            {#@todo !!!!!!Vue Nav NE S'AFFICHE PAS!!!!#}

            }
        }

        /**
         * @Route("/auteurs", name="auteurs")
         */
        public function auteurTestAction()
        {
//      Cherche tous les auteurs avec instance de getDoctrine -> methode getRepository
//      Doctrine fait le lien entre la base de données et la programmation objet

            $repository = $this->getDoctrine()->getRepository(Auteur::class);
//          findAll = SELECT * FROM auteur
            $auteurs = $repository->findAll();

            return $this->render("@App/Default/auteurs.html.twig",
                [
                    'auteurs' => $auteurs
                ]);
        }



        /**
         * @Route("/auteur/{id}", name="auteur")
         */
//      le place holder est utilisé comme parametre $id de la requete doctrine
        public function auteurAction($id)
        {
//
//          On retourne le parametre $this->articles en fonction de la valeur de $id (à préciser)
            $repository = $this->getDoctrine()->getRepository(Auteur::class);

            $auteur = $repository->find($id);

            return $this->render(

                "@App/Default/auteur.html.twig",
                [
                    'auteur' => $auteur
                ]
            );

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
         * @Route("/auteur/pays/{country}", name="country")
         */
        public function countryTestAction($country)

//       Doctrine fait le lien entre la base de données et la programmation objet
        {
//
            $repository = $this->getDoctrine()->getRepository(Auteur::class);
//                la methode appelé getAuteurbyCountry créée dans le fichier 'AuteurRepository
            $auteurs = $repository->getAuteurbyCountry($country);


            return $this->render("@App/Default/auteurs.html.twig",
                [
                    'auteurs' => $auteurs
                ]);
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
         * @Route("/auteur-search", name="search_auteur")
         */
        public function auteurByWordAction(Request $request)
        {
            $word = $request->query->get('search');
            $repository = $this->getDoctrine()->getRepository(Auteur::class);
            $auteurs = $repository->getAuteurbyWord($word);
            return $this->render('@App/Default/auteurs.html.twig',
            [
                'auteurs' => $auteurs
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
        /**
         * @Route("/insert_livre", name="insert_livre")
         */

//        TODO
        public function ajoutLivreAction()
        {
            //recupere l'entity manager de doctrine
            $entityManager = $this->getDoctrine()->getManager();

            $repository = $this->getDoctrine()->getRepository(Auteur::class);
            //On récupère le repository en fonction de l'id
            $Auteur =$repository->find('4');
            // je cree une nouvelle instance de l'entité livre
            $livre = new Livre();

            // j'utilise les setters de mon entité
            $livre->setTitre("Eloge du Jeunisme");
            $livre->setGenre('Témoignage');
            $livre->setParutiondate(new \Datetime('25-02-1989'));
            $livre->setResume("J'aime pas les vieux, ils puent, ils pètent, ils prennent leur cul pour une trompettes");

            $livre->setPrice('30');
            $livre->setAuteur($Auteur);

            $entityManager->persist($livre);
            $entityManager->flush();
            return new Response('Nouveau livre ajouté');
         }
        /**
         * @Route("/insert_auteur", name="insert_auteur")
         */
        public function ajoutAuteurAction()
        {
            //recupere l'entity manager de doctrine
            $entityManager = $this->getDoctrine()->getManager();

            // je cree une nouvelle instance de l'entité livre
            $Auteur = new Auteur();

            // j'utilise les setters de mon entité
            $Auteur->setName("Jérôme Faure");
            $Auteur->setCountry('Le Pian sur Garonne');
            $Auteur->setBirthdate(new \Datetime('25-02-2018'));
            $Auteur->setDeathdate(new \Datetime(''));
            $Auteur->setBio('Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                    Atque commodi consequatur, culpa,
                                    cupiditate eius facere facilis laudantium magni maiores numquam
                                    odit officia provident quia recusandae rem,
                                    repellendus rerum sequi tenetur!');



            $entityManager->persist($Auteur);
            $entityManager->flush();
            return new Response('Nouvel auteur ajouté');
        }
//
//        /**
//         * @Route("/suppr_livre", name="suppr_livre")
//         */
//        public function supprLivreAction(){
//            $repository = $this->getDoctrine()->getRepository(Livre::class);
//            $entityManager = $this->getDoctrine()->getManager();
//
//            $livre =$repository->find('1');
//            $entityManager->remove($livre);
//            $entityManager->flush();
//            return new response('livre supprimé');
//            }
//
//        /**
//         * @Route("/suppr_auteur", name="suppr_auteur")
//         */
//        public function supprAuteurAction()
//        {
//            $repository = $this->getDoctrine()->getRepository(Auteur::class);
//            $entityManager = $this->getDoctrine()->getManager();
//
//            $Auteur =$repository->find('1');
//            $entityManager->remove($Auteur);
//            $entityManager->flush();
//            return new response('auteur supprimé');
//        }
        /**
         * @Route("/admin/livres", name="admin_livres")
         */
        public function livresAdminTestAction()

//       Doctrine fait le lien entre la base de données et la programmation objet
        {
            $repository = $this->getDoctrine()->getRepository(Livre::class);

            $livres = $repository->findAll();

            return $this->render("@App/Default/livres_admin.html.twig",
                [
                    'livres' => $livres
                ]);
        }


        /**
         * @Route("/admin/supp_livre/{id}", name="admin_supp_livre")
         */
        public function livreAdminAction($id)
        {
            $repository = $this->getDoctrine()->getRepository(Livre::class);
            $entityManager = $this->getDoctrine()->getManager();

            $Livre =$repository->find($id);
            $entityManager->remove($Livre);
            $entityManager->flush();
            return $this->render("@App/Default/livres_admin.html.twig",
                [
                    'livre' => $Livre
                ]);
        }
        /**
         * @Route("/admin/update_livre/{id}", name="admin_update_livre")
         */
        public function livreUpdateAction($id)
        {
            //repository pour récupérer l'entité
            $repository = $this->getDoctrine()->getRepository(Livre::class);
            $entityManager = $this->getDoctrine()->getManager();

            //On récupère le repository en fonction de l'id
            $Livre =$repository->find($id);

            // j'utilise les setters de mon entité
            $Livre->settitre("Les meilleures blagues de Jean Roucas");
            $Livre->setresume("C'est nul, c'est de mauvais gout, et c'est pas drôle: Tout le charme de Jean Roucas... Le sensei de la 'blague de merde'");
            $Livre->setparutiondate(new \Datetime('25-03-2018'));




            $entityManager->persist($Livre);
            $entityManager->flush();
            return new Response('Livre mis à jour');
        }
        /**
         * @Route("/admin/auteurs", name="admin_auteurs")
         */
        public function auteurAdminTestAction()

//       Doctrine fait le lien entre la base de données et la programmation objet
        {
            $repository = $this->getDoctrine()->getRepository(Auteur::class);

            $auteurs = $repository->findAll();

            return $this->render("@App/Default/auteurs_admin.html.twig",
                [
                    'auteurs' => $auteurs
                ]);
        }


        /**
         * @Route("/admin/supp_auteur/{id}", name="admin_supp_auteur")
         */
        public function auteurSuppAction($id)
        {
            //repository pour récupérer l'entité'
            $repository = $this->getDoctrine()->getRepository(Auteur::class);
            //R2cupérer $entityManager
            $entityManager = $this->getDoctrine()->getManager();
            //---------------------------------------------------
            $Auteur =$repository->find($id);
            $entityManager->remove($Auteur);
            $entityManager->flush();
            return new response('Auteur supprimé');
        }

        /**
         * @Route("/admin/update_auteur/{id}", name="admin_update_auteur")
         */
        public function auteurUpdateAction($id)
        {
        //repository pour récupérer l'entité
        $repository = $this->getDoctrine()->getRepository(Auteur::class);
        $entityManager = $this->getDoctrine()->getManager();

        //On récupère le repository en fonction de l'id
        $Auteur =$repository->find($id);

        // j'utilise les setters de mon entité
        $Auteur->setName("Hervé Vilar");
        $Auteur->setCountry('Zimbabwe');
        $Auteur->setBirthdate(new \Datetime('25-03-2018'));
        $Auteur->setDeathdate(new \Datetime(''));
        $Auteur->setBio("Le roi de la chanson ringarde se met à l'écriture<br> Le pire évènement littéraire de 2018...<br> A éviter absolument");



        $entityManager->persist($Auteur);
        $entityManager->flush();
        return new Response('Auteur mis à jour');
        }
}
