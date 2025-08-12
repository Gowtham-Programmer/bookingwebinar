<!DOCTYPE html>
<html>
<head>
    <title>Payment</title>
</head>
<body>
    <h1>Payment for Webinar ID: {{ $webinarId }}</h1>

    <form action="{{ route('payment.process', $webinarId) }}" method="POST">
        @csrf
        <label>Name on Card:</label>
        <input type="text" name="name" required><br><br>

        <label>Card Number:</label>
        <input type="text" name="card_number" required><br><br>

        <label>Expiry Date:</label>
        <input type="text" name="expiry" required><br><br>

        <label>CVV:</label>
        <input type="text" name="cvv" required><br><br>

        <button type="submit">Pay Now</button>
    </form>
</body>
</html>
