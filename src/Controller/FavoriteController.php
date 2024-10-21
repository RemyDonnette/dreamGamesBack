<?php

namespace App\Controller;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;

class FavoriteController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }
    
    /**
 * @Route("/api/favorites", name="get_favorites", methods={"GET"})
 */
    public function getFavorites(): JsonResponse
    {
        $user = $this->getUser(); // Assurez-vous que l'utilisateur est authentifié
        if (!$user instanceof User) {
            return new JsonResponse(['error' => 'User not found'], Response::HTTP_UNAUTHORIZED);
        }
        
        // Récupérer la liste des favoris
        $favorites = $user->getFavorites() ?? [];

        // Retourner la liste des favoris
        return new JsonResponse(['favorites' => $favorites]);
    }

    /**
     * @Route("/api/favorites", name="toggle_favorite", methods={"POST"})
     */
    public function toggleFavorite(Request $request): JsonResponse
    {
        $user = $this->getUser(); // Assurez-vous que l'utilisateur est authentifié
        if (!$user instanceof User) {
            return new JsonResponse(['error' => 'User not found'], Response::HTTP_UNAUTHORIZED);
        }
    
        $data = json_decode($request->getContent(), true);
        $gameId = $data['game_id'] ?? null;
    
        if (!$gameId) {
            return new JsonResponse(['error' => 'Game ID is required'], Response::HTTP_BAD_REQUEST);
        }
    
        // Get or create favorites array
        $favorites = $user->getFavorites() ?? [];
    
        // Check if the game is already in favorites
        if (in_array($gameId, $favorites)) {
            // Remove from favorites
            $favorites = array_filter($favorites, function ($id) use ($gameId) {
                return $id !== $gameId;
            });
        } else {
            // Add to favorites
            $favorites[] = $gameId;
        }
    
        // Update the user with the new favorites list
        $user->setFavorites($favorites);
        $this->entityManager->persist($user);
        $this->entityManager->flush();
    
        // Return the updated favorites list
        return new JsonResponse(['success' => true, 'favorites' => $favorites]);
    }
    
}

