<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome - Glary Cloud Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light d-flex align-items-center justify-content-center" style="min-height: 100vh;">
    <div class="container text-center">
        <h1 class="mb-3">👋 Welcome to Glary Cloud Management</h1>
        <div class="alert alert-success">✅ Mailtrap integration is successful</div>

        <hr>

        {{-- Step 1: Send Test Email --}}
        <div class="my-4 text-start mx-auto">
            <h4>Step 1: Send Test Email</h4>
            <p class="text-muted">
                This sends a single sample email with a fixed subject and design.
                Only the recipient email is dynamic.
            </p>

            <form id="testEmailForm" onsubmit="handleFormSubmit(event)">
                <div class="input-group mb-3">
                    <input type="email" id="emailInput" class="form-control" placeholder="Enter recipient email"
                        required>
                    <button type="submit" class="btn btn-success">Send Test Email</button>
                </div>
            </form>
        </div>

        <hr>

        {{-- Step 2: Send Campaign Emails --}}
        <div class="my-4 text-start mx-auto">
            <h4>Step 2: Send Campaign Emails</h4>
            <p class="text-muted">
                Launch a multi-recipient email campaign using a rich email template.
                Includes text formatting, image support, and layout blocks.
            </p>

            <a href="{{ url('/send-multiple') }}" class="btn btn-primary">📧 Send Campaign Emails</a>
            <a href="{{ url('/email-logs') }}" class="btn btn-secondary mt-2">📜 View Email Logs of Cmmpaign</a>
        </div>

        <hr>

        {{-- Step 3: Client-as-a-Service (CaaS) --}}
        <div class="my-4 text-start mx-auto">
            <h4>Step 3: Client-as-a-Service (CaaS)</h4>
            <p class="text-muted">
                Use this option to send subscription-based emails on behalf of a client.
                Sender details are handled internally.
            </p>

            <a href="/subscribe-send-email" class="btn btn-warning">🚀 Send Subscription Email</a>
            <a href="{{ url('/email-logs') }}" class="btn btn-secondary mt-2">📜 View Email Logs of Customer</a>
        </div>

        <hr>

        {{-- Step 4: Send to All Customers --}}
        <div class="my-4 text-start mx-auto">
            <h4>Step 4: Send to All Customers</h4>
            <p class="text-muted">
                Automatically fetch all customers from the database and send each one an email using a predefined
                template.
                No manual input required.
            </p>

            <a href="{{ url('/send-to-customers') }}" class="btn btn-dark">📬 Send Emails to All Customers</a>
        </div>

        <hr>

        {{-- Step 5: Send to All Clients --}}
        <div class="my-4 text-start mx-auto">
            <h4>Step 5: Send to All Clients</h4>
            <p class="text-muted">
                Automatically send a personalized email to all clients from the ClientsFollowUp model.
                Ideal for sending reminders or follow-ups.
            </p>

            <a href="{{ url('/send-to-clients') }}" class="btn btn-info">📧 Send Emails to All Clients</a>
        </div>

    </div>

    <script>
        function handleFormSubmit(event) {
            event.preventDefault();
            const email = document.getElementById('emailInput').value;
            if (email) {
                const encodedEmail = encodeURIComponent(email);
                window.location.href = `/send-test-email/${encodedEmail}`;
            }
        }
    </script>
</body>

</html>
