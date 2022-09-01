<?php

namespace App\Entity;

use App\Repository\ProductAttributeValueStringRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProductAttributeValueStringRepository::class)
 */
class ProductAttributeValueString
{

    /**
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity=Product::class, inversedBy="productAttributeValueStrings")
     * @ORM\JoinColumn(nullable=false)
     */
    private $entity;

    /**
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity=Attribute::class, inversedBy="productAttributeValueStrings")
     * @ORM\JoinColumn(nullable=false)
     */
    private $attribute;

    /**
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity=Location::class, inversedBy="productAttributeValueStrings")
     * @ORM\JoinColumn(nullable=false)
     */
    private $location;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $value;

    public function getEntity(): ?Product
    {
        return $this->entity;
    }

    public function setEntity(?Product $entity): self
    {
        $this->entity = $entity;

        return $this;
    }

    public function getAttribute(): ?Attribute
    {
        return $this->attribute;
    }

    public function setAttribute(?Attribute $attribute): self
    {
        $this->attribute = $attribute;

        return $this;
    }

    public function getLocation(): ?Location
    {
        return $this->location;
    }

    public function setLocation(?Location $location): self
    {
        $this->location = $location;

        return $this;
    }

    public function getValue(): ?string
    {
        return $this->value;
    }

    public function setValue(string $value): self
    {
        $this->value = $value;

        return $this;
    }
}
