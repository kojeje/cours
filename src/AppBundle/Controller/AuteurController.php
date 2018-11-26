<?php
    /**
     * Created by PhpStorm.
     * User: jeromesuhard
     * Date: 26/11/2018
     * Time: 15:36
     */
    namespace AppBundle\Controller;


    use AppBundle\Entity\Auteur;
    use AppBundle\Entity\Livre;
    use Symfony\Bundle\FrameworkBundle\Controller\Controller;
    use Symfony\Component\HttpFoundation\Request;
    use Symfony\Component\HttpFoundation\Response;
    use Symfony\Component\Routing\Annotation\Route;

    class AuteurController extends Controller
    {

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
        //@todo rajouter bouton "recherche par pays"
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


    }