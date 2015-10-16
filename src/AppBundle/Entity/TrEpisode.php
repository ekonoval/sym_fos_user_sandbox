<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TrEpisodes
 *
 * @ORM\Table(name="tr_episodes", indexes={@ORM\Index(name="epNUm", columns={"episodeNum"}), @ORM\Index(name="epSeas", columns={"seasonNum"}), @ORM\Index(name="epMOvieID", columns={"movieID"})})
 * @ORM\Entity
 */
class TrEpisode
{
    /**
     * @var integer
     *
     * @ORM\Column(name="episodeID", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $episodeId;

    /**
     * @var integer
     *
     * @ORM\Column(name="seasonNum", type="integer", nullable=false)
     */
    private $seasonNum = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="episodeNum", type="integer", nullable=false)
     */
    private $episodeNum = '0';

    /**
     * @var \TrMovies
     *
     * @ORM\ManyToOne(targetEntity="TrMovies")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="movieID", referencedColumnName="movieID")
     * })
     */
    private $movieId;



    /**
     * Get episodeId
     *
     * @return integer 
     */
    public function getEpisodeId()
    {
        return $this->episodeId;
    }

    /**
     * Set seasonNum
     *
     * @param integer $seasonNum
     * @return TrEpisode
     */
    public function setSeasonNum($seasonNum)
    {
        $this->seasonNum = $seasonNum;

        return $this;
    }

    /**
     * Get seasonNum
     *
     * @return integer 
     */
    public function getSeasonNum()
    {
        return $this->seasonNum;
    }

    /**
     * Set episodeNum
     *
     * @param integer $episodeNum
     * @return TrEpisode
     */
    public function setEpisodeNum($episodeNum)
    {
        $this->episodeNum = $episodeNum;

        return $this;
    }

    /**
     * Get episodeNum
     *
     * @return integer 
     */
    public function getEpisodeNum()
    {
        return $this->episodeNum;
    }

    /**
     * Set movieId
     *
     * @param \AppBundle\Entity\TrMovies $movieId
     * @return TrEpisode
     */
    public function setMovieId(\AppBundle\Entity\TrMovies $movieId = null)
    {
        $this->movieId = $movieId;

        return $this;
    }

    /**
     * Get movieId
     *
     * @return \AppBundle\Entity\TrMovies 
     */
    public function getMovieId()
    {
        return $this->movieId;
    }
}
