<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use App\Entity\Program;
use App\Entity\Season;
use App\Entity\Episode;
use App\Form\ProgramType;
use App\Service\Slugify;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use App\Form\CommentType;
use App\Entity\Comment;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

/**
 * @Route("/comments", name="comment_")
 */
class CommentController extends AbstractController
{

    /**
     * @Route("/{id}", name="delete", methods={"GET"})
     */
    public function delete($id, Request $request)
    {
        $comment = $this->getDoctrine()
            ->getRepository(Comment::class)
            ->findOneBy(['id' => $id]);

        $episodeSlug = $comment->getEpisode()->getSlug();
        $seasonId = $comment->getEpisode()->getSeason()->getId();
        $programSlug = $comment->getEpisode()->getSeason()->getProgram()->getSlug();

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->remove($comment);
        $entityManager->flush();

        return $this->redirectToRoute('program_episode_show', [
            'slug' => $programSlug,
            'seasonId' => $seasonId,
            'episodeSlug' => $episodeSlug,
        ]);
    }
}
