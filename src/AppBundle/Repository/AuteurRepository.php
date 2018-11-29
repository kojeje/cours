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
//          QueryBuilder => Pour éxecuter des requêtes
//          Altenatives  : DQL ou NativeQueries (permet de rentrer du SQL pur)

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
//                               eq fetch
            $results = $query->getArrayResult();
            return $results;
        }
//        public function getAuteurbyWord($word)
//        {
//            $queryBuilder = $this->createQueryBuilder('a');
//
//            $query = $queryBuilder
////              eq SELECT sql
//                ->select('a')
////              eq WHERE  sql        eq Like        eq OR sql
//                ->where('a.bio LIKE :word OR a.name LIKE :word OR a.country LIKE :word')
//                ->setParameter('word','%'.$word.'%')
//                ->getQuery();
//
//            $results = $query->getArrayResult();
//
//            return $results;
//
//        }

}