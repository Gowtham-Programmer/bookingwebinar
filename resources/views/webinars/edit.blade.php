
@section('content')
<div class="container mt-4">
    <div class="card shadow-lg">
        <div class="card-header bg-primary text-white">
            <h3 class="mb-0">✏️ Edit Webinar</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('webinars.update', $webinar->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Title</label>
                    <input type="text" name="title" value="{{ old('title', $webinar->title) }}" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Description</label>
                    <textarea name="description" class="form-control">{{ old('description', $webinar->description) }}</textarea>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Date</label>
                        <input type="date" name="date" value="{{ old('date', $webinar->date) }}" class="form-control" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Time</label>
                        <input type="time" name="time" value="{{ old('time', $webinar->time) }}" class="form-control" required>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Join Link</label>
                    <input type="url" name="link" value="{{ old('link', $webinar->link) }}" class="form-control">
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('webinars.index') }}" class="btn btn-secondary">⬅ Back</a>
                    <button type="submit" class="btn btn-success">💾 Update Webinar</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
