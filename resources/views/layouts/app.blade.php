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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">


    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        /* Chat toggle button */
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
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
            z-index: 9999;
        }

        /* Chat popup box */
        #chatPopup {
            position: fixed;
            bottom: 70px;
            right: 20px;
            width: 300px;
            height: 350px;
            background: white;
            border: 1px solid #ccc;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
            display: none;
            flex-direction: column;
            overflow: hidden;
            font-family: Arial, sans-serif;
            z-index: 9999;
        }

        /* Header */
        #chatHeader {
            background: #007bff;
            color: white;
            padding: 10px;
            font-size: 16px;
            cursor: move;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        /* Expand button */
        #expandChat {
            background: none;
            border: none;
            color: white;
            font-size: 18px;
            cursor: pointer;
        }

        /* Chat messages */
        #chatMessages {
            padding: 10px;
            flex: 1;
            overflow-y: auto;
            font-size: 14px;
            align-self: flex-end;
        }

        /* Form */
        #chatForm {
            display: flex;
            border-top: 1px solid #ccc;
        }

        #question {
            flex: 1;
            padding: 8px;
            border: none;
            outline: none;
            align-self: flex-end;
        }

        .user-message {
            text-align: right;
            margin: 5px 0;
        }

        .user-message span {
            display: inline-block;
            background: #007bff;
            color: white;
            padding: 8px 12px;
            border-radius: 15px;
            max-width: 70%;
        }

        #chatForm button {
            background: #007bff;
            color: white;
            border: none;
            padding: 8px 12px;
            cursor: pointer;
        }

        /* Resize handle */
        .resize-handle {
            width: 15px;
            height: 15px;
            border-right: 2px solid #007bff;
            border-bottom: 2px solid #007bff;
            cursor: se-resize;
            position: absolute;
            bottom: 5px;
            right: 5px;
        }

        /* Chat message styles */
        .ai-message {
            text-align: left;
            margin: 5px 0;
        }

        .ai-message span {
            display: inline-block;
            background: #f1f1f1;
            color: black;
            padding: 8px 12px;
            border-radius: 15px;
            max-width: 70%;
        }
    </style>
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">
        @include('layouts.navigation')

        @isset($header)
            <header class="bg-white shadow">
                <div>
                    {{ $header }}
                </div>
            </header>
        @endisset

        <main>
            {{ $slot ?? '' }}
        </main>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>


    <!-- Chat Toggle -->
    <button id="chatToggle">💬</button>

    <!-- Chat Popup -->
    <div id="chatPopup">
        <div id="chatHeader" style="width: 265px; height: 49px;">
            <span>Chat with AI</span>
            <button id="expandChat">⛶</button>
        </div>
        <div id="chatMessages"></div>
        <form id="chatForm">
            <input type="text" id="question" placeholder="Type your question..." required>
            <button type="submit">Send</button>
        </form>
        <div class="resize-handle"></div>
    </div>

    <script>
        const toggleBtn = document.getElementById('chatToggle');
        const chatPopup = document.getElementById('chatPopup');
        const chatMessages = document.getElementById('chatMessages');
        const chatHeader = document.getElementById('chatHeader');
        const resizeHandle = document.querySelector('.resize-handle');
        const expandBtn = document.getElementById('expandChat');

        let isExpanded = false;
        toggleBtn.addEventListener('click', () => {
    if (chatPopup.style.display === 'none' || chatPopup.style.display === '') {
        chatPopup.style.display = 'flex';

        // Add intro message if chat is empty
        if (!chatMessages.hasChildNodes()) {
            chatMessages.innerHTML = `<div class="ai-message"><span>👋 Hi! I’m your AI assistant. How can I help you today?</span></div>`;
        }
    } else {
        chatPopup.style.display = 'none';
    }
});

        // Expand / shrink button
        expandBtn.addEventListener('click', () => {
            if (!isExpanded) {
                chatPopup.style.width = "500px";
                chatPopup.style.height = "600px";
                expandBtn.textContent = "🗕";
            } else {
                chatPopup.style.width = "300px";
                chatPopup.style.height = "350px";
                expandBtn.textContent = "⛶";
            }
            isExpanded = !isExpanded;
        });

        // Chat form submit
        document.getElementById('chatForm').addEventListener('submit', function (e) {
            e.preventDefault();
            const question = document.getElementById('question').value;
            chatMessages.innerHTML += `<div class="user-message"><strong>You:</strong> ${question}</div>`;
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
                    chatMessages.innerHTML += `<div class="ai-message"><strong>AI:</strong> ${data.answer}</div>`;
                    chatMessages.scrollTop = chatMessages.scrollHeight;
                });
        });

        // Dragging logic
        let isDragging = false, offsetX, offsetY;
        chatHeader.addEventListener('mousedown', (e) => {
            if (e.target === expandBtn) return; // avoid conflict with expand button
            isDragging = true;
            offsetX = e.clientX - chatPopup.getBoundingClientRect().left;
            offsetY = e.clientY - chatPopup.getBoundingClientRect().top;
        });
        document.addEventListener('mousemove', (e) => {
            if (isDragging) {
                chatPopup.style.left = `${e.clientX - offsetX}px`;
                chatPopup.style.top = `${e.clientY - offsetY}px`;
                chatPopup.style.bottom = "auto";
                chatPopup.style.right = "auto";
                chatPopup.style.position = "fixed";
            }
        });
        document.addEventListener('mouseup', () => {
            isDragging = false;
        });

        // Resizing logic
        let isResizing = false;
        resizeHandle.addEventListener('mousedown', (e) => {
            isResizing = true;
            e.preventDefault();
        });
        document.addEventListener('mousemove', (e) => {
            if (isResizing) {
                let newWidth = e.clientX - chatPopup.getBoundingClientRect().left;
                let newHeight = e.clientY - chatPopup.getBoundingClientRect().top;
                if (newWidth > 250) chatPopup.style.width = `${newWidth}px`;
                if (newHeight > 250) chatPopup.style.height = `${newHeight}px`;
            }
        });
        document.addEventListener('mouseup', () => {
            isResizing = false;
        });
    </script>
</body>

</html>