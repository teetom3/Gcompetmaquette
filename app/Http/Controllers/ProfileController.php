<?php 
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User; // Import du modèle User

class ProfileController extends Controller
{
    // Afficher le formulaire de modification du profil
    public function edit()
    {
        return view('profile.edit', ['user' => Auth::user()]);
    }

    // Mettre à jour les informations du profil
    public function update(Request $request)
    {
        $user = Auth::user(); // Récupérer l'utilisateur actuellement authentifié

        $request->validate([
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'date_of_birth' => 'required|date',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'phone' => 'required|string|max:15',
            'address' => 'required|string|max:255',
            'license_number' => 'required|string|max:50',
            'golf_index' => 'required|string|max:10',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('avatar')) {
            if($user->avatar){
                Storage::disk('public')->delete($user->avatar);
            }
            $avatarPath = $request->file('avatar')->store('avatars', 'public');
            $user->avatar = $avatarPath;
        }

        // Mise à jour des champs de l'utilisateur
        $user->name = $request->input('name');
        $user->surname = $request->input('surname');
        $user->date_of_birth = $request->input('date_of_birth');
        $user->email = $request->input('email');
        $user->phone = $request->input('phone');
        $user->address = $request->input('address');
        $user->license_number = $request->input('license_number');
        $user->golf_index = $request->input('golf_index');

        try {
            // Enregistrer les modifications
            $user->save(); // Enregistrer les modifications dans la base de données
            return redirect()->route('profile.edit')->with('success', 'Profil mis à jour avec succès.');
        } catch (\Exception $e) {
            // Gestion des erreurs
            return back()->withErrors(['error' => 'Erreur lors de la mise à jour du profil : ' . $e->getMessage()]);
        }
    }

    // Mettre à jour le mot de passe
    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|string|confirmed|min:8',
        ]);

        $user = Auth::user(); // Récupérer l'utilisateur actuellement authentifié

        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'Le mot de passe actuel ne correspond pas.']);
        }

        // Mettre à jour le mot de passe
        $user->password = Hash::make($request->password);

        try {
            // Enregistrer les modifications
            $user->save(); // Enregistrer les modifications dans la base de données
            return redirect()->route('profile.edit')->with('success', 'Mot de passe mis à jour avec succès.');
        } catch (\Exception $e) {
            // Gestion des erreurs
            return back()->withErrors(['error' => 'Erreur lors de la mise à jour du mot de passe : ' . $e->getMessage()]);
        }
    }
}
