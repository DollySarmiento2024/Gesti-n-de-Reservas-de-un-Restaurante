<?php

namespace App\Entity;

use App\Repository\ReservaRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ReservaRepository::class)]
#[ORM\Table(name: 'reservas')]
class Reserva
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private int $id;

    #[ORM\Column(name: 'fecha_hora', type: Types::DATETIME_MUTABLE)]
    private \DateTimeInterface $fecha_hora;

    #[ORM\Column(name: 'num_comensales', type: Types::INTEGER)]
    private int $num_comensales;

    #[ORM\ManyToOne(targetEntity: User::class, inversedBy: 'reservas')]
    #[ORM\JoinColumn(name:'user_id', referencedColumnName: 'id', nullable: false)]
    private ?User $user = null;

    public function getId(): int
    {
        return $this->id;
    }

    public function getFechaHora(): \DateTimeInterface
    {
        return $this->fecha_hora;
    }

    public function setFechaHora(\DateTimeInterface $fecha_hora): static
    {
        $this->fecha_hora = $fecha_hora;

        return $this;
    }

    public function getNumComensales(): int
    {
        return $this->num_comensales;
    }

    public function setNumComensales(int $num_comensales): static
    {
        $this->num_comensales = $num_comensales;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): static
    {
        $this->user = $user;

        return $this;
    }
}
