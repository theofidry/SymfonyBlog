<?php

namespace Yrdif\BlogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class ContactRequest
 *
 * @package Yrdif\BlogBundle\Entity
 */
//TODO: refactor this string check-cast
class ContactRequest
{

    use EntityHydrationTrait;

    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $email;

    /**
     * @var string
     */
    private $subject;

    /**
     * @var string
     */
    private $content;


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
     * Set name
     *
     * @param string|null $name
     *
     * @return $this
     */
    public function setName($name)
    {
        $name = (is_null($name))? null: (string)$name;
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string|null
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set email
     *
     * @param string|null $email
     *
     * @return $this
     */
    public function setEmail($email)
    {
        $email = (is_null($email))? null: (string)$email;
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string|null
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set subject
     *
     * @param string|null $subject
     *
     * @return $this
     */
    public function setSubject($subject)
    {
        $subject = (is_null($subject))? null: (string)$subject;
        $this->subject = $subject;

        return $this;
    }

    /**
     * Get subject
     *
     * @return string |null
     */
    public function getSubject()
    {
        return $this->subject;
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
}
