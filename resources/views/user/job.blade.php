<link rel="stylesheet" href="style.css">

@include('user.userheader') <br>

    </div>
    <!-- Job Cards Container -->
    <section class="job-container">
        @foreach ($data as $job)
        <div class="job-card">
            <img src="job_photos/{{ $job->photo }}" alt="Job Image">
            <h3>Rs. {{ $job->salary }}</h3>
            <h4>Available Vacancy: {{ $job->vacancy }}</h4>
            <p>{{ $job->title }}</p>
            <a href="{{ url('/job_details', $job->id) }}">View Details</a>
        </div>

        @endforeach
    </section>

    <!-- Pagination Section -->
    <div class="pagination-container">
        {{ $data->links() }}
    </div>
</div>
