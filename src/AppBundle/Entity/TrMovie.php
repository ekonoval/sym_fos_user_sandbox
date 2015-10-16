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
    private $movieid;

    /**
     * @var string
     *
     * @ORM\Column(name="movieName", type="string", length=222, nullable=true)
     */
    private $moviename;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="createDate", type="date", nullable=true)
     */
    private $createdate = '0000-00-00';


}
