<div class="container mt-5">
    <div class="text-center mb-4">
        <h2>Contact Us</h2>
        <p>We'd love to hear from you! Whether you have a question, feedback, or just want to say hello — reach out using the form below.</p>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-8">
            <form action="{{ route('contact.submit') }}" method="POST">
                @csrf

                <div class="form-group mb-3">
                    <label for="name">Full Name</label>
                    <input type="text" name="name" id="name" class="form-control" required placeholder="Enter your full name">
                </div>

                <div class="form-group mb-3">
                    <label for="email">Email Address</label>
                    <input type="email" name="email" id="email" class="form-control" required placeholder="you@example.com">
                </div>

                <div class="form-group mb-3">
                    <label for="phone">Phone Number</label>
                    <input type="text" name="phone" id="phone" class="form-control" placeholder="+91-9876543210">
                </div>

                <div class="form-group mb-3">
                    <label for="subject">Subject</label>
                    <input type="text" name="subject" id="subject" class="form-control" required placeholder="Subject of your message">
                </div>

                <div class="form-group mb-4">
                    <label for="message">Message</label>
                    <textarea name="message" id="message" rows="5" class="form-control" required placeholder="Write your message here..."></textarea>
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-primary px-5">Send Message</button>
                </div>
            </form>
        </div>
    </div>
</div>