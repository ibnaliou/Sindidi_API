<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Reservation.
 *
 * @ORM\Table(name="reservation", indexes={@ORM\Index(name="IDX_42C8495519EB6921", columns={"client_id"}), @ORM\Index(name="IDX_42C84955BD95B80F", columns={"bien_id"})})
 * @ORM\Entity
 */
class Reservation
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
     * @var \DateTime
     *
     * @ORM\Column(name="dateReservation", type="datetime", nullable=false)
     */
    private $datereservation;

    /**
     * @var int
     *
     * @ORM\Column(name="etat", type="integer", nullable=false)
     */
    private $etat;

    /**
     * @var \Client
     *
     * @ORM\ManyToOne(targetEntity="Client")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="client_id", referencedColumnName="id")
     * })
     */
    private $client;

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
     * Get the value of datereservation.
     *
     * @return \DateTime
     */
    public function getDatereservation()
    {
        return $this->datereservation;
    }

    /**
     * Set the value of datereservation.
     *
     * @param \DateTime $datereservation
     *
     * @return self
     */
    public function setDatereservation(\DateTime $datereservation)
    {
        $this->datereservation = $datereservation;

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
     * Get the value of client.
     *
     * @return \Client
     */
    public function getClient()
    {
        return $this->client;
    }

    /**
     * Set the value of client.
     *
     * @param \Client $client
     *
     * @return self
     */
    public function setClient(\App\Entity\Client $client)
    {
        $this->client = $client;

        return $this;
    }

    /**
     * Get the value of bien.
     *
     * @return \Bien
     */
    public function getBien()
    {
        return $this->bien;
    }

    /**
     * Set the value of bien.
     *
     * @param \Bien $bien
     *
     * @return self
     */
    public function setBien(\App\Entity\Bien $bien)
    {
        $this->bien = $bien;

        return $this;
    }
}
