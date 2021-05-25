<?php

namespace App\Entity;

use App\Repository\SessionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SessionRepository::class)
 */
class Session
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $minimumTrainees;

    /**
     * @ORM\Column(type="integer")
     */
    private $maximumTrainees;

    /**
     * @ORM\Column(type="date")
     */
    private $startDate;

    /**
     * @ORM\Column(type="date")
     */
    private $endDate;

    /**
     * @ORM\ManyToMany(targetEntity=Trainee::class, inversedBy="sessions")
     */
    private $trainees;

    /**
     * @ORM\ManyToOne(targetEntity=Location::class, inversedBy="sessions")
     * @ORM\JoinColumn(nullable=false)
     */
    private $location;

    /**
     * @ORM\ManyToOne(targetEntity=Training::class, inversedBy="sessions")
     * @ORM\JoinColumn(nullable=false)
     */
    private $training;

    public function __construct()
    {
        $this->trainees = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMinimumTrainees(): ?int
    {
        return $this->minimumTrainees;
    }

    public function setMinimumTrainees(int $minimumTrainees): self
    {
        $this->minimumTrainees = $minimumTrainees;

        return $this;
    }

    public function getMaximumTrainees(): ?int
    {
        return $this->maximumTrainees;
    }

    public function setMaximumTrainees(int $maximumTrainees): self
    {
        $this->maximumTrainees = $maximumTrainees;

        return $this;
    }

    public function getStartDate(): ?\DateTimeInterface
    {
        return $this->startDate;
    }

    public function setStartDate(\DateTimeInterface $startDate): self
    {
        $this->startDate = $startDate;

        return $this;
    }

    public function getEndDate(): ?\DateTimeInterface
    {
        return $this->endDate;
    }

    public function setEndDate(\DateTimeInterface $endDate): self
    {
        $this->endDate = $endDate;

        return $this;
    }

    /**
     * @return Collection|Trainee[]
     */
    public function getTrainees(): Collection
    {
        return $this->trainees;
    }

    public function addTrainee(Trainee $trainee): self
    {
        if (!$this->trainees->contains($trainee)) {
            $this->trainees[] = $trainee;
        }

        return $this;
    }

    public function removeTrainee(Trainee $trainee): self
    {
        $this->trainees->removeElement($trainee);

        return $this;
    }


    public function getLocation(): ?Location
    {
        return $this->location;
    }


    public function setLocation($location)
    {
        $this->location = $location;

        return $this;
    }


    public function getTraining(): ?Training
    {
        return $this->training;
    }

    public function setTraining(?Training $training): self
    {
        $this->training = $training;

        return $this;
    }


}
