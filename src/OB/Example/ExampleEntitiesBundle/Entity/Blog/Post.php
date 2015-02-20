<?php

namespace OB\Example\ExampleEntitiesBundle\Entity\Blog;

use Doctrine\ORM\Mapping as ORM;

/**
 * Post
 *
 * A Doctrine2 mapped blog post.
 *
 * @ORM\Table()
 * @ORM\Entity()
 */
class Post
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
     * @ORM\Column(name="content", type="text")
     */
    private $content;

    /**
     * @var boolean
     *
     * @ORM\Column(name="isActive", type="boolean", options={ "default": false })
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
     * @ORM\ManyToOne(
     *     targetEntity="OB\Example\ExampleEntitiesBundle\Entity\User\BlogUser",
     *     inversedBy="comments"
     * )
     * @ORM\JoinColumn(
     *     name="post",
     *     referencedColumnName="id",
     *     onDelete="CASCADE"
     * )
     */
    private $user;
}
