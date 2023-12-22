
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href={{asset("assets/images/FII.png")}} type="image/x-icon">
    <title>Your Purchase Confirmation</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 20px auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #333333;
        }

        p {
            color: #666666;
            margin-bottom: 20px;
        }

        .qr-code {
            width: 100%;
            max-width: 200px;
            margin: 10px 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <img src="{{ $message->embed((public_path("assets/images/FI.png")) )}}">
        <h1>Thank You for Your Purchase!</h1>
    
        <p>Dear Customer,</p>
    
        <p>We appreciate your recent purchase of esim(s).</p>
    
        @foreach ($mailData['message'] as $item)
            <img src="{{ $message->embed((public_path($item)) )}}">
        @endforeach
        <!-- Add more QR codes as needed -->
    
        <p>Simply scan these QR codes to activate your number</p>
    
        <p>If you have any questions or need further assistance, feel free to contact our support team.</p>
    
        <p>Thank you for choosing our product!</p>
    
        <p>Best regards,<br>Tripcel</p>
    </div>
    
    <p>You have completely purchased the eSim(s) below.</p>

</body>
</html>