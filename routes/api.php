<?php
use Illuminate\Support\Facades\Route;
use App\Models\User;

Route::get('/events', function () {
    $users = User::all();
    $events = $users->map(function($user) {
        return [
            'title' => $user->name,
            'start' => $user->created_at->toDateString(),
        ];
    });
    return response()->json($events);
});
