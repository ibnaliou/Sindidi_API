<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ProprietaireBien.
 *
 * @ORM\Table(name="proprietaire_bien", indexes={@ORM\Index(name="IDX_C1AE295D76C50E4A", columns={"proprietaire_id"}), @ORM\Index(name="IDX_C1AE295DBD95B80F", columns={"bien_id"})})
 * @ORM\Entity
 */
class ProprietaireBien
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
     * @ORM\Column(name="adress", type="string", length=255, nullable=false)
     */
    private $adress;

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
     * @var \Bien
     *
     * @ORM\ManyToOne(targetEntity="Bien")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="bien_id", referencedColumnName="id")
     * })
     */
    private $bien;
}
