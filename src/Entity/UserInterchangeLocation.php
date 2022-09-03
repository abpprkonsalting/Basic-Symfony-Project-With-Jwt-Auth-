<?php

namespace App\Entity;

use App\Repository\UserInterchangeLocationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=UserInterchangeLocationRepository::class)
 */
class UserInterchangeLocation
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="userInterchangeLocations")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity=Location::class, inversedBy="userInterchangeLocations")
     * @ORM\JoinColumn(nullable=false)
     */
    private $location;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $street;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $number;

    /**
     * @ORM\OneToMany(targetEntity=UserInterchangeLocationValueInt::class, mappedBy="entity", orphanRemoval=true)
     */
    private $userInterchangeLocationValueInts;

    /**
     * @ORM\OneToMany(targetEntity=UserInterchangeLocationValueString::class, mappedBy="entity", orphanRemoval=true)
     */
    private $userInterchangeLocationValueStrings;

    public function __construct()
    {
        $this->userInterchangeLocationValueInts = new ArrayCollection();
        $this->userInterchangeLocationValueStrings = new ArrayCollection();
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

    public function getLocation(): ?Location
    {
        return $this->location;
    }

    public function setLocation(?Location $location): self
    {
        $this->location = $location;

        return $this;
    }

    public function getStreet(): ?string
    {
        return $this->street;
    }

    public function setStreet(string $street): self
    {
        $this->street = $street;

        return $this;
    }

    public function getNumber(): ?string
    {
        return $this->number;
    }

    public function setNumber(string $number): self
    {
        $this->number = $number;

        return $this;
    }

    /**
     * @return Collection<int, UserInterchangeLocationValueInt>
     */
    public function getUserInterchangeLocationValueInts(): Collection
    {
        return $this->userInterchangeLocationValueInts;
    }

    public function addUserInterchangeLocationValueInt(UserInterchangeLocationValueInt $userInterchangeLocationValueInt): self
    {
        if (!$this->userInterchangeLocationValueInts->contains($userInterchangeLocationValueInt)) {
            $this->userInterchangeLocationValueInts[] = $userInterchangeLocationValueInt;
            $userInterchangeLocationValueInt->setEntity($this);
        }

        return $this;
    }

    public function removeUserInterchangeLocationValueInt(UserInterchangeLocationValueInt $userInterchangeLocationValueInt): self
    {
        if ($this->userInterchangeLocationValueInts->removeElement($userInterchangeLocationValueInt)) {
            // set the owning side to null (unless already changed)
            if ($userInterchangeLocationValueInt->getEntity() === $this) {
                $userInterchangeLocationValueInt->setEntity(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, UserInterchangeLocationValueString>
     */
    public function getUserInterchangeLocationValueStrings(): Collection
    {
        return $this->userInterchangeLocationValueStrings;
    }

    public function addUserInterchangeLocationValueString(UserInterchangeLocationValueString $userInterchangeLocationValueString): self
    {
        if (!$this->userInterchangeLocationValueStrings->contains($userInterchangeLocationValueString)) {
            $this->userInterchangeLocationValueStrings[] = $userInterchangeLocationValueString;
            $userInterchangeLocationValueString->setEntity($this);
        }

        return $this;
    }

    public function removeUserInterchangeLocationValueString(UserInterchangeLocationValueString $userInterchangeLocationValueString): self
    {
        if ($this->userInterchangeLocationValueStrings->removeElement($userInterchangeLocationValueString)) {
            // set the owning side to null (unless already changed)
            if ($userInterchangeLocationValueString->getEntity() === $this) {
                $userInterchangeLocationValueString->setEntity(null);
            }
        }

        return $this;
    }

}
