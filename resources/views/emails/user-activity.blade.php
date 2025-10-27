@php($greeting = $action === 'registered' ? 'A new customer just joined Ethereal!' : 'A customer just logged in to Ethereal')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User activity alert</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f8fafc; padding: 24px; color: #111827;">
    <table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="max-width: 600px; margin: 0 auto; background-color: #ffffff; border-radius: 16px; padding: 32px;">
        <tr>
            <td>
                <h1 style="font-size: 20px; margin-bottom: 12px;">{{ $greeting }}</h1>
                <p style="margin: 0 0 16px;">Here are the details that were provided:</p>
                <ul style="padding-left: 20px; margin: 0 0 24px;">
                    <li><strong>Full name:</strong> {{ $user->name }}</li>
                    <li><strong>Email:</strong> {{ $user->email }}</li>
                </ul>
                <p style="margin: 0 0 12px; color: #6b7280; font-size: 14px;">This notification was generated automatically at {{ now()->toDayDateTimeString() }}.</p>
            </td>
        </tr>
    </table>
</body>
</html>
