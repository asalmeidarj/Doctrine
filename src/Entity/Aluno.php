<?php

namespace Asalmeidarj\Doctrine\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="Alunos")
 */
class Aluno
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column (type="integer")
     */
    private $id;
    /**
     * @ORM\Column (type="string")
     */
    private $nome;
    /**
     * @ORM\OneToMany(targetEntity="Telefone", mappedBy="Aluno")
     */
    private $telefones;

    public function __construct()
    {
        $this->telefones = new ArrayCollection();
    }

    
    public function getId(): int
    {
        return $this->id;
    }

    public function getNome(): string
    {
        return $this->nome;
    }

    public function setNome($nome): self
    {
        $this->nome = $nome;

        return $this;
    }

    public function addTelefone(Telefone $telefone): self
    {
        $this->telefones->add($telefone);
        $telefone->setAluno($this);
        return $this;
    }

    public function getTelefones(): Collection
    {
        return $this->telefones;
    }
}