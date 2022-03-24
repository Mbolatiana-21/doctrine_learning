<?php

namespace App\Entity;

use App\Repository\HomeRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=HomeRepository::class)
 */
class Home
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=25)
     */
    private $articlename;

    /**
     * @ORM\Column(type="string", length=25)
     */
    private $reference;

    /**
     * @ORM\Column(type="string", length=25)
     */
    private $quantity;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getArticlename(): ?string
    {
        return $this->articlename;
    }

    public function setArticlename(string $articlename): self
    {
        $this->articlename = $articlename;

        return $this;
    }

    public function getReference(): ?string
    {
        return $this->reference;
    }

    public function setReference(string $reference): self
    {
        $this->reference = $reference;

        return $this;
    }

    public function getQuantity(): ?string
    {
        return $this->quantity;
    }

    public function setQuantity(string $quantity): self
    {
        $this->quantity = $quantity;

        return $this;
    }
}
