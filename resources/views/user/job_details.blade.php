<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Extend User Model</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="job_detail.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>


@include('user.userheader')


<body>
<section class="hero">
        <div class="hero-content">
            <h2>Rs. {{ $job->salary }}</h2>
            <p>{{ $job->title }}</p>

        @if(Auth::check() && Auth::user()->usertype == 3)
            <a href="{{ url('job/edit/' . $job->id) }}" class="btn btn-primary" id="edit-button">Edit this Job</a>
        @endif


        </div>
    </section>

    <section class="job-description">
        <div class="container">
            <div class="job-content">
                <img src="/job_photos/{{ $job->photo }}" alt="Office Image">
                <div class="tabs">
                    <button class="tab active">Job Description</button>
                    <button class="tab">About Employer</button>
                    <button class="tab">Contact Details</button>
                </div>
                <div class="job-details">
                    <h3>Job Description</h3>
                    <p>{{ $job->description }}</p>
                    <p class="job-meta">
                        <i class="fa fa-briefcase"></i> {{ $job->type }} &nbsp;&nbsp;
                        <i class="fa fa-map-marker"></i> {{ $job->region }} &nbsp;&nbsp;
                        <i class="fa fa-calendar"></i> Deadline: {{ $job->deadline }}
                    </p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugit nam placeat ut cumque ipsa iste, commodi omnis aperiam perferendis incidunt.</p>

                    <h3>Job Qualifications</h3>
                    <p>{{ $job->qualification }} level required.</p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Illo hic quis quo tempora, totam non vero velit. Inventore, obcaecati placeat perspiciatis neque enim laudantium. Sit eaque, aliquid et nisi illo.</p>
                </div>
            </div>
        </div>
    </section>

    <script>

        const editButton = document.getElementById('edit-button');
        if (editButton) {
            editButton.addEventListener('click', () => {
                window.location.href = '{{ route('user.job_details', $job->id) }}';
            });
        }
    </script>
</body>
</html>
