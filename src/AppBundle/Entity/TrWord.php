<?php

namespace AppBundle\Entity;

use AppBundle\Entity\TrEpisode;
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
    private $isHard = false;

    /**
     * @var boolean
     *
     * @ORM\Column(name="superHard", type="boolean", nullable=true)
     */
    private $superHard = false;

    /**
     * @var \TrEpisode
     *
     * @ORM\ManyToOne(targetEntity="TrEpisode", inversedBy="words")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="episodeID", referencedColumnName="episodeID")
     * })
     */
    private $episode;

    /**
     * Get wordId
     *
     * @return integer 
     */
    public function getWordId()
    {
        return $this->wordId;
    }

    /**
     * Set wordEn
     *
     * @param string $wordEn
     * @return TrWord
     */
    public function setWordEn($wordEn)
    {
        $this->wordEn = $wordEn;

        return $this;
    }

    /**
     * Get wordEn
     *
     * @return string 
     */
    public function getWordEn()
    {
        return $this->wordEn;
    }

    /**
     * Set wordRu
     *
     * @param string $wordRu
     * @return TrWord
     */
    public function setWordRu($wordRu)
    {
        $this->wordRu = $wordRu;

        return $this;
    }

    /**
     * Get wordRu
     *
     * @return string 
     */
    public function getWordRu()
    {
        return $this->wordRu;
    }

    /**
     * Set isHard
     *
     * @param boolean $isHard
     * @return TrWord
     */
    public function setIsHard($isHard)
    {
        $this->isHard = $isHard;

        return $this;
    }

    /**
     * Get isHard
     *
     * @return boolean 
     */
    public function getIsHard()
    {
        return $this->isHard;
    }

    /**
     * Set superHard
     *
     * @param boolean $superHard
     * @return TrWord
     */
    public function setSuperHard($superHard)
    {
        $this->superHard = $superHard;

        return $this;
    }

    /**
     * Get superHard
     *
     * @return boolean 
     */
    public function getSuperHard()
    {
        return $this->superHard;
    }

    /**
     * Set episodeId
     *
     * @param TrEpisode $episode
     * @return TrWord
     */
    public function setEpisode(TrEpisode $episode = null)
    {
        $this->episode = $episode;

        return $this;
    }

    /**
     * Get episodeId
     *
     * @return TrEpisode
     */
    public function getEpisode()
    {
        return $this->episode;
    }
}
