<?php

namespace OB\Example\ExampleEntitiesBundle\Entity\User;

use Doctrine\ORM\Mapping as ORM;

/**
 * Post
 *
 * A Doctrine2 mapped blog post.
 *
 * @ORM\Table()
 * @ORM\Entity()
 */
class BlogUser
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
     * @var string
     *
     * @ORM\Column(name="username", type="string", length=64)
     */
    private $username;

    /**
     * @var string
     *
     * @ORM\Column(name="longName", type="string", length=128)
     */
    private $longName;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=128)
     */
    private $email;

    /**
     * @var boolean
     *
     * @ORM\Column(name="isActive", type="boolean", options={ "default": true })
     */
    private $isActive;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="createdAt", type="date")
     */
    private $expiresAt;

    /**
     * @ORM\OneToMany(
     *     targetEntity="OB\Example\ExampleEntitiesBundle\Entity\Blog\Comment",
     *     mappedBy="post"
     * )
     */
    private $comments;

    /**
     * @ORM\OneToMany(
     *     targetEntity="OB\Example\ExampleEntitiesBundle\Entity\Blog\Post",
     *     mappedBy="user"
     * )
     */
    private $posts;
}
