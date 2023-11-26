<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificacionController extends Controller
{
    public function __invoke(Request $request)
    {
        //
        //cargamos las notificaciones que tiene el usuario
        $notificaciones = auth()->user()->unreadNotifications;

        //limpiar notificaciones
        auth()->user()->unreadNotifications->markAsRead();

        return view('notificaciones.index',[
            'notificaciones' => $notificaciones
        ]);
    }
}
