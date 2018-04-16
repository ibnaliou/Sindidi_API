<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Bien.
 *
 * @ORM\Table(name="bien", indexes={@ORM\Index(name="IDX_45EDC386924DD2B5", columns={"localite_id"}), @ORM\Index(name="IDX_45EDC386C54C8C93", columns={"type_id"}), @ORM\Index(name="IDX_45EDC386BD95B80F", columns={"bien_id"}), @ORM\Index(name="IDX_45EDC38676C50E4A", columns={"proprietaire_id"})})
 * @ORM\Entity
 */

 /**
  * @ORM\Entity(repositoryClass="App\Repository\BienRepository")
  */
class Bien
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
     * @ORM\Column(name="nomBien", type="string", length=255, nullable=false)
     */
    private $nombien;

    /**
     * @var int
     *
     * @ORM\Column(name="etat", type="integer", nullable=false)
     */
    private $etat;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", length=255, nullable=false)
     */
    private $description;

    /**
     * @var int
     *
     * @ORM\Column(name="prixLocation", type="integer", nullable=false)
     */
    private $prixlocation;

    /**
     * @var \Proprietaire
     *
     * @ORM\ManyToOne(targetEntity="Proprietaire")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="proprietaire_id", referencedColumnName="id")
     * })
     */
    private $proprietaire;

    /**
     * @var \Localite
     *
     * @ORM\ManyToOne(targetEntity="Localite")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="localite_id", referencedColumnName="id")
     * })
     */
    private $localite;

    /**
     * @var \Bien
     *
     * @ORM\ManyToOne(targetEntity="Bien")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="bien_id", referencedColumnName="id")
     * })
     */
    private $bien;

    /**
     * @var \TypeBien
     *
     * @ORM\ManyToOne(targetEntity="TypeBien")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="type_id", referencedColumnName="id")
     * })
     */
    private $type;

    /**
     * @ORM\OneToMany(targetEntity="Image", mappedBy="bien")
     */
    private $images;

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
     * Get the value of nombien.
     *
     * @return string
     */
    public function getNombien()
    {
        return $this->nombien;
    }

    /**
     * Set the value of nombien.
     *
     * @param string $nombien
     *
     * @return self
     */
    public function setNombien(string $nombien)
    {
        $this->nombien = $nombien;

        return $this;
    }

    /**
     * Get the value of etat.
     *
     * @return int
     */
    public function getEtat()
    {
        return $this->etat;
    }

    /**
     * Set the value of etat.
     *
     * @param int $etat
     *
     * @return self
     */
    public function setEtat(int $etat)
    {
        $this->etat = $etat;

        return $this;
    }

    /**
     * Get the value of description.
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set the value of description.
     *
     * @param string $description
     *
     * @return self
     */
    public function setDescription(string $description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get the value of prixlocation.
     *
     * @return int
     */
    public function getPrixlocation()
    {
        return $this->prixlocation;
    }

    /**
     * Set the value of prixlocation.
     *
     * @param int $prixlocation
     *
     * @return self
     */
    public function setPrixlocation(int $prixlocation)
    {
        $this->prixlocation = $prixlocation;

        return $this;
    }

    /**
     * Get the value of localite.
     *
     * @return \Localite
     */
    public function getLocalite()
    {
        return $this->localite;
    }

    /**
     * Set the value of localite.
     *
     * @param \Localite $localite
     *
     * @return self
     */
    public function setLocalite(\Localite $localite)
    {
        $this->localite = $localite;

        return $this;
    }

    /**
     * Get the value of images.
     */
    public function getImages()
    {
        return $this->images;
    }

    /**
     * Set the value of images.
     *
     * @return self
     */
    public function setImages($images)
    {
        $this->images = $images;

        return $this;
    }
}
