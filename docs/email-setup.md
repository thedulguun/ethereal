# Contact Form Email Delivery

The contact form now uses Laravel's mailer to send real emails to the configured store owner address. Follow these steps to route submissions to `dulguun.public@gmail.com` using Gmail's SMTP service.

## 1. Generate a Gmail App Password
1. Enable two-factor authentication on the Gmail account that should send the messages.
2. Visit <https://myaccount.google.com/apppasswords> and create a new "Mail" app password for "Other (Custom name)" (for example, `Ethereal Contact Form`).
3. Copy the 16-character password Google generates—you will paste it into the project `.env` file. Google shows the password with spaces for readability; when you add it to `.env` you can omit the spaces or leave them in (the application will strip them automatically).

> **Note:** Google does not allow using your primary account password for SMTP connections. An app password (or a dedicated workspace account) is required.

## 2. Update the Environment Configuration
Edit your `.env` file (or create one from `.env.example`) with the following settings:

```
MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=your.gmail.username@gmail.com
MAIL_PASSWORD=the-16-character-app-password-from-step-1
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=your.gmail.username@gmail.com
MAIL_FROM_NAME="${APP_NAME}"
MAIL_OWNER_ADDRESS=dulguun.public@gmail.com
```

Adjust `MAIL_FROM_NAME` if you prefer a different sender label.

## 3. Clear Cached Configuration
After editing `.env`, clear Laravel's cached configuration so the new values take effect:

```
php artisan config:clear
```

## 4. Verify Outgoing Mail
Submit the contact form and confirm the message appears in the Gmail account's "Sent" folder and in `dulguun.public@gmail.com`'s inbox. If delivery fails, inspect `storage/logs/laravel.log` for error details.

---

### Things You (the Site Owner) Still Need To Do
- Maintain the Gmail account, including keeping two-factor authentication enabled.
- Regenerate and update the SMTP app password if you ever rotate credentials or revoke access.
- Optionally set up a dedicated domain mailbox or transactional provider (Mailgun/Postmark/SES) if Gmail delivery limits become a concern.
