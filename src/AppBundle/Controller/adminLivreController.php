<?php
    /**
     * Created by PhpStorm.
     * User: jeromesuhard
     * Date: 26/11/2018
     * Time: 15:57
     */


    namespace AppBundle\Controller;


    use AppBundle\Entity\Auteur;
    use AppBundle\Entity\Livre;
    use AppBundle\Form\LivreType;
    use Symfony\Bundle\FrameworkBundle\Controller\Controller;
    use Symfony\Component\HttpFoundation\Request;
    use Symfony\Component\HttpFoundation\Response;
    use Symfony\Component\Routing\Annotation\Route;

    class adminLivreController extends Controller
    {
        /**
         * @Route("/insert_livre", name="insert_livre")
         */


        public function ajoutLivreAction()
        {
            //recupere l'entity manager de doctrine
            $entityManager = $this->getDoctrine()->getManager();

            $repository = $this->getDoctrine()->getRepository(Auteur::class);
            //On récupère le repository en fonction de l'id
            $Auteur = $repository->find('4');
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

            $auteurRepository = $this->getDoctrine()->getRepository(Auteur::class);
            $auteur = $auteurRepository->find(5);

            //On récupère le repository en fonction de l'id
            $Livre =$repository->find($id);

            // j'utilise les setters de mon entité
            $Livre->settitre("titre modifié, ajout auteur");
            $Livre->setresume("C'est nul, c'est de mauvais gout, et c'est pas drôle: Tout le charme de Jean Roucas... Le sensei de la 'blague de merde'");
            $Livre->setparutiondate(new \Datetime('25-03-2018'));
            $Livre->setAuteur($auteur);



            $entityManager->persist($Livre);
            $entityManager->flush();
            return new Response('Livre mis à jour');
        }

        /**
         * @Route("/admin/ajout_livre", name="ajout_livre_admin")
         */
        public function adminAjoutLivre ()
        {
            $livre= new Livre();
            $form=$this->createForm(LivreType::class, $livre);
            return $this->render("@App/Defaul/ajout_livre_admin.html.twig",
                [
                    'form'=>$form->createView()
                ]
            );
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
//
    }