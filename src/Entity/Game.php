<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\GameRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: GameRepository::class)]
#[ApiResource]
class Game
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $id_rawg = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $platform = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $game_condition = null;

    #[ORM\Column(nullable: true)]
    private ?bool $is_box = null;

    #[ORM\Column(nullable: true)]
    private ?bool $is_notice = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdRawg(): ?string
    {
        return $this->id_rawg;
    }

    public function setIdRawg(string $id_rawg): static
    {
        $this->id_rawg = $id_rawg;

        return $this;
    }

    public function getPlatform(): ?string
    {
        return $this->platform;
    }

    public function setPlatform(?string $platform): static
    {
        $this->platform = $platform;

        return $this;
    }

    public function getGameCondition(): ?string
    {
        return $this->game_condition;
    }

    public function setGameCondition(?string $game_condition): static
    {
        $this->game_condition = $game_condition;

        return $this;
    }

    public function isBox(): ?bool
    {
        return $this->is_box;
    }

    public function setBox(?bool $is_box): static
    {
        $this->is_box = $is_box;

        return $this;
    }

    public function isNotice(): ?bool
    {
        return $this->is_notice;
    }

    public function setNotice(?bool $is_notice): static
    {
        $this->is_notice = $is_notice;

        return $this;
    }
}
