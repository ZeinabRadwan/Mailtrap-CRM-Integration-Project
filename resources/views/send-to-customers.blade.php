<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Professional Email Campaign</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #202434;
            color: #ffffff;
        }

        .container {
            background-color: #202434;
            max-width: 1000px;
            margin: 40px auto;
        }

        h2 {
            color: #ffffff;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #dddddd;
        }

        .form-control {
            width: 100%;
            padding: 10px;
            background-color: #2a2f45;
            color: #ffffff;
            border: 1px solid #444a63;
            border-radius: 4px;
        }

        .form-control::placeholder {
            color: #aaa;
        }

        #message-editor {
            height: 200px;
            overflow-y: auto;
        }

        .btn-primary {
            background-color: #4e5d94;
            border: none;
            color: #fff;
            padding: 10px 20px;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }

        .btn-primary:hover {
            background-color: #3c4974;
        }

        .alert-success {
            background-color: #28a745;
            color: #ffffff;
            padding: 10px 15px;
            border-radius: 5px;
            margin-bottom: 20px;
        }

        .action-buttons {
            margin-top: 20px;
        }
    </style>
</head>
<body>

<div class="container">
    <h2><i class="fas fa-paper-plane"></i> Professional Email Campaign to Customers</h2>

    @if (session('success'))
        <div class="alert-success">
            <i class="fas fa-check-circle"></i> {{ session('success') }}
        </div>
    @endif

    <form method="POST" action="/send-to-customers" id="email-form">
        @csrf

        <div class="form-group">
            <label for="email-subject">Email Subject:</label>
            <input type="text" id="email-subject" name="subject" class="form-control" 
                   placeholder="Enter email subject" required>
        </div>

        <div class="form-group">
            <label for="message-editor">Email Content:</label>
            <div id="message-editor" contenteditable="true" class="form-control"></div>
            <input type="hidden" name="message" id="message-field" required>
        </div>

        <div class="action-buttons">
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-paper-plane"></i> Send Campaign
            </button>
        </div>
    </form>
</div>

<script>
    const editor = document.getElementById('message-editor');
    const messageField = document.getElementById('message-field');

    editor.addEventListener('input', function () {
        messageField.value = editor.innerHTML;
    });
</script>

</body>
</html>
