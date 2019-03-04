<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\WalletRepository")
 */
class Wallet
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\cryptos", mappedBy="wallet")
     */
    private $idCryptos;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\users", inversedBy="wallets")
     */
    private $idUsers;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $quantite;

    public function __construct()
    {
        $this->idCryptos = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection|cryptos[]
     */
    public function getIdCryptos(): Collection
    {
        return $this->idCryptos;
    }

    public function addIdCrypto(cryptos $idCrypto): self
    {
        if (!$this->idCryptos->contains($idCrypto)) {
            $this->idCryptos[] = $idCrypto;
            $idCrypto->setWallet($this);
        }

        return $this;
    }

    public function removeIdCrypto(cryptos $idCrypto): self
    {
        if ($this->idCryptos->contains($idCrypto)) {
            $this->idCryptos->removeElement($idCrypto);
            // set the owning side to null (unless already changed)
            if ($idCrypto->getWallet() === $this) {
                $idCrypto->setWallet(null);
            }
        }

        return $this;
    }

    public function getIdUsers(): ?users
    {
        return $this->idUsers;
    }

    public function setIdUsers(?users $idUsers): self
    {
        $this->idUsers = $idUsers;

        return $this;
    }

    public function getQuantite(): ?float
    {
        return $this->quantite;
    }

    public function setQuantite(?float $quantite): self
    {
        $this->quantite = $quantite;

        return $this;
    }
}
