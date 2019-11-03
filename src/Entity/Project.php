<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ProjectRepository")
 */
class Project
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Title;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Description;

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



















    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Type;

    /**
     * @return Collection|ProjectPeople[]
     */
    public function getType(): Collection
    {
        return $this->Type;
    }

    public function addType(ProjectPeople $type): self
    {
        if (!$this->Type->contains($type)) {
            $this->Type[] = $type;
        }

        return $this;
    }

    public function removeType(ProjectPeople $type): self
    {
        if ($this->Type->contains($type)) {
            $this->Type->removeElement($type);
        }

        return $this;
    }







    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\ProjectPeople", inversedBy="projects")
     */
    private $projectPeoples;

    public function __construct()
    {
        $this->projectPeoples = new ArrayCollection();
    }

    /**
     * @return ArrayCollection
     */
    public function getProjectPeoples(): ArrayCollection
    {
        return $this->projectPeoples;
    }

    public function addProjectPeople(ProjectPeople $projectPeople): Project
    {
        if (!$this->projectPeoples->contains($projectPeople)) {
            $this->projectPeoples->add($projectPeople);
        }

        return $this;
    }

}
