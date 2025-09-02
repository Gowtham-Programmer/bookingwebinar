<x-app-layout>
    <style>
         {
            background-image: url('https://www.google.com/url?sa=i&url=https%3A%2F%2Fwww.justdial.com%2FBangalore%2FZibtek-Pvt-Ltd-Opposite-Chowdeshwari-Temple-Ombr-Layout-Banaswadi%2F080PXX80-XX80-181218112527-S6M9_BZDET&psig=AOvVaw0W5NiDgyj0Rfjrk-ul7X2b&ust=1756794516753000&source=images&cd=vfe&opi=89978449&ved=0CBUQjRxqFwoTCID5r9v3to8DFQAAAAAdAAAAABAE');
        }body

        .overlay {
            background: rgba(0, 0, 0, 0.5);
            min-height: 100vh;
            padding: 20px;
        }

        .glass-card {
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(6px);
            border-radius: 12px;
            padding: 20px;
            box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.2);
        }
    </style>

    <x-slot name="header">
        <div class="py-4" style="background-image: url('{{ asset('uploads/img/ai1.jpg') }}'); background-size: cover; background-position: center;">
            <div width="80px" style="background:#028393ff;">

                {{-- Greeting Section --}}
                <div class="alert alert-info shadow mb-4 bg-light">
                    <h3 class="fw-bold fs-4 text-dark">
                        Welcome, {{ Auth::check() ? Auth::user()->name : 'Guest' }} 👋
                    </h3>
                    <p class="mt-2">Manage webinars, view analytics, and create new events from here.</p>
                </div>

                {{-- Action Buttons --}}
                <div class="d-flex gap-3 mb-4">
                    <a href="{{ route('webinars.index') }}" class="btn btn-success shadow">
                        📅 View Webinars
                    </a>
                    <a href="{{ route('webinars.create') }}" class="btn btn-primary shadow">
                        ➕ Add Webinar
                    </a>
                </div>

                {{-- Quick Stats --}}
                <div class="row mb-4">
                    <div class="col-md-4 mb-3">
                        <div class="card shadow text-center">
                            <div class="card-body">
                                <h4 class="fw-semibold">Total Webinars</h4>
                                <p class="display-6 text-primary">{{ \App\Models\Webinar::count() }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <div class="card shadow text-center">
                            <div class="card-body">
                                <h4 class="fw-semibold">Upcoming Events</h4>
                                <p class="display-6 text-success">
                                    {{ \App\Models\Webinar::where('date', '>=', today())->count() }}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <div class="card shadow text-center">
                            <div class="card-body">
                                <h4 class="fw-semibold">Past Events</h4>
                                <p class="display-6 text-muted">
                                    {{ \App\Models\Webinar::where('date', '<', today())->count() }}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3" >
                        <div class="card shadow text-center">
                            <div class="card-body">
                                <h4 class="fw-semibold">Completed Events</h4>
                                <p class="display-6 text-success">
                                    {{ \App\Models\Webinar::where('date', '<=', today())->count() }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Recent Webinars Table --}}
                <div class="card shadow">
                    <div class="card-body">
                        <h4 class="fw-bold mb-3">📌 Recent Webinars</h4>
                        <div class="table-responsive">
                            <table class="table table-striped table-hover align-middle">
                                <thead class="table-light">
                                    <tr>
                                        <th>Title</th>
                                        <th>Date</th>
                                        <th>Time</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse(\App\Models\Webinar::latest()->take(5)->get() as $webinar)
                                        <tr>
                                            <td>{{ $webinar->title }}</td>
                                            <td>{{ $webinar->date }}</td>
                                            <td>{{ date('h:i A', strtotime($webinar->time)) }}</td>
                                            <td>
                                                <a href="{{ route('webinars.show', $webinar->id) }}"
                                                    class="btn btn-link text-primary">View</a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4" class="text-center text-muted py-3">
                                                No webinars available
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </x-slot>
</x-app-layout>
