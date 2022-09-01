<?php

namespace App\Entity;

use App\Repository\AttributeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AttributeRepository::class)
 */
class Attribute
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $attributeType;

    /**
     * @ORM\ManyToOne(targetEntity=ProductType::class, inversedBy="attributes")
     * @ORM\JoinColumn(nullable=false)
     */
    private $productType;

    /**
     * @ORM\OneToMany(targetEntity=ProductAttributeValueInt::class, mappedBy="attribute", orphanRemoval=true)
     */
    private $productAttributeValueInts;

    /**
     * @ORM\OneToMany(targetEntity=ProductAttributeValueString::class, mappedBy="attribute", orphanRemoval=true)
     */
    private $productAttributeValueStrings;

    public function __construct()
    {
        $this->productAttributeValueInts = new ArrayCollection();
        $this->productAttributeValueStrings = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getAttributeType(): ?string
    {
        return $this->attributeType;
    }

    public function setAttributeType(string $attributeType): self
    {
        $this->attributeType = $attributeType;

        return $this;
    }

    public function getProductType(): ?ProductType
    {
        return $this->productType;
    }

    public function setProductType(?ProductType $productType): self
    {
        $this->productType = $productType;

        return $this;
    }

    /**
     * @return Collection<int, ProductAttributeValueInt>
     */
    public function getProductAttributeValueInts(): Collection
    {
        return $this->productAttributeValueInts;
    }

    public function addProductAttributeValueInt(ProductAttributeValueInt $productAttributeValueInt): self
    {
        if (!$this->productAttributeValueInts->contains($productAttributeValueInt)) {
            $this->productAttributeValueInts[] = $productAttributeValueInt;
            $productAttributeValueInt->setAttribute($this);
        }

        return $this;
    }

    public function removeProductAttributeValueInt(ProductAttributeValueInt $productAttributeValueInt): self
    {
        if ($this->productAttributeValueInts->removeElement($productAttributeValueInt)) {
            // set the owning side to null (unless already changed)
            if ($productAttributeValueInt->getAttribute() === $this) {
                $productAttributeValueInt->setAttribute(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, ProductAttributeValueString>
     */
    public function getProductAttributeValueStrings(): Collection
    {
        return $this->productAttributeValueStrings;
    }

    public function addProductAttributeValueString(ProductAttributeValueString $productAttributeValueString): self
    {
        if (!$this->productAttributeValueStrings->contains($productAttributeValueString)) {
            $this->productAttributeValueStrings[] = $productAttributeValueString;
            $productAttributeValueString->setAttribute($this);
        }

        return $this;
    }

    public function removeProductAttributeValueString(ProductAttributeValueString $productAttributeValueString): self
    {
        if ($this->productAttributeValueStrings->removeElement($productAttributeValueString)) {
            // set the owning side to null (unless already changed)
            if ($productAttributeValueString->getAttribute() === $this) {
                $productAttributeValueString->setAttribute(null);
            }
        }

        return $this;
    }
}
