<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CompanyRepository")
 */
class Company
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
     * @ORM\OneToMany(targetEntity="App\Entity\Staff", mappedBy="company")
     */
  /*  private $staffs;

    public function __construct()
    {
        $this->Staffs = new ArrayCollection();

    }
*/
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

















    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    //private $FullName;
    /**
     * @return Collection|Staff[]
     */
 /*   public function getFullName(): Collection
    {
        return $this->FullName;
    }

    public function addFullName(Staff $fullName): self
    {
        if (!$this->FullName->contains($fullName)) {
            $this->FullName[] = $fullName;
            $fullName->setTitle($this);
        }

        return $this;
    }

    public function removeFullName(Staff $fullName): self
    {
        if ($this->FullName->contains($fullName)) {
            $this->FullName->removeElement($fullName);
            // set the owning side to null (unless already changed)
            if ($fullName->getTitle() === $this) {
                $fullName->setTitle(null);
            }
        }

        return $this;
    }*/
}
