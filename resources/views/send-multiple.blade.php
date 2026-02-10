<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Professional Email Campaign Tool</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-color: #4361ee;
            --secondary-color: #3f37c9;
            --accent-color: #4895ef;
            --light-color: #f8f9fa;
            --dark-color: #212529;
            --success-color: #4bb543;
            --danger-color: #ff3333;
            --border-color: #dee2e6;
            --shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: var(--dark-color);
            background-color: #f5f7fb;
            margin: 0;
            padding: 20px;
        }
        
        .container {
            max-width: 900px;
            margin: 0 auto;
            background: white;
            border-radius: 8px;
            box-shadow: var(--shadow);
            padding: 30px;
        }
        
        h2 {
            color: var(--primary-color);
            margin-top: 0;
            padding-bottom: 15px;
            border-bottom: 1px solid var(--border-color);
            font-weight: 600;
        }
        
        .alert-success {
            background-color: #d4edda;
            color: #155724;
            padding: 12px 15px;
            border-radius: 4px;
            margin-bottom: 20px;
            border-left: 4px solid var(--success-color);
        }
        
        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
            color: var(--dark-color);
        }
        
        .form-group {
            margin-bottom: 20px;
        }
        
        .form-control {
            width: 100%;
            padding: 10px;
            border: 1px solid var(--border-color);
            border-radius: 4px;
            font-size: 14px;
            box-sizing: border-box;
        }
        
        #message-editor {
            min-height: 300px;
            border: 1px solid var(--border-color);
            border-radius: 4px;
            padding: 15px;
            margin-bottom: 20px;
            outline: none;
            background: white;
        }
        
        .toolbar {
            display: flex;
            flex-wrap: wrap;
            gap: 5px;
            margin-bottom: 15px;
            padding: 10px;
            background: var(--light-color);
            border-radius: 4px;
            border: 1px solid var(--border-color);
        }
        
        .tool-btn {
            background: white;
            border: 1px solid var(--border-color);
            border-radius: 4px;
            width: 36px;
            height: 36px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--dark-color);
            transition: all 0.2s;
        }
        
        .tool-btn:hover {
            background: var(--primary-color);
            color: white;
            border-color: var(--primary-color);
        }
        
        .tool-select {
            padding: 8px;
            border-radius: 4px;
            border: 1px solid var(--border-color);
            background: white;
            color: var(--dark-color);
        }
        
        #recipients {
            margin-bottom: 20px;
        }
        
        .user-row {
            display: flex;
            gap: 10px;
            margin-bottom: 10px;
            align-items: center;
        }
        
        .user-row input {
            flex: 1;
            padding: 10px;
            border: 1px solid var(--border-color);
            border-radius: 4px;
            font-size: 14px;
        }
        
        .btn {
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-weight: 500;
            display: inline-flex;
            align-items: center;
            transition: all 0.2s;
        }
        
        .btn-primary {
            background-color: var(--primary-color);
            color: white;
        }
        
        .btn-primary:hover {
            background-color: var(--secondary-color);
        }
        
        .btn-danger {
            background-color: var(--danger-color);
            color: white;
            width: 36px;
            height: 36px;
            justify-content: center;
        }
        
        .btn-danger:hover {
            background-color: #cc0000;
        }
        
        .btn-secondary {
            background-color: var(--light-color);
            color: var(--dark-color);
            border: 1px solid var(--border-color);
        }
        
        .btn-secondary:hover {
            background-color: #e2e6ea;
        }
        
        .btn i {
            margin-right: 8px;
        }
        
        .action-buttons {
            display: flex;
            gap: 10px;
            margin-top: 20px;
        }
        
        /* Responsive adjustments */
        @media (max-width: 768px) {
            .user-row {
                flex-direction: column;
                align-items: stretch;
            }
            
            .toolbar {
                justify-content: center;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <h2><i class="fas fa-paper-plane"></i> Professional Email Campaign</h2>

        @if (session('success'))
            <div class="alert-success">
                <i class="fas fa-check-circle"></i> {{ session('success') }}
            </div>
        @endif

        <form method="POST" action="/send-multiple" id="email-form">
            @csrf

            <div class="form-group">
                <label for="email-subject">Email Subject:</label>
                <input type="text" id="email-subject" name="subject" class="form-control" 
                       placeholder="Enter email subject" required
                       value="Message from Glary For Cloud Management">
            </div>

            <label for="message-editor">Email Content:</label>
            <div class="toolbar">
                <button type="button" class="tool-btn" title="Bold" onclick="document.execCommand('bold')">
                    <i class="fas fa-bold"></i>
                </button>
                <button type="button" class="tool-btn" title="Italic" onclick="document.execCommand('italic')">
                    <i class="fas fa-italic"></i>
                </button>
                <button type="button" class="tool-btn" title="Underline" onclick="document.execCommand('underline')">
                    <i class="fas fa-underline"></i>
                </button>
                <button type="button" class="tool-btn" title="Strikethrough" onclick="document.execCommand('strikeThrough')">
                    <i class="fas fa-strikethrough"></i>
                </button>
                
                <div class="divider"></div>
                
                <button type="button" class="tool-btn" title="Align Left" onclick="document.execCommand('justifyLeft')">
                    <i class="fas fa-align-left"></i>
                </button>
                <button type="button" class="tool-btn" title="Align Center" onclick="document.execCommand('justifyCenter')">
                    <i class="fas fa-align-center"></i>
                </button>
                <button type="button" class="tool-btn" title="Align Right" onclick="document.execCommand('justifyRight')">
                    <i class="fas fa-align-right"></i>
                </button>
                
                <div class="divider"></div>
                
                <button type="button" class="tool-btn" title="Bullet List" onclick="document.execCommand('insertUnorderedList')">
                    <i class="fas fa-list-ul"></i>
                </button>
                <button type="button" class="tool-btn" title="Numbered List" onclick="document.execCommand('insertOrderedList')">
                    <i class="fas fa-list-ol"></i>
                </button>
                
                <div class="divider"></div>
                
                <button type="button" class="tool-btn" title="Insert Link" onclick="insertImageFromUrl()">
                    <i class="fas fa-link"></i>
                </button>
                <button type="button" class="tool-btn" title="Upload Image" onclick="document.getElementById('localImageInput').click()">
                    <i class="fas fa-image"></i>
                </button>
                <button type="button" class="tool-btn" title="Insert Container" onclick="insertContainer()">
                    <i class="fas fa-square"></i>
                </button>
                
                <select id="colorPicker" class="tool-select" onchange="changeColor(this)">
                    <option value="">Text Color</option>
                    <option value="black">Black</option>
                    <option value="#4361ee">Blue</option>
                    <option value="#dc3545">Red</option>
                    <option value="#28a745">Green</option>
                    <option value="#6f42c1">Purple</option>
                    <option value="#fd7e14">Orange</option>
                </select>
                
                <select class="tool-select" onchange="document.execCommand('fontSize', false, this.value)">
                    <option value="">Font Size</option>
                    <option value="1">Small</option>
                    <option value="3">Normal</option>
                    <option value="5">Large</option>
                    <option value="7">Huge</option>
                </select>
            </div>

            <div id="message-editor" contenteditable="true"></div>
            
            <input type="hidden" name="message" id="message-field" required>

            <input type="file" id="localImageInput" accept="image/*" style="display:none" onchange="insertImageFromPC(this)">

            <label>Recipients List:</label>
            <div id="recipients">
                <div class="user-row">
                    <input type="text" name="names[]" placeholder="Recipient Name (optional)">
                    <input type="email" name="emails[]" placeholder="Recipient Email" required>
                    <button type="button" class="btn btn-danger" onclick="removeRow(this)"><i class="fas fa-times"></i></button>
                </div>
            </div>

            <div class="action-buttons">
                <button type="button" class="btn btn-secondary" onclick="addRow()">
                    <i class="fas fa-user-plus"></i> Add Recipient
                </button>
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-paper-plane"></i> Send Campaign
                </button>
            </div>
        </form>
    </div>

    <script>
        function addRow() {
            const container = document.getElementById('recipients');
            const row = document.createElement('div');
            row.className = 'user-row';
            row.innerHTML = `
                <input type="text" name="names[]" placeholder="Recipient Name (optional)">
                <input type="email" name="emails[]" placeholder="Recipient Email" required>
                <button type="button" class="btn btn-danger" onclick="removeRow(this)"><i class="fas fa-times"></i></button>
            `;
            container.appendChild(row);
        }

        function removeRow(button) {
            if (document.querySelectorAll('.user-row').length > 1) {
                button.parentElement.remove();
            } else {
                alert("You need at least one recipient!");
            }
        }

        function changeColor(select) {
            const color = select.value;
            if (!color) return;
            document.execCommand('foreColor', false, color);
        }

        function insertImageFromUrl() {
            const imageUrl = prompt("Enter image URL:");
            if (imageUrl) {
                insertImage(imageUrl);
            }
        }

        function insertImageFromPC(input) {
            const file = input.files[0];
            if (!file) return;

            const reader = new FileReader();
            reader.onload = function(e) {
                insertImage(e.target.result);
            };
            reader.readAsDataURL(file);
        }

        function insertImage(src) {
            const img = document.createElement("img");
            img.src = src;
            img.style.maxWidth = "100%";
            img.style.margin = "10px 0";
            document.getElementById("message-editor").appendChild(img);
        }

        function insertContainer() {
            const containerDiv = document.createElement('div');
            containerDiv.style.border = "1px solid #4361ee";
            containerDiv.style.borderRadius = "4px";
            containerDiv.style.padding = "15px";
            containerDiv.style.margin = "15px 0";
            containerDiv.style.backgroundColor = "#f8f9fa";
            containerDiv.innerHTML = "<p>Insert your content here...</p>";
            document.getElementById('message-editor').appendChild(containerDiv);
        }

        document.getElementById('email-form').onsubmit = function(event) {
            const messageContent = document.getElementById('message-editor').innerHTML;
            const subject = document.getElementById('email-subject').value;
            
            if (!subject.trim()) {
                alert('Please enter a subject!');
                event.preventDefault();
                return false;
            }
            
            if (!messageContent.trim()) {
                alert('Please enter a message!');
                event.preventDefault();
                return false;
            }
            
            const emailInputs = document.querySelectorAll('input[type="email"]');
            let hasEmptyEmail = false;
            
            emailInputs.forEach(input => {
                if (!input.value.trim()) {
                    hasEmptyEmail = true;
                    input.style.borderColor = "red";
                } else {
                    input.style.borderColor = "";
                }
            });
            
            if (hasEmptyEmail) {
                alert('Please fill in all email fields!');
                event.preventDefault();
                return false;
            }
            
            document.getElementById('message-field').value = messageContent;
        };
    </script>
</body>
</html>