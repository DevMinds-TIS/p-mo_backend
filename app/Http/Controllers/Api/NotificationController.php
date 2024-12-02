<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\NotificationRequest;
use App\Http\Resources\Api\NotificationResource;
use App\Models\Notification;

class NotificationController extends Controller
{
    public function index()
    {
        return NotificationResource::collection(Notification::all());
    }

    public function store(NotificationRequest $request)
    {
        return new NotificationResource(Notification::create($request->all()));
    }

    public function show(Notification $notification)
    {
        return new NotificationResource($notification);
    }

    public function update(NotificationRequest $request, Notification $notification)
    {
        $notification->update($request->all());
        return new NotificationResource($notification);
    }

    public function destroy(Notification $notification)
    {
        $notification->delete();
        return response()->json(['message' => 'Notificación eliminada exitosamente']);
    }
}
