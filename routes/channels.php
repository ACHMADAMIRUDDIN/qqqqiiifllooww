<?php

use Illuminate\Support\Facades\Broadcast;

/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you can register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can access the given channel.
|
*/

Broadcast::channel('App.Models.User.*', function ($user, $id) {
    return (int) $user->id === (int) $id;
});

// Private channel untuk chat antar user (hanya sender dan receiver yang bisa subscribe)
Broadcast::channel('chat.{userId}', function ($user, $userId) {
    // Hanya user yang login dengan id sesuai userId yang boleh subscribe ke channel ini
    return (int) $user->id === (int) $userId;
});