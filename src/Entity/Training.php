<?php

namespace App\Entity;

use App\Repository\TrainingRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TrainingRepository::class)
 */
class Training
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="text")
     */
    private $title;

    /**
     * @ORM\ManyToMany(targetEntity=Module::class, inversedBy="trainings")
     */
    private $modules;

    /**
     * @ORM\ManyToOne(targetEntity=TypeTraining::class, inversedBy="trainings")
     */
    private $typeTraining;

    /**
     * @ORM\OneToMany(targetEntity=Session::class, mappedBy="training")
     */
    private $sessions;

    public function __construct()
    {
        $this->modules = new ArrayCollection();
        $this->sessions = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @return Collection|Module[]
     */
    public function getModules(): Collection
    {
        return $this->modules;
    }

    public function addModule(Module $module): self
    {
        if (!$this->modules->contains($module)) {
            $this->modules[] = $module;
        }

        return $this;
    }

    public function removeModule(Module $module): self
    {
        $this->modules->removeElement($module);

        return $this;
    }

    public function getTypeTraining(): ?TypeTraining
    {
        return $this->typeTraining;
    }

    public function setTypeTraining(?TypeTraining $typeTraining): self
    {
        $this->typeTraining = $typeTraining;

        return $this;
    }

    /**
     * @return Collection|Session[]
     */
    public function getSessions(): Collection
    {
        return $this->sessions;
    }

    public function addSession(Session $session): self
    {
        if (!$this->sessions->contains($session)) {
            $this->sessions[] = $session;
            $session->setTraining($this);
        }

        return $this;
    }

    public function removeSession(Session $session): self
    {
        if ($this->sessions->removeElement($session)) {
            // set the owning side to null (unless already changed)
            if ($session->getTraining() === $this) {
                $session->setTraining(null);
            }
        }

        return $this;
    }
}
