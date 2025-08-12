<x-app-layout>
    <style>
        body {
            background: url('https://images.unsplash.com/photo-1522202176988-66273c2fd55f?auto=format&fit=crop&w=1920&q=80') no-repeat center center/cover;
        }

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
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
            {{ __('📊 Dashboard') }}
        </h2>
        <!-- <h1>hello</h1>hi -->


        <div class="py-10">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8" style="background:#028393ff">

                {{-- Greeting Section --}}
                <div class="bg-blue-500 text-white p-6 rounded-lg shadow-md mb-6" style="color:black;">
                    <h3 class="text-2xl font-bold">Welcome, {{ Auth::check() ? Auth::user()->name : 'Guest' }} 👋 </h3>
                    <p class="mt-1">Manage webinars, view analytics, and create new events from here.</p>
                </div>
                {{-- Action Buttons --}}
                <div class="flex gap-4 mb-6">
                    <a href="{{ route('webinars.index') }}"
                        class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded shadow">📅 View Webinars</a>
                    <a href="{{ route('webinars.create') }}"
                        class="bg-indigo-500 hover:bg-indigo-600 text-white px-4 py-2 rounded shadow">➕ Add Webinar</a>
                </div>

                {{-- Quick Stats --}}
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
                    <div class="bg-white p-4 rounded-lg shadow">
                        <h4 class="text-lg font-semibold">Total Webinars</h4>
                        <p class="text-3xl font-bold text-blue-600">{{ \App\Models\Webinar::count() }}</p>
                    </div>
                    <div class="bg-white p-4 rounded-lg shadow">
                        <h4 class="text-lg font-semibold">Upcoming Events</h4>
                        <p class="text-3xl font-bold text-green-600">
                            {{ \App\Models\Webinar::where('date', '>=', today())->count() }}
                        </p>
                    </div>
                    <div class="bg-white p-4 rounded-lg shadow">
                        <h4 class="text-lg font-semibold">Past Events</h4>
                        <p class="text-3xl font-bold text-gray-600">
                            {{ \App\Models\Webinar::where('date', '<', today())->count() }}
                        </p>
                    </div>
                </div>

                {{-- Recent Webinars Table --}}
                <div class="bg-white p-6 rounded-lg shadow">
                    <h4 class="text-xl font-bold mb-4">📌 Recent Webinars</h4>
                    <table class="w-full table-auto border-collapse">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="border px-4 py-2 text-left">Title</th>
                                <th class="border px-4 py-2">Date</th>
                                <th class="border px-4 py-2">Time</th>
                                <th class="border px-4 py-2">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse(\App\Models\Webinar::latest()->take(5)->get() as $webinar)
                                <tr>
                                    <td class="border px-4 py-2">{{ $webinar->title }}</td>
                                    <td class="border px-4 py-2">{{ $webinar->date }}</td>
                                    <td class="border px-4 py-2">{{ date('h:i A', strtotime($webinar->time)) }}</td>
                                    <td class="border px-4 py-2">
                                        <a href="{{ route('webinars.show', $webinar->id) }}"
                                            class="text-blue-600 hover:underline">View</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center py-4 text-gray-500">No webinars available</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </x-slot>
</x-app-layout>