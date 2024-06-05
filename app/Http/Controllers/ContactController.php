<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Contracts\Mail\Mailable;
use App\Mail\ContactMail;

class ContactController extends Controller
{

    public function showForm()
    {
        return view('contact');
    }


    public function handleContact(Request $request)
    {
        // Validation des données du formulaire
        $validatedData = $request->validate([
            'subject' => 'required',
            'name' => 'required',
            'message' => 'required',
        ]);

        // Envoi de l'email
        Mail::to('gcompet2024@gmail.com')->send(new ContactMail(
            $validatedData['subject'],
            $validatedData['name'],
            $validatedData['message'],
        ));

        // Redirection après l'envoi de l'email
        return redirect()->route('welcome')->with('success', 'Votre message a été envoyé avec succès.');
    }
}
