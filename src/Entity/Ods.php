<?php

namespace App\Entity;

use App\Repository\OdsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OdsRepository::class)]
class Ods
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $descripcion = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $imagen_ur홯 = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTime $fecha = null;

    #[ORM\Column]
    private ?int $etiqueta1 = null;

    #[ORM\Column(nullable: true)]
    private ?int $etiqueta2 = null;

    #[ORM\Column(nullable: true)]
    private ?int $etiqueta3 = null;

    /**
     * @var Collection<int, User>
     */
    #[ORM\ManyToMany(targetEntity: User::class, mappedBy: 'ods')]
    private Collection $users;

    public function __construct()
    {
        $this->users = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getDescripcion(): ?string
    {
        return $this->descripcion;
    }

    public function setDescripcion(?string $descripcion): static
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    public function getImagenUr홯(): ?string
    {
        return $this->imagen_ur홯;
    }

    public function setImagenUr홯(?string $imagen_ur홯): static
    {
        $this->imagen_ur홯 = $imagen_ur홯;

        return $this;
    }

    public function getFecha(): ?\DateTime
    {
        return $this->fecha;
    }

    public function setFecha(\DateTime $fecha): static
    {
        $this->fecha = $fecha;

        return $this;
    }

    public function getEtiqueta1(): ?int
    {
        return $this->etiqueta1;
    }

    public function setEtiqueta1(int $etiqueta1): static
    {
        $this->etiqueta1 = $etiqueta1;

        return $this;
    }

    public function getEtiqueta2(): ?int
    {
        return $this->etiqueta2;
    }

    public function setEtiqueta2(?int $etiqueta2): static
    {
        $this->etiqueta2 = $etiqueta2;

        return $this;
    }

    public function getEtiqueta3(): ?int
    {
        return $this->etiqueta3;
    }

    public function setEtiqueta3(?int $etiqueta3): static
    {
        $this->etiqueta3 = $etiqueta3;

        return $this;
    }

    /**
     * @return Collection<int, User>
     */
    public function getUsers(): Collection
    {
        return $this->users;
    }

    public function addUser(User $user): static
    {
        if (!$this->users->contains($user)) {
            $this->users->add($user);
            $user->addOd($this);
        }

        return $this;
    }

    public function removeUser(User $user): static
    {
        if ($this->users->removeElement($user)) {
            $user->removeOd($this);
        }

        return $this;
    }
}
