@include('header')

<!-- resources/views/contact.blade.php -->
<form action="{{ route('contact.submit') }}" method="POST">

    @csrf
    <div>
        <label for="subject">Objet :</label>
        <input type="text" name="subject" id="subject">
    </div>
    <div>
        <label for="name">Nom :</label>
        <input type="text" name="name" id="name">
    </div>
    <div>
        <label for="message">Message :</label>
        <textarea name="message" id="message" rows="5"></textarea>
    </div>
    <button type="submit">Envoyer</button>
</form>
