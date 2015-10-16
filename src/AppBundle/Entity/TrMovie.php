<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TrMovies
 *
 * @ORM\Table(name="tr_movies")
 * @ORM\Entity
 */
class TrMovie
{
    /**
     * @var integer
     *
     * @ORM\Column(name="movieID", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $movieId;

    /**
     * @var string
     *
     * @ORM\Column(name="movieName", type="string", length=222, nullable=true)
     */
    private $movieName;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="createDate", type="date", nullable=true)
     */
    private $createDate = '0000-00-00';



    /**
     * Get movieId
     *
     * @return integer 
     */
    public function getMovieId()
    {
        return $this->movieId;
    }

    /**
     * Set movieName
     *
     * @param string $movieName
     * @return TrMovie
     */
    public function setMovieName($movieName)
    {
        $this->movieName = $movieName;

        return $this;
    }

    /**
     * Get movieName
     *
     * @return string 
     */
    public function getMovieName()
    {
        return $this->movieName;
    }

    /**
     * Set createDate
     *
     * @param \DateTime $createDate
     * @return TrMovie
     */
    public function setCreateDate($createDate)
    {
        $this->createDate = $createDate;

        return $this;
    }

    /**
     * Get createDate
     *
     * @return \DateTime 
     */
    public function getCreateDate()
    {
        return $this->createDate;
    }
}
