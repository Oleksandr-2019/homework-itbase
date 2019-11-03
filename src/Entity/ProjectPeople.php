<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ProjectPeopleRepository")
 */
class ProjectPeople
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
    private $Type;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Responsibility;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getType(): ?string
    {
        return $this->Type;
    }

    public function setType(string $Type): self
    {
        $this->Type = $Type;

        return $this;
    }

    public function getResponsibility(): ?string
    {
        return $this->Responsibility;
    }

    public function setResponsibility(string $Responsibility): self
    {
        $this->Responsibility = $Responsibility;

        return $this;
    }

















    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Title;

    /**
     * @return Collection|Project[]
     */
    public function getTitle(): Collection
    {
        return $this->Title;
    }

    public function addTitle(Project $title): self
    {
        if (!$this->Title->contains($title)) {
            $this->Title[] = $title;
            $title->addType($this);
        }

        return $this;
    }

    public function removeTitle(Project $title): self
    {
        if ($this->Title->contains($title)) {
            $this->Title->removeElement($title);
            $title->removeType($this);
        }

        return $this;
    }








    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Project", mappedBy="projectPeoples")
     */
    private $projects;

    public function __construct()
    {
        $this->projects = new ArrayCollection();
    }
    /**
     * @return ArrayCollection
     */
    public function getProjects(): ArrayCollection
    {
        return $this->projects;
    }

    /**
     * @param ArrayCollection $projects
     */
    public function setProjects(ArrayCollection $projects): void
    {
        $this->projects = $projects;
    }
}
