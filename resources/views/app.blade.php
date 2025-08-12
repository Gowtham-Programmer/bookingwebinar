<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        /* 🎨 Custom Styles to match the uploaded design */
        body { background: #f5f7fb; }
        .video-section { height: 400px; background: #000; border-radius: 10px; overflow: hidden; }
        .video-section iframe { width: 100%; height: 100%; border: none; }
        .chat-box { height: 300px; overflow-y: auto; background: #f9f9f9; border-radius: 10px; padding: 10px; }
        .chat-message { background: #e9ecef; padding: 8px 12px; border-radius: 8px; margin-bottom: 5px; }
        .chat-input { border-radius: 0; }
        .tab-btn.active { border-bottom: 2px solid #28a745; color: #28a745; }
    </style>

    <!-- Vite assets -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased">
    @yield('content')
</body>
</html>
