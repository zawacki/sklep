<?php

namespace Shop\MovieBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Purchase
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Purchase
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;

    /**
     * Film - powiązanie
     * @ORM\ManyToOne(targetEntity="Movie", inversedBy="purchases")
     * @ORM\JoinColumn(name="movie_id", referencedColumnName="id")
     **/
    private $movie;

    /**
     * Uzytkownik - powiązanie
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     **/
    private $user;
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="email", type="string", length=255)
     */
    private $email;
    /**
     * Get id
     *
     * @return integer 
     */

    public function __construct()
    {
        // ustawianie daty na domyślny czas podczas tworzenia
        $this->date = new \DateTime();
    }
    public function getId()
    {
        return $this->id;
    }
    public function getEmail()
    {
        return $this->email;
    }
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }
    /**
     * Set date
     *
     * @param \DateTime $date
     * @return Purchase
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime 
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set movie
     *
     * @param \Shop\MovieBundle\Entity\Movie $movie
     * @return Purchase
     */
    public function setMovie(\Shop\MovieBundle\Entity\Movie $movie = null)
    {
        $this->movie = $movie;

        return $this;
    }

    /**
     * Get movie
     *
     * @return \Shop\MovieBundle\Entity\Movie 
     */
    public function getMovie()
    {
        return $this->movie;
    }

    /**
     * Set user
     *
     * @param \Shop\MovieBundle\Entity\User $user
     * @return Purchase
     */
    public function setUser(\Shop\MovieBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \Shop\MovieBundle\Entity\User 
     */
    public function getUser()
    {
        return $this->user;
    }
}
