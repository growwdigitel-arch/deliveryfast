@extends('layouts.app') {{-- Change this if your layout file is different --}}

@section('content')
<div class="container py-5">
    <h2 class="mb-3">Contact Us</h2>
    <p class="mb-4">We're here to help! If you have any questions, feedback, or just want to say hello, please fill out the form below and we'll get back to you as soon as possible.</p>

    <form action="#" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Your Name</label>
            <input type="text" id="name" name="name" class="form-control" required placeholder="John Doe">
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Your Email</label>
            <input type="email" id="email" name="email" class="form-control" required placeholder="john@example.com">
        </div>

        <div class="mb-3">
            <label for="message" class="form-label">Message</label>
            <textarea id="message" name="message" class="form-control" rows="4" required placeholder="Type your message here..."></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Send Message</button>
    </form>
</div>
@endsection
