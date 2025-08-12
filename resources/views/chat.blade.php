<!DOCTYPE html>
<html>
<head>
    <title>AI Chat</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f8;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            height: 100vh;
        }
        h2 {
            text-align: center;
            background: #4CAF50;
            color: white;
            padding: 15px;
            margin: 0;
        }
        #chat-container {
            flex: 1;
            padding: 20px;
            overflow-y: auto;
        }
        .message {
            max-width: 70%;
            padding: 10px 15px;
            border-radius: 12px;
            margin-bottom: 12px;
            line-height: 1.4;
        }
        .user {
            background: #DCF8C6;
            margin-left: auto;
            text-align: right;
        }
        .ai {
            background: #fff;
            border: 1px solid #ddd;
            margin-right: auto;
        }
        #chatForm {
            display: flex;
            padding: 10px;
            background: white;
            border-top: 1px solid #ccc;
        }
        #chatForm input {
            flex: 1;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 8px;
            outline: none;
        }
        #chatForm button {
            background: #4CAF50;
            color: white;
            border: none;
            padding: 10px 15px;
            margin-left: 8px;
            border-radius: 8px;
            cursor: pointer;
        }
        #chatForm button:hover {
            background: #45a049;
        }
    </style>
</head>
<body>

<h2>AI Chat Assistant</h2>

<div id="chat-container"></div>

<form id="chatForm">
    <input type="text" name="question" placeholder="Ask something..." required>
    <button type="submit">Send</button>
</form>

<script>
const chatContainer = document.getElementById('chat-container');
const form = document.getElementById('chatForm');

form.onsubmit = async function(e) {
    e.preventDefault();

    let formData = new FormData(form);
    let question = formData.get('question');

    // Add user's message
    addMessage(question, 'user');
    form.reset();

    // Add CSRF token
    formData.append('_token', document.querySelector('meta[name="csrf-token"]').getAttribute('content'));

    // Send request to backend
    let res = await fetch('/ai-chat', {
        method: 'POST',
        body: formData
    });

    let data = await res.json();

    // Add AI's message
    addMessage(data.answer, 'ai');
};

function addMessage(text, sender) {
    let msg = document.createElement('div');
    msg.classList.add('message', sender);
    msg.textContent = text;
    chatContainer.appendChild(msg);

    // Auto scroll
    chatContainer.scrollTop = chatContainer.scrollHeight;
}
</script>

</body>
</html>
