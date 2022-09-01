<?php

namespace App\Entity;

use App\Repository\ProductOfferBidRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProductOfferBidRepository::class)
 */
class ProductOfferBid
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=ProductOffer::class, inversedBy="productOfferBids")
     * @ORM\JoinColumn(nullable=false)
     */
    private $productOffer;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="productOfferBids")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    /**
     * @ORM\Column(type="integer")
     */
    private $price;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $eta;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $SelectedOrder;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getProductOffer(): ?ProductOffer
    {
        return $this->productOffer;
    }

    public function setProductOffer(?ProductOffer $productOffer): self
    {
        $this->productOffer = $productOffer;

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

    public function getPrice(): ?int
    {
        return $this->price;
    }

    public function setPrice(int $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getEta(): ?\DateTimeInterface
    {
        return $this->eta;
    }

    public function setEta(?\DateTimeInterface $eta): self
    {
        $this->eta = $eta;

        return $this;
    }

    public function getSelectedOrder(): ?int
    {
        return $this->SelectedOrder;
    }

    public function setSelectedOrder(?int $SelectedOrder): self
    {
        $this->SelectedOrder = $SelectedOrder;

        return $this;
    }
}
