<?php

namespace App\Entity;

use App\Repository\UserInterchangeLocationValueIntRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=UserInterchangeLocationValueIntRepository::class)
 */
class UserInterchangeLocationValueInt
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=UserInterchangeLocation::class, inversedBy="userInterchangeLocationValueInts")
     * @ORM\JoinColumn(nullable=false)
     */
    private $entity;

    /**
     * @ORM\ManyToOne(targetEntity=Attribute::class, inversedBy="userInterchangeLocationValueInts")
     * @ORM\JoinColumn(nullable=false)
     */
    private $attribute;

    /**
     * @ORM\Column(type="integer")
     */
    private $value;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEntity(): ?UserInterchangeLocation
    {
        return $this->entity;
    }

    public function setEntity(?UserInterchangeLocation $entity): self
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

    public function getValue(): ?int
    {
        return $this->value;
    }

    public function setValue(int $value): self
    {
        $this->value = $value;

        return $this;
    }
}
