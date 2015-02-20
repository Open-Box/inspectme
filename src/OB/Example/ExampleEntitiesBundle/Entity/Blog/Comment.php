<?php

namespace OB\Example\ExampleEntitiesBundle\Entity\Blog;

use Doctrine\ORM\Mapping as ORM;

/**
 * Comment
 *
 * @ORM\Table()
 * @ORM\Entity()
 */
class Comment
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
     * @ORM\ManyToOne(
     *     targetEntity="OB\Example\ExampleEntitiesBundle\Entity\Blog\Post",
     *     inversedBy="comments"
     * )
     * @ORM\JoinColumn(
     *     name="post",
     *     referencedColumnName="id",
     *     onDelete="CASCADE"
     * )
     */
    private $post;
    
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
