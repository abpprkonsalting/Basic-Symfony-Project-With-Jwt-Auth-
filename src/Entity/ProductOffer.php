<?php

namespace App\Entity;

use App\Repository\ProductOfferRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProductOfferRepository::class)
 */
class ProductOffer
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Product::class, inversedBy="productOffers")
     * @ORM\JoinColumn(nullable=false)
     */
    private $product;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="productOffers")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    /**
     * @ORM\Column(type="datetime")
     */
    private $startDate;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $endDate;

    /**
     * @ORM\ManyToOne(targetEntity=Location::class, inversedBy="productOffers")
     * @ORM\JoinColumn(nullable=false)
     */
    private $location;

    /**
     * @ORM\OneToMany(targetEntity=ProductOfferBid::class, mappedBy="productOffer")
     */
    private $productOfferBids;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $hasDelivery;

    public function __construct()
    {
        $this->productOfferBids = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getProduct(): ?Product
    {
        return $this->product;
    }

    public function setProduct(?Product $product): self
    {
        $this->product = $product;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getStartDate(): ?\DateTimeInterface
    {
        return $this->startDate;
    }

    public function setStartDate(\DateTimeInterface $startDate): self
    {
        $this->startDate = $startDate;

        return $this;
    }

    public function getEndDate(): ?\DateTimeInterface
    {
        return $this->endDate;
    }

    public function setEndDate(?\DateTimeInterface $endDate): self
    {
        $this->endDate = $endDate;

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

    /**
     * @return Collection<int, ProductOfferBid>
     */
    public function getProductOfferBids(): Collection
    {
        return $this->productOfferBids;
    }

    public function addProductOfferBid(ProductOfferBid $productOfferBid): self
    {
        if (!$this->productOfferBids->contains($productOfferBid)) {
            $this->productOfferBids[] = $productOfferBid;
            $productOfferBid->setProductOffer($this);
        }

        return $this;
    }

    public function removeProductOfferBid(ProductOfferBid $productOfferBid): self
    {
        if ($this->productOfferBids->removeElement($productOfferBid)) {
            // set the owning side to null (unless already changed)
            if ($productOfferBid->getProductOffer() === $this) {
                $productOfferBid->setProductOffer(null);
            }
        }

        return $this;
    }

    public function getHasDelivery(): ?bool
    {
        return $this->hasDelivery;
    }

    public function setHasDelivery(?bool $hasDelivery): self
    {
        $this->hasDelivery = $hasDelivery;

        return $this;
    }

}
