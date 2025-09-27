<?php

namespace App\Http\Controllers;

abstract class Controller
{
    //
    public function getNotifications()
    {
        // Exemple : notifications statiques
        $notifications = [
            [
                'title' => 'Nouvelle notification',
                'message' => 'Ceci est un message envoyé depuis Laravel'
            ],
            [
                'title' => 'Alerte',
                'message' => 'Une autre notification importante'
            ]
        ];

        return response()->json($notifications);
    }
}
