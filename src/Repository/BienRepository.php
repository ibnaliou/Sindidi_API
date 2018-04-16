<?php

namespace App\Repository;

use App\Entity\Bien;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Bien|null find($id, $lockMode = null, $lockVersion = null)
 * @method Bien|null findOneBy(array $criteria, array $orderBy = null)
 * @method Bien[]    findAll()
 * @method Bien[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BienRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Bien::class);
    }

/*
 *
 *@return Bien[]
 */

    public function search($localite, $type, $budget)
    {
        $query = $this->createQueryBuilder('b')
        ->join('b.localite', 'l')
        ->join('b.type', 't')
        ->addSelect('l')
        ->addSelect('t')
        ->WHERE('l.id = :localite OR t.id = :type OR b.prixlocation BETWEEN :prixMin AND :prixMax')
        ->setParameters(array('localite' => $localite, 'type' => $type, 'prixMin' => $budget - 10000, 'prixMax' => $budget + 20000));

        return $query->getQuery()->getResult();
    }

    /*
     *
     *@return Bien[]
     */

        public function bienlocalite($localite)
        {
            $query = $this->createQueryBuilder('b')
            ->join('b.localite', 'l')
            ->addSelect('l')
            ->WHERE('l.id = :localite')
            ->setParameters(array('localite' => $localite));

            return $query->getQuery()->getResult();
        }

        /*
         *
         *@return Bien[]
         */

          public function bienType($type, $localite)
          {
                $query = $this->createQueryBuilder('b')
		->join('b.localite', 'l')
		->join('b.type', 't')
		->addSelect('l')
		->addSelect('t')
		->WHERE('l.id = :localite OR t.id = :type')
		->setParameters(array('localite' => $localite, 'type' => $type));

		return $query->getQuery()->getResult();
          }

          /*
           *
           *@return Bien[]
           */

            public function bienprix($prix)
            {
                $query = $this->createQueryBuilder('b')
                ->WHERE('b.prixlocation BETWEEN :prixMin AND :prixMax')
                ->setParameters(array('prix' => $prix));

                return $query->getQuery()->getResult();
            }
}
