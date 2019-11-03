<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\DepartmentRepository")
 */
class Department
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Title;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Description;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $TeamLead;
    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $FullName;
    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Staff", mappedBy="departments")
     */
    private $staffs;

    public function __construct()
    {
        $this->staffs = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->Title;
    }

    public function setTitle(string $Title): self
    {
        $this->Title = $Title;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->Description;
    }

    public function setDescription(string $Description): self
    {
        $this->Description = $Description;

        return $this;
    }

    public function getTeamLead(): ?string
    {
        return $this->TeamLead;
    }

    public function setTeamLead(string $TeamLead): self
    {
        $this->TeamLead = $TeamLead;

        return $this;
    }

    /**
     * @return Collection|Staff[]
     */
    public function getFullName(): Collection
    {
        return $this->FullName;
    }

    public function addFullName(Staff $fullName): self
    {
        if (!$this->FullName->contains($fullName)) {
            $this->FullName[] = $fullName;
            $fullName->addTitle($this);
        }

        return $this;
    }

    public function removeFullName(Staff $fullName): self
    {
        if ($this->FullName->contains($fullName)) {
            $this->FullName->removeElement($fullName);
            $fullName->removeTitle($this);
        }

        return $this;
    }

    /**
     * @return ArrayCollection
     */
    public function getStaffs(): ArrayCollection
    {
        return $this->staffs;
    }

    /**
     * @param ArrayCollection $staffs
     */
    public function setStaffs(ArrayCollection $staffs): void
    {
        $this->staffs = $staffs;
    }
}
