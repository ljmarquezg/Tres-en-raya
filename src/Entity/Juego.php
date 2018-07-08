<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\JuegoRepository")
 */
class Juego
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    public $jugador;

    /**
     * @ORM\Column(type="integer")
     */
    private $turnos;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $estado;

    /**
     * @ORM\Column(type="integer")
     */
    private $pos1;

    /**
     * @ORM\Column(type="integer")
     */
    private $pos2;

    /**
     * @ORM\Column(type="integer")
     */
    private $pos3;

    /**
     * @ORM\Column(type="integer")
     */
    private $pos4;

    /**
     * @ORM\Column(type="integer")
     */
    private $pos5;

    /**
     * @ORM\Column(type="integer")
     */
    private $pos6;

    /**
     * @ORM\Column(type="integer")
     */
    private $pos7;

    /**
     * @ORM\Column(type="integer")
     */
    private $pos8;

    /**
     * @ORM\Column(type="integer")
     */
    private $pos9;

    /**
     * @ORM\Column(type="integer")
     */
    private $ganador;

    public function getId()
    {
        return $this->id;
    }

    public function getJugador(): ?int
    {
        return $this->jugador;
    }

    public function setJugador(int $jugador): self
    {
        $this->jugador = $jugador;

        return $this;
    }

    public function getTurnos(): ?int
    {
        return $this->turnos;
    }

    public function setTurnos(int $turnos): self
    {
        $this->turnos = $turnos;

        return $this;
    }

    public function getEstado(): ?string
    {
        return $this->estado;
    }

    public function setEstado(?string $estado): self
    {
        $this->estado = $estado;

        return $this;
    }

    

    public function getPos1(): ?int
    {
        return $this->pos1;
    }

    public function setPos1(int $pos1): self
    {
        $this->pos1 = $pos1;

        return $this;
    }

    public function getPos2(): ?int
    {
        return $this->pos2;
    }

    public function setPos2(int $pos2): self
    {
        $this->pos2 = $pos2;

        return $this;
    }

    public function getPos3(): ?int
    {
        return $this->pos3;
    }

    public function setPos3(int $pos3): self
    {
        $this->pos3 = $pos3;

        return $this;
    }

    public function getPos4(): ?int
    {
        return $this->pos4;
    }

    public function setPos4(int $pos4): self
    {
        $this->pos4 = $pos4;

        return $this;
    }

    public function getPos5(): ?int
    {
        return $this->pos5;
    }

    public function setPos5(int $pos5): self
    {
        $this->pos5 = $pos5;

        return $this;
    }

    public function getPos6(): ?int
    {
        return $this->pos6;
    }

    public function setPos6(int $pos6): self
    {
        $this->pos6 = $pos6;

        return $this;
    }

    public function getPos7(): ?int
    {
        return $this->pos7;
    }

    public function setPos7(int $pos7): self
    {
        $this->pos7 = $pos7;

        return $this;
    }

    public function getPos8(): ?int
    {
        return $this->pos8;
    }

    public function setPos8(int $pos8): self
    {
        $this->pos8 = $pos8;

        return $this;
    }

    public function getPos9(): ?int
    {
        return $this->pos9;
    }

    public function setPos9(int $pos9): self
    {
        $this->pos9 = $pos9;

        return $this;
    }

    public function getGanador(): ?int
    {
        return $this->ganador;
    }

    public function setGanador(int $ganador): self
    {
        $this->ganador = $ganador;

        return $this;
    }
}
