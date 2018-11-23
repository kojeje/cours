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
//Créer
        /**
         * @Route("/insert_livre", name="insert_livre")
         */
        public function ajoutLivreAction()
        {
            //recupere l'entity manager de doctrine
            $entityManager = $this->getDoctrine()->getManager();

            // je cree une nouvelle instance de l'entité livre
            $livre = new Livre();

            // j'utilise les setters de mon entité
            $livre->setTitre("Le Rouge et le Noir");
            $livre->setGenre('roman');
            $livre->setParutiondate(new \Datetime('25-02-1989'));
            $livre->setResume('Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                    Atque commodi consequatur, culpa,
                                    cupiditate eius facere facilis laudantium magni maiores numquam
                                    odit officia provident quia recusandae rem,
                                    repellendus rerum sequi tenetur!');

            $livre->setPrice('30');

            $entityManager->persist($livre);
            $entityManager->flush();
            return $this->render('@App/Default/new_auteur.html.twig');
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
            $Auteur->setName("Steve Jobs");
            $Auteur->setCountry('suisse');
            $Auteur->setBirthdate(new \Datetime('25-02-2018'));
            $Auteur->setDeathdate(new \Datetime(''));
            $Auteur->setBio('Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                    Atque commodi consequatur, culpa,
                                    cupiditate eius facere facilis laudantium magni maiores numquam
                                    odit officia provident quia recusandae rem,
                                    repellendus rerum sequi tenetur!');



            $entityManager->persist($Auteur);
            $entityManager->flush();
            return $this->render('@App/Default/new_auteur.html.twig');
        }

    }