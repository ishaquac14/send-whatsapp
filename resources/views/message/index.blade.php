<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Send Message</title>
</head>
<body>
    <h2>Send Message</h2>
    @if(session('success'))
        <div style="color: green">{{ session('success') }}</div>
    @elseif(session('error'))
        <div style="color: red">{{ session('error') }}</div>
    @endif

    <form action="{{ route('message.send') }}" method="post">
        @csrf
        <div>
            <label for="name">Name:</label><br>
            <input type="text" id="name" name="name" required><br>
        </div>
        <div>
            <label for="message">Message:</label><br>
            <textarea id="message" name="message" required></textarea><br>
        </div>
        <div>
            <label for="phone_number">Phone Number:</label><br>
            <input type="text" id="phone_number" name="phone_number" required><br>
        </div>
        <button type="submit">Send Message</button>
    </form>
</body>
</html>
