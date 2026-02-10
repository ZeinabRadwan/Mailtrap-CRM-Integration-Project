<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Inbox</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f1f3f6;
            margin: 0;
        }

        .sidebar {
            background-color: #202434;
            color: #ecf0f1;
            height: 100vh;
            padding: 20px;
            position: fixed;
            top: 0;
            left: 0;
            width: 260px;
            overflow-y: auto;
        }

        .sidebar-title {
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .badge {
            margin-left: 5px;
        }

        .list-group-item {
            background-color: #34495e;
            color: #ecf0f1;
            border: none;
            border-radius: 8px;
            margin-bottom: 10px;
            padding: 15px;
            transition: all 0.2s ease-in-out;
        }

        .list-group-item:hover {
            background-color: #3b5770;
            cursor: pointer;
        }

        .message-details {
            margin-left: 280px;
            padding: 30px;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            min-height: 100vh;
        }

        .message-details h4 {
            font-size: 22px;
            margin-bottom: 15px;
            font-weight: 600;
        }

        .message-details p {
            font-size: 16px;
            line-height: 1.8;
            margin-bottom: 10px;
        }

        .message-details small {
            color: #7f8c8d;
        }

        @media (max-width: 768px) {
            .sidebar {
                position: relative;
                width: 100%;
                height: auto;
                border-right: none;
            }

            .message-details {
                margin-left: 0;
                padding: 20px;
            }
        }
    </style>
</head>

<body>

    <div class="sidebar">
        <div class="sidebar-title">
            Email Logs
            <span class="badge badge-primary">{{ $thisMonthCount }} this month</span>
            <span class="badge badge-info">Limit: {{ $monthlyLimit }}</span>
            @if ($thisMonthCount > $monthlyLimit)
                <span class="badge badge-danger">Limit Exceeded!</span>
            @endif
        </div>

        <div class="list-group">
            @foreach ($logs as $log)
                <a href="javascript:void(0)" class="list-group-item list-group-item-action message-item"
                    data-id="{{ $log->id }}"
                    data-subject="{{ $log->subject }}"
                    data-recipient-name="{{ $log->recipient_name }}"
                    data-recipient-email="{{ $log->recipient_email }}"
                    data-status="{{ $log->status }}"
                    data-created-at="{{ $log->created_at->format('Y-m-d H:i:s') }}"
                    data-message="{{ $log->message }}">
                    <strong>Message from Glary For Cloud Management</strong><br>
                    To: {{ $log->recipient_email }}<br>
                    <small>{{ $log->created_at->diffForHumans() }}</small>
                </a>
            @endforeach
        </div>
    </div>

    <div class="message-details">
        <p>Select a message from the left sidebar to view its details.</p>
    </div>

    <script>
        document.querySelectorAll('.message-item').forEach(item => {
            item.addEventListener('click', function () {
                let messageDetails = document.querySelector('.message-details');

                let message = {
                    subject: this.getAttribute('data-subject'),
                    recipientName: this.getAttribute('data-recipient-name'),
                    recipientEmail: this.getAttribute('data-recipient-email'),
                    status: this.getAttribute('data-status'),
                    createdAt: this.getAttribute('data-created-at'),
                    message: this.getAttribute('data-message')
                };

                messageDetails.innerHTML = `
                    <h4>${message.subject}</h4>
                    <p><strong>Recipient:</strong> ${message.recipientName}</p>
                    <p><strong>Email:</strong> ${message.recipientEmail}</p>
                    <p><strong>Status:</strong> ${message.status}</p>
                    <p><strong>Sent At:</strong> ${message.createdAt}</p>
                    <hr>
                    <p><strong>Message:</strong></p>
                    <p>${message.message}</p>
                `;
            });
        });
    </script>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
