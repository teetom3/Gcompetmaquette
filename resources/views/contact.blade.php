@include('header')

<!-- resources/views/contact.blade.php -->
<form action="{{ route('contact.submit') }}" method="POST" class="container mt-5">

    @csrf
    <div class="mb-3">
        <label for="subject" class="form-label">Objet :</label>
        <input type="text" name="subject" id="subject" class="form-control">
    </div>
    <div class="mb-3">
        <label for="name" class="form-label">Nom / email :</label>
        <input type="text" name="name" id="name" class="form-control">
    </div>
    <div class="mb-3">
        <label for="message" class="form-label">Message :</label>
        <textarea name="message" id="message" rows="5" class="form-control"></textarea>
    </div>
    <button type="submit" class="btn btn-success">Envoyer</button>
</form>
