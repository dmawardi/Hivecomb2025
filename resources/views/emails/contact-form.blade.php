<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Contact Form Submission</title>
    <style>
        /* Inline Tailwind-like styles for email compatibility */
        body { background-color: #f3f4f6; margin: 0; padding: 0; font-family: 'Segoe UI', Arial, sans-serif; }
        .container { max-width: 480px; margin: 40px auto; background: #fff; border-radius: 0.5rem; box-shadow: 0 2px 8px #e5e7eb; padding: 2rem; }
        .header { color: #7c3aed; font-size: 1.5rem; font-weight: bold; margin-bottom: 1.5rem; }
        .label { color: #374151; font-weight: 600; }
        .value { color: #111827; }
        .message-label { margin-top: 1.5rem; color: #374151; font-weight: 600; }
        .message-box { background: #f9fafb; border: 1px solid #e5e7eb; border-radius: 0.375rem; padding: 1rem; color: #374151; margin-top: 0.5rem; white-space: pre-line; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">New Contact Form Submission</div>
        <div>
            <p><span class="label">Name:</span> <span class="value">{{ $data['name'] }}</span></p>
            <p><span class="label">Email:</span> <span class="value">{{ $data['email'] }}</span></p>
        </div>
        <div>
            <div class="message-label">Message:</div>
            <div class="message-box">{{ $data['message'] }}</div>
        </div>
    </div>
</body>
</html>