<?php

namespace App\Repository;

use App\Entity\Product;
use App\Helper\EntityManagerCreator;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Mapping\ClassMetadata;

class ProductRepository extends EntityRepository
{

//    public function __construct()
//    {
//        parent::__construct(
//            EntityManagerCreator::createEntityManager(),
//            new ClassMetadata(Product::class)
//        );
//    }
}