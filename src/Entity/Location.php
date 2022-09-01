<?php

namespace App\Entity;

use App\Repository\LocationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=LocationRepository::class)
 */
class Location
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
     * @ORM\ManyToOne(targetEntity=Location::class, inversedBy="childrenLocations")
     */
    private $parentLocation;

    /**
     * @ORM\OneToMany(targetEntity=Location::class, mappedBy="parentLocation")
     */
    private $childrenLocations;

    public function __construct()
    {
        $this->childrenLocations = new ArrayCollection();
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

    public function getParentLocation(): ?self
    {
        return $this->parentLocation;
    }

    public function setParentLocation(?self $parentLocation): self
    {
        $this->parentLocation = $parentLocation;

        return $this;
    }

    /**
     * @return Collection<int, self>
     */
    public function getChildrenLocations(): Collection
    {
        return $this->childrenLocations;
    }

    public function addChildrenLocation(self $childrenLocation): self
    {
        if (!$this->childrenLocations->contains($childrenLocation)) {
            $this->childrenLocations[] = $childrenLocation;
            $childrenLocation->setParentLocation($this);
        }

        return $this;
    }

    public function removeChildrenLocation(self $childrenLocation): self
    {
        if ($this->childrenLocations->removeElement($childrenLocation)) {
            // set the owning side to null (unless already changed)
            if ($childrenLocation->getParentLocation() === $this) {
                $childrenLocation->setParentLocation(null);
            }
        }

        return $this;
    }
}
