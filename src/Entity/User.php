<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\UserRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 * @ApiResource(
 *      itemOperations={
 *          "get"={
 *              "normalization_context"={
 *                  "groups"={"user_details_read"}
 *              }
 *          },
 *          "delete" 
 *      },
 *      collectionOperations={
 *          "get"={
 *              "normalization_context"={
 *                  "groups"={"user_read"}
 *              }
 *          },
 *          "post"       
 *      }
 * )
 */
class User
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"user_read","user_details_read"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"user_read","user_details_read"})
     */
    private $fisrtname;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"user_read","user_details_read"})
     */
    private $lastname;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"user_read","user_details_read"})
     */
    private $mail;

    /**
     * @ORM\ManyToOne(targetEntity=Client::class, inversedBy="users")
     * @Groups({"user_read","user_details_read"})
     */
    private UserInterface $client;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"customer_details_read"})
     */
    private $city;

    /**
     * @ORM\Column(type="integer")
     * @Groups({"customer_details_read"})
     */
    private $phone;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"customer_details_read"})
     */
    private $address;

    /**
     * @ORM\Column(type="integer")
     * @Groups({"customer_details_read"})
     */
    private $zipcode;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFisrtname(): ?string
    {
        return $this->fisrtname;
    }

    public function setFisrtname(string $fisrtname): self
    {
        $this->fisrtname = $fisrtname;

        return $this;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): self
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getMail(): ?string
    {
        return $this->mail;
    }

    public function setMail(string $mail): self
    {
        $this->mail = $mail;

        return $this;
    }

    public function getClient(): UserInterface
    {
        return $this->client;
    }

    public function setClient(UserInterface $client): self
    {
        $this->client = $client;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(string $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function getPhone(): ?int
    {
        return $this->phone;
    }

    public function setPhone(int $phone): self
    {
        $this->phone = $phone;

        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(string $address): self
    {
        $this->address = $address;

        return $this;
    }

    public function getZipcode(): ?int
    {
        return $this->zipcode;
    }

    public function setZipcode(int $zipcode): self
    {
        $this->zipcode = $zipcode;

        return $this;
    }
}
