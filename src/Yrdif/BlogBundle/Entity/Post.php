<?php

namespace Yrdif\BlogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Post
 *
 * @package Yrdif\BlogBundle\Entity
 */
class Post
{

    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $title;

    /**
     * @var string
     */
    private $author;

    /**
     * @var string
     */
    private $content;

    /**
     * @var string
     */
    private $image;

    /**
     * @var string
     */
    private $tags;

    /**
     * @var string
     */
    private $comments;

    /**
     * @var \DateTime
     */
    private $createdAt;

    /**
     * @var \DateTime
     */
    private $updatedAt;

    /**
     * Get id
     *
     * @return integer|null
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set title
     *
     * @param string|null $title
     *
     * @return $this
     */
    public function setTitle($title)
    {
        $title = (is_null($title))? null: (string)$title;
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string|null
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set author
     *
     * @param string|null $author
     *
     * @return $this
     */
    public function setAuthor($author)
    {
        $author = (is_null($author))? null: (string)$author;
        $this->author = $author;

        return $this;
    }

    /**
     * Get author
     *
     * @return string|null
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * Set content
     *
     * @param string|null $content
     *
     * @return $this
     */
    public function setContent($content)
    {
        $content = (is_null($content))? null: (string)$content;
        $this->content = $content;

        return $this;
    }

    /**
     * Get content
     *
     * @return string|null
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set image
     *
     * @param string|null $image
     *
     * @return $this
     */
    public function setImage($image)
    {
        $image = (is_null($image))? null: (string)$image;
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return string|null
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set tags
     *
     * @param string|null $tags
     *
     * @return $this
     */
    public function setTags($tags)
    {
        $tags = (is_null($tags))? null: (string)$tags;
        $this->tags = $tags;

        return $this;
    }

    /**
     * Get tags
     *
     * @return string|null
     */
    public function getTags()
    {
        return $this->tags;
    }

    /**
     * Set comments
     *
     * @param string|null $comments
     *
     * @return $this
     */
    public function setComments($comments)
    {
        $comments = (is_null($comments))? null: (string)$comments;
        $this->comments = $comments;

        return $this;
    }

    /**
     * Get comments
     *
     * @return string|null
     */
    public function getComments()
    {
        return $this->comments;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $date
     *
     * @return $this
     */
    public function setCreatedAt(\DateTime $date = null)
    {
        $this->createdAt = $date;

        return $this;
    }

    /**
     * Set createdAt
     *
     * @return $this
     */
    public function setCreatedAtValue()
    {
        $this->createdAt = new \DateTime();

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime|null
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set updatedAt
     *
     * @param \DateTime $date
     *
     * @return $this
     */
    public function setUpdatedAt(\DateTime $date = null)
    {
        $this->updatedAt = $date;

        return $this;
    }

    /**
     * Set updatedAt
     *
     * @return $this
     */
    public function setUpdatedAtValue()
    {
        $this->updatedAt = new \DateTime();

        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime|null
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }
}
