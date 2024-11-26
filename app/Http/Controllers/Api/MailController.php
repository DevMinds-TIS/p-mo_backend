<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\Mails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use App\Http\Controllers\Api\PermissionsController;
use App\Http\Requests\Api\PermissionRequest;
use Illuminate\Support\Facades\Log;

class MailController extends Controller
{
    public function sendEmail(Request $request)
    {
        // Obtener parámetros del request 
        $recipientEmail = $request->input('email');
        $recipientName = $request->input('name');

        // Generar un valor alfanumérico aleatorio
        $randomNum = Str::random(10);

        // Detalles del correo
        $details = [
            'title' => "Hola $recipientName, este es tu código secreto",
            'body' => $randomNum
        ];

        // Enviar el correo
        Mail::to($recipientEmail)->send(new Mails($details));

        // Guardar el valor randomico en el campo teacherpermission
        try {
            // Crear una instancia de PermissionRequest
            $data = [
                'teacherpermission' => $randomNum
            ];
            $permissionRequest = new PermissionRequest();
            $permissionRequest->merge($data); // Usar merge para agregar los datos al request

            $permissionController = new PermissionsController();
            $permissionController->store($permissionRequest);
            Log::info('Permiso guardado correctamente: ' . $randomNum);
        } catch (\Exception $e) {
            Log::error('Error al guardar el permiso: ' . $e->getMessage());
        }

        return response()->json(["message" => "Correo enviado a $recipientEmail"]);
    }
}