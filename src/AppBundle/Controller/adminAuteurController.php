<?php
    /**
     * Created by PhpStorm.
     * User: jeromesuhard
     * Date: 26/11/2018
     * Time: 15:43
     */
    namespace AppBundle\Controller;


    use AppBundle\Entity\Auteur;
    use AppBundle\Entity\Livre;
    use Symfony\Bundle\FrameworkBundle\Controller\Controller;
    use Symfony\Component\HttpFoundation\Request;
    use Symfony\Component\HttpFoundation\Response;
    use Symfony\Component\Routing\Annotation\Route;

    class adminAuteurController extends Controller
    {


        /**
         * @Route("/admin/insert_auteur", name="admin_insert_auteur")
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

        /**
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

    }