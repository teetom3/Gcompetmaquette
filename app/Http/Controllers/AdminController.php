<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    public function search(Request $request) {
        

        $query = $request->input('query');
        $minIndex = $request->input('minIndex', 0);
        $maxIndex = $request->input('maxIndex', 54);

        $users = User::where(function($queryBuilder) use ($query) {
                $queryBuilder->where('name', 'Like',"%{$query}%")
                ->orWhere('surname','LIKE', "%{$query}%")
                ->orWhere('email','LIKE', "%{$query}%")
                ->orWhere('golf_index','LIKE', "%{$query}%");
        })
        ->whereRaw('CAST(golf_index AS UNSIGNED) BETWEEN ? AND ?', [$minIndex, $maxIndex])
        ->get();

            return response()->json($users);
    }

    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'date_of_birth' => 'required|date',
            'email' => 'required|email|max:255',
            'license_number' => 'required|string|max:255',
            'golf_index' => 'required|string|max:255',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $data = $request->all();

        if ($request->file('avatar')) {
            // Supprimer l'ancienne avatar si elle existe
            if ($user->avatar) {
                Storage::disk('public')->delete($user->avatar);
            }
            $data['avatar'] = $request->file('avatar')->store('avatars', 'public');
        }

        $user->update($data);

        return redirect()->route('admin.users.edit', $user->id)->with('success', 'Utilisateur mis à jour avec succès.');
    }

    public function destroy(User $user) {
        if ($user->avatar) {
            Storage::disk('public')->delete($user->avatar);
        }

        // Supprimer l'utilisateur de la base de données
        $user->delete();

        return redirect()->route('admin.users.index')->with('success', 'Utilisateur supprimé avec succès.');
        

        
    }
}

