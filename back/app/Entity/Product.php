<?php

namespace App\Entity;

use App\Repository\ProductRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProductRepository::class)]
class Product
{
    #[ORM\Id, ORM\GeneratedValue, ORM\Column]
    protected int $id;

    #[ORM\ManyToMany(targetEntity: Sale::class, inversedBy: 'products')]
    protected Collection $sales;

    public function __construct(
        #[ORM\Column]
        public string $name,
        #[ORM\Column, ORM\OneToMany(mappedBy: 'id')]
        public Type $type,
    )
    {
        $this->sales = new ArrayCollection();
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function addSale(Sale $sale): void
    {
        $this->sales->add($sale);
    }
}