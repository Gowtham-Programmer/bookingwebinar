{{-- resources/views/webinars/index.blade.php --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upcoming Webinars</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: url('https://images.unsplash.com/photo-1521737604893-d14cc237f11d?auto=format&fit=crop&w=1950&q=80') no-repeat center center/cover;
            min-height: 100vh;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .overlay {
            background: rgba(0, 0, 0, 0.6);
            min-height: 100vh;
            padding: 30px;
        }
        .header-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            color: white;
            margin-bottom: 20px;
        }
        .header-bar h2 {
            font-weight: bold;
        }
        .logout-btn {
            background: #dc3545;
            color: white;
            padding: 8px 15px;
            border-radius: 5px;
            text-decoration: none;
        }
        .logout-btn:hover {
            background: #c82333;
            color: #fff;
        }
        .webinar-card {
            background: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0px 4px 12px rgba(0,0,0,0.2);
            transition: transform 0.2s ease-in-out;
        }
        .webinar-card:hover {
            transform: scale(1.02);
        }
        .card-header-custom {
            background: #007bff;
            color: white;
            padding: 10px 15px;
            font-weight: bold;
        }
        .btn-custom {
            border-radius: 50px;
            font-weight: bold;
        }
        .table th {
            background: cadetblue;
            color: white;
        }
    </style>
</head>
<body>
<div class="overlay">
    <div class="container">
        
        <!-- Header with Logout -->
        <div class="header-bar">
            <h2>🎥 Upcoming Webinars</h2>
            @auth
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="logout-btn">🚪 Logout</button>
                </form>
            @endauth
        </div>

        <!-- Add Webinar Button -->
         @if(Auth::check() && Auth::user()->is_admin)
        <a href="{{ route('webinars.create') }}" class="btn btn-success mb-3 btn-custom">➕ Add New Webinar</a>
        @endif
        <!-- Success Message -->
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <!-- Webinars Table in Card -->
        <div class="card webinar-card">
            <div class="card-header-custom">📅 Webinar List</div>
            <div class="card-body p-0">
                <table class="table table-bordered table-hover mb-0">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Join Link</th>
                            <th style="width: 180px;">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($webinars as $w)
                        <tr>
                            <td>{{ $w->title }}</td>
                            <td>{{ \Carbon\Carbon::parse($w->date)->format('d M Y') }}</td>
                            <td>{{ date('h:i A', strtotime($w->time)) }}</td>
                            <td>
                                @if($w->link)
                                    <a href="{{ $w->link }}" class="btn btn-outline-primary btn-sm" target="_blank">🔗 Join</a>
                                @else
                                    <span class="text-muted">Coming soon</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('webinars.edit', $w->id) }}" class="btn btn-primary btn-sm">✏ Edit</a>
                                <form action="{{ route('webinars.destroy', $w->id) }}" method="POST" style="display:inline;">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-danger btn-sm" onclick="return confirm('Delete this webinar?')">🗑 Delete</button>
                                </form>
                            </td>
                        </tr>
                        
                        @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted py-3">No webinars available</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        
        <a href="{{ route('dashboard') }}" class="btn btn-secondary mb-3">⬅️ Back to Webinars</a>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
