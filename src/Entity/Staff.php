<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\StaffRepository")
 */
class Staff
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
    private $FullName;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Email;

    /**
     * @ORM\Column(type="integer")
     */
    private $Phone;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $CreatedAt;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Skills;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Comments;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Title;
    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Company", inversedBy="staffs")
     */
    private $company;
    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Department", inversedBy="staffs")
     */
    private $departments;

    public function __construct()
    {
        $this->departments = new ArrayCollection();
    }

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Company", inversedBy="Staff")
     */

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFullName(): ?string
    {
        return $this->FullName;
    }

    public function setFullName(string $FullName): self
    {
        $this->FullName = $FullName;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->Email;
    }

    public function setEmail(string $Email): self
    {
        $this->Email = $Email;

        return $this;
    }

    public function getPhone(): ?int
    {
        return $this->Phone;
    }

    public function setPhone(int $Phone): self
    {
        $this->Phone = $Phone;

        return $this;
    }

    public function getCreatedAt(): ?string
    {
        return $this->CreatedAt;
    }

    public function setCreatedAt(?string $CreatedAt): self
    {
        $this->CreatedAt = $CreatedAt;

        return $this;
    }

    public function getSkills(): ?string
    {
        return $this->Skills;
    }

    public function setSkills(?string $Skills): self
    {
        $this->Skills = $Skills;

        return $this;
    }

    public function getComments(): ?string
    {
        return $this->Comments;
    }

    public function setComments(?string $Comments): self
    {
        $this->Comments = $Comments;

        return $this;
    }

    /**
     * @return Collection|Department[]
     */
    public function getTitle(): Collection
    {
        return $this->Title;
    }

    public function addTitle(Department $title): self
    {
        if (!$this->Title->contains($title)) {
            $this->Title[] = $title;
        }

        return $this;
    }

    public function removeTitle(Department $title): self
    {
        if ($this->Title->contains($title)) {
            $this->Title->removeElement($title);
        }

        return $this;
    }

    public function setTitle(?Company $title): self
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @return ArrayCollection
     */
    public function getDepartments(): ArrayCollection
    {
        return $this->departments;
    }

    public function addDepartment(Department $department): Staff
    {
        if (!$this->departments->contains($department)) {
            $this->departments->add($department);
        }

        return $this;
    }

    /**
     * @return mixed
     */
    public function getCompany()
    {
        return $this->company;
    }

    /**
     * @param mixed $company
     */
    public function setCompany($company): void
    {
        $this->company = $company;
    }
}
