<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Pet-Sitting Contact Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            background-color: #f9f9f9;
            padding: 20px;
        }
        .email-container {
            background-color: #ffffff;
            padding: 25px;
            border: 1px solid #ddd;
            border-radius: 6px;
            max-width: 600px;
            margin: auto;
        }
        h2 {
            color: #333333;
        }
        p {
            margin: 10px 0;
        }
        strong {
            color: #555555;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <h2>Pet-Sitting Contact Details</h2>

        <p><strong>Name:</strong> {{ $contactData['full_name'] }}</p>
        <p><strong>Email:</strong> {{ $contactData['email'] }}</p>
        <p><strong>Subject:</strong> {{ $contactData['subject'] ?? 'No Subject' }}</p>
        <p><strong>Message:</strong><br>{{ $contactData['message'] }}</p>
    </div>
</body>
</html>
