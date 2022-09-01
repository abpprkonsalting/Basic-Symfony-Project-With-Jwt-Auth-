<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\ProductRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProductRepository::class)
 */
#[ApiResource]
class Product
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
     * @ORM\ManyToOne(targetEntity=ProductType::class, inversedBy="products")
     * @ORM\JoinColumn(nullable=false)
     */
    private $productType;

    /**
     * @ORM\OneToMany(targetEntity=ProductAttributeValueInt::class, mappedBy="entity", orphanRemoval=true)
     */
    private $productAttributeValueInts;

    /**
     * @ORM\OneToMany(targetEntity=ProductAttributeValueString::class, mappedBy="entity", orphanRemoval=true)
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
            $productAttributeValueInt->setEntity($this);
        }

        return $this;
    }

    public function removeProductAttributeValueInt(ProductAttributeValueInt $productAttributeValueInt): self
    {
        if ($this->productAttributeValueInts->removeElement($productAttributeValueInt)) {
            // set the owning side to null (unless already changed)
            if ($productAttributeValueInt->getEntity() === $this) {
                $productAttributeValueInt->setEntity(null);
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
            $productAttributeValueString->setEntity($this);
        }

        return $this;
    }

    public function removeProductAttributeValueString(ProductAttributeValueString $productAttributeValueString): self
    {
        if ($this->productAttributeValueStrings->removeElement($productAttributeValueString)) {
            // set the owning side to null (unless already changed)
            if ($productAttributeValueString->getEntity() === $this) {
                $productAttributeValueString->setEntity(null);
            }
        }

        return $this;
    }
}
