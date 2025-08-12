<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

<style>
        /* Chat button */
        #chatToggle {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background: #007bff;
            color: white;
            border: none;
            padding: 12px 15px;
            border-radius: 50%;
            cursor: pointer;
            font-size: 18px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.3);
            z-index: 9999;
        }
        /* Chat popup */
        #chatPopup {
            position: fixed;
            bottom: 70px;
            right: 20px;
            width: 300px;
            background: white;
            border: 1px solid #ccc;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.3);
            display: none;
            flex-direction: column;
            overflow: hidden;
            font-family: Arial, sans-serif;
            z-index: 9999;
        }
        #chatHeader {
            background: #007bff;
            color: white;
            padding: 10px;
            font-size: 16px;
        }
        #chatMessages {
            padding: 10px;
            height: 200px;
            overflow-y: auto;
            font-size: 14px;
        }
        #chatForm {
            display: flex;
            border-top: 1px solid #ccc;
        }
        #question {
            flex: 1;
            padding: 8px;
            border: none;
            outline: none;
        }
        #chatForm button {
            background: #007bff;
            color: white;
            border: none;
            padding: 8px 12px;
            cursor: pointer;
        }
    </style>
</head>
<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">
        @include('layouts.navigation')

        @isset($header)
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endisset

        <!-- Page Content -->
        <main>
            {{ $slot ?? '' }}
        </main>
    </div>

    <!-- ✅ Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- AI Chat Widget -->
<button id="chatToggle">💬</button>
<div id="chatPopup">
    <div id="chatHeader">Chat with AI</div>
    <div id="chatMessages"></div>
    <form id="chatForm">
        <input type="text" id="question" placeholder="Type your question..." required>
        <button type="submit">Send</button>
    </form>
</div>

<script>
    const toggleBtn = document.getElementById('chatToggle');
    const chatPopup = document.getElementById('chatPopup');
    const chatMessages = document.getElementById('chatMessages');

    // Make sure it's hidden initially
    chatPopup.style.display = 'none';

    toggleBtn.addEventListener('click', () => {
        if (chatPopup.style.display === 'none') {
            chatPopup.style.display = 'flex';
        } else {
            chatPopup.style.display = 'none';
        }
    });

    document.getElementById('chatForm').addEventListener('submit', function(e) {
        e.preventDefault();
        const question = document.getElementById('question').value;
        chatMessages.innerHTML += `<div><strong>You:</strong> ${question}</div>`;
        document.getElementById('question').value = '';

        fetch('/ai-chat', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({ question })
        })
        .then(res => res.json())
        .then(data => {
            chatMessages.innerHTML += `<div><strong>AI:</strong> ${data.answer}</div>`;
            chatMessages.scrollTop = chatMessages.scrollHeight;
        });
    });
</script>

</body>
</html>
