<?php
// app/Http/Controllers/EventRegistrationController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class EventRegistrationController extends Controller
{
    public function register(Event $event)
    {
        $user = Auth::user();
        $now = Carbon::now();

        if ($now->diffInHours($event->date_event) < 24) {
            return redirect()->route('events.show', $event)->with('error', 'Vous ne pouvez pas vous inscrire à un événement moins de 24 heures avant.');
        }

        if ($event->places_available <= 0) {
            return redirect()->route('events.show', $event)->with('error', 'Il n\'y a plus de places disponibles.');
        }

        $event->users()->attach($user->id);
        $event->decrement('places_available');

        return redirect()->route('events.show', $event)->with('success', 'Vous êtes inscrit à cet événement.');
    }

    public function unregister(Event $event)
    {
        $user = Auth::user();
        $now = Carbon::now();

        if ($now->diffInHours($event->date_event) < 24) {
            return redirect()->route('events.show', $event)->with('error', 'Vous ne pouvez pas vous désinscrire d\'un événement moins de 24 heures avant.');
        }

        $event->users()->detach($user->id);
        $event->increment('places_available');

        return redirect()->route('events.show', $event)->with('success', 'Vous êtes désinscrit de cet événement.');
    }
}

