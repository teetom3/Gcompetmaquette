<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\User;


class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events=Event::all();
        return view('events.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('events.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required||string||max:255',
            'category'=> 'required||string||max:255',
            'date_event'=>'required||date',
            'places_available'=>'required||integer',
            'description'=>'required|string',
            'image'=>'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:10000'
        ]);

        $imagePath=null;
        if($request->file('image')) {
            $imagePath = $request->file('image')->store('image','public');
        }

        Event::create([
            'name' => $request->name,
            'category'=>$request->category,
            'date_event'=>$request->date_event,
            'places_available'=>$request->places_available,
            'description' => $request->description,
            'image'=> $imagePath,
            'is_active' => $request->has('is_active')
        ]);
        return redirect()->route('events.index')->with('success', 'Evenement créé avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        $events=Event::all();
        return view('event.index', compact('events'));
    }

    public function showEvents(Event $event)
    {
        $events=Event::where('is_active',1)
    ->orderBy('date_event', 'asc')
    ->get();
        return view('welcome', compact('events'));
    }


    public function showOneEvent($id)
    {
        $event=Event::with('users')->findOrFail($id);
        return view('events.show', compact('event'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event)
    {
        return view('events.edit', compact('event'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Event $event)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'date_event' => 'required|date',
            'places_available' => 'required|integer',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
        $data = $request->all();
    
        if ($request->file('image')) {
            // Supprimer l'ancienne image si elle existe
            if ($event->image) {
                Storage::disk('public')->delete($event->image);
            }
            $data['image'] = $request->file('image')->store('images', 'public');
        }
    
        $event->update($data);
    
        return redirect()->route('events.index')->with('success', 'Événement modifié avec succès.');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        $event->delete();

        return redirect()->route('events.index')->with('success', 'Événement supprimé avec succès.');
    }



    public function adminRegisterForm(Event $event)
{
    $users = User::whereDoesntHave('events', function ($query) use ($event) {
        $query->where('events.id', $event->id);
    })->get();

    return view('events.admin_register', compact('event', 'users'));
}

public function adminRegisterPlayers(Request $request, Event $event)
{
    $user = User::findOrFail($request->input('user_id'));
    $event->users()->attach($user->id);

    $event->decrement('places_available');

    return redirect()->route('events.admin.register', $event->id)->with('success', 'Joueur inscrit avec succès.');
}

public function adminUnregisterPlayer(Event $event, User $user)
{
    $event->users()->detach($user->id);

    $event->increment('places_available');

    return redirect()->route('events.admin.register', $event->id)->with('success', 'Joueur désinscrit avec succès.');
}

public function downloadRegistrations(Event $event)
{
    $users = $event->users()->select('license_number')->get();

    $content = "";
    foreach ($users as $user) {
        $content .= $user->license_number . "\n";
    }

    $fileName = "event_{$event->id}_registrations.txt";
    Storage::disk('local')->put($fileName, $content);

    return response()->download(storage_path("app/{$fileName}"))->deleteFileAfterSend(true);
}


}
