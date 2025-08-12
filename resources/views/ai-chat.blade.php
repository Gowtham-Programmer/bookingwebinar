<!DOCTYPE html>
<html>
<head>
    <title>AI Chat</title>
</head>
<body>
    <h1>Ask the AI about your website</h1>
    <form id="chatForm">
        <input type="text" name="question" id="question" placeholder="Type your question..." required>
        <button type="submit">Ask</button>
    </form>
    <div id="answer"></div>

    <script>
        document.getElementById('chatForm').addEventListener('submit', function(e) {
            e.preventDefault();
            fetch('/ai-chat', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({ question: document.getElementById('question').value })
            })
            .then(res => res.json())
            .then(data => {
                document.getElementById('answer').innerText = data.answer;
            });
        });
    </script>
</body>
</html>
