<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\Mails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use App\Http\Controllers\Api\PermissionsController;
use App\Http\Requests\Api\PermissionRequest;
use App\Http\Requests\Api\UserRequest;
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
    /*
    public function sendAvisos(UserRequest $request){
        $correos = $request->input("emailuser");
        $details = "hola mundo";
        Mail::to("1abelpacheco9@gmail.com")->send(new Mails($details));
        return "correo enviado";
    }
    */
    /*
    public function sendAvisos(UserRequest $request)
    {
        // Obtener los correos del request
        $correos = $request->input("emailuser");

        // Verificar si $correos es un array
        if (!is_array($correos) || empty($correos)) {
            return response()->json(["message" => "No se proporcionaron correos validos."], 400);
        }

        // Detalles del correo
        $details = [
            'title' => "Aviso importante",
            'body' => "Este es un aviso para todos los destinatarios."
        ];

        // Enviar el correo a cada dirección
        try {
            foreach ($correos as $correo) {
                Mail::to($correo)->send(new Mails($details));
            }
            return response()->json(["message" => "Correos enviados exitosamente."]);
        } catch (\Exception $e) {
            Log::error('Error al enviar correos: ' . $e->getMessage());
            return response()->json(["message" => "Error al enviar los correos."], 500);
        }
    }
    */
    public function sendAvisos(UserRequest $request)
    {
        // Correos de prueba
        $correos = [
            "202000212@est.umss.edu",
            "1abelpacheco9@gmail.com",
        ];

        // Detalles del correo
        $details = [
            'title' => "Aviso importante",
            'body' => "Este es un aviso para todos los destinatarios."
        ];

        // Enviar el correo a cada dirección
        try {
            foreach ($correos as $correo) {
                Mail::to($correo)->send(new Mails($details));
            }
            return response()->json(["message" => "Correos enviados exitosamente."]);
        } catch (\Exception $e) {
            Log::error('Error al enviar correos: ' . $e->getMessage());
            return response()->json(["message" => "Error al enviar los correos."], 500);
        }
    }
}