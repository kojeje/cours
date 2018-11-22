<?php
    /**
     * Created by PhpStorm.
     * User: jeromesuhard
     * Date: 22/11/2018
     * Time: 14:34
     */


    namespace AppBundle\Repository;


    use Doctrine\ORM\EntityRepository;

    class AuteurRepository extends EntityRepository
    {
        public function getAuteurbyCountry($country)
        {


            $queryBuilder =$this->createQueryBuilder('a');

            $query = $queryBuilder
//
                ->select('a')
//              eq WHERE (sql)
                ->where('a.country = :country')
//              Permet de définir un paramètre de requete de maniere sécurisée
                ->setParameter('country', $country)
//              recupérer la methode createQueryBuilder dans la variable $query et la passer dans $results
                ->getQuery();
//todo                     eq fetch
            $results = $query->getArrayResult();
            return $results;
        }
}