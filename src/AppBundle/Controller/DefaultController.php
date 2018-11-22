<?php

    namespace AppBundle\Controller;


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
         * @Route("/livre", name="livre")
         */
        public function auteurTestAction()
        {
            $repository = $this->getDoctrine()->getRepository(Livre::class);

            $livre = $repository->find(1);

            var_dump($livre); die();
        }

    }