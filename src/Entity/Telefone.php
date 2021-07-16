<?php

namespace Asalmeidarj\Doctrine\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="Telefones")
 */
class Telefone
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * 
     */
    private $id;
    /**
     * @ORM\Column (type="string")
     */
    private $number;
    /**
     * @ORM\ManyToOne(targetEntity="Aluno")
     */
    private Aluno $aluno;

    
    public function getId(): int
    {
        return $this->id;
    }

    public function getNumber(): string
    {
        return $this->number;
    }

    public function setNumber(string $number): self
    {
        $this->number = $number;
        return $this;
    }

    public function getAluno(): Aluno
    {
        return $this->aluno;
    }

    public function setAluno(Aluno $aluno): self
    {
        $this->aluno = $aluno;
        return $this;
    }
}