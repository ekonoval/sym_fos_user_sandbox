<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TrWords
 *
 * @ORM\Table(name="tr_words", indexes={@ORM\Index(name="IDX_WORDS_EP", columns={"episodeID"}), @ORM\Index(name="IDX_WORDS_HARD", columns={"isHard"}), @ORM\Index(name="idx_words_superHard", columns={"superHard"})})
 * @ORM\Entity
 */
class TrWord
{
    /**
     * @var integer
     *
     * @ORM\Column(name="wordID", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $wordId;

    /**
     * @var string
     *
     * @ORM\Column(name="wordEN", type="string", length=255, nullable=false)
     */
    private $wordEn;

    /**
     * @var string
     *
     * @ORM\Column(name="wordRU", type="string", length=255, nullable=false)
     */
    private $wordRu;

    /**
     * @var boolean
     *
     * @ORM\Column(name="isHard", type="boolean", nullable=true)
     */
    private $isHard = '0';

    /**
     * @var boolean
     *
     * @ORM\Column(name="superHard", type="boolean", nullable=true)
     */
    private $superHard = '0';

    /**
     * @var \TrEpisodes
     *
     * @ORM\ManyToOne(targetEntity="TrEpisodes")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="episodeID", referencedColumnName="episodeID")
     * })
     */
    private $episodeId;


}
