<?php
/**
 * Created by PhpStorm.
 * User: jeromesuhard
 * Date: 22/11/2018
 * Time: 09:59
 */

namespace AppBundle\Repository;


use Doctrine\ORM\EntityRepository;


class LivreRepository extends EntityRepository
{
    public function getLivrebyGenre($genre)
    {


        $queryBuilder =$this->createQueryBuilder('l');

        $query = $queryBuilder
                    ->select('l')
                    ->where('l.genre = :genre')
                    ->setParameter('genre', $genre)
                    ->getQuery();
//todo                     eq fetch

        $results = $query->getResult();

        return $results;
    }
//    public function getLivrebyWord($word)
//    {
//        $queryBuilder = $this->createQueryBuilder('a');
//
//        $query = $queryBuilder
////              eq SELECT sql
//            ->select('a')
////              eq WHERE  sql        eq Like        eq OR sql
//            ->where('a.bio LIKE :word OR a.name LIKE :word OR a.country LIKE :word')
//            ->setParameter('word','%'.$word.'%')
//            ->getQuery();
//
//        $results = $query->getArrayResult();
//
//        return $results;
//
//    }
}