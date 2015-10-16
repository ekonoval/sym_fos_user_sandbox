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


}
