<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

class Type
{
    #[ORM\Id, ORM\GeneratedValue, ORM\Column]
    protected int $id;

    #[ORM\ManyToOne(targetEntity: Product::class, inversedBy: 'type')]
    protected Collection $products;

    public function __construct(
        #[ORM\Column]
        public string $name,
    )
    {
        $this->products = new ArrayCollection();
    }

    public function addProduct(Product $product)
    {
        $this->products->add($product);
    }

    /**
     * @return Collection<Product>
     */
    public function getProducts(): Collection
    {
        return $this->products;
    }
}