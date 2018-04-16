<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Localite.
 *
 * @ORM\Table(name="localite")
 * @ORM\Entity
 */
class Localite
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="libelle", type="string", length=255, nullable=false)
     */
    private $libelle;

    /**
     * Get the value of id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id.
     *
     * @param int $id
     *
     * @return self
     */
    public function setId(int $id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of libelle.
     *
     * @return string
     */
    public function getLibelle()
    {
        return $this->libelle;
    }

    /**
     * Set the value of libelle.
     *
     * @param string $libelle
     *
     * @return self
     */
    public function setLibelle(string $libelle)
    {
        $this->libelle = $libelle;

        return $this;
    }
}
