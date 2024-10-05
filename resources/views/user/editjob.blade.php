<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Extend User Model</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <style>
        .container {
            margin-top: 50px;
            max-width: 600px;
        }
        .form-group {
            margin-bottom: 15px;
        }
    </style>
</head>

@include('user.userheader')<br>

<body>

<div class="container">
<br><br>
    <h2>Edit Job Details</h2>

    <!-- Show success message if job updated -->
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- Form for editing job details -->
        <form action="{{ url('/updatejob', $job->id) }}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="title">Job Title</label>
            <input type="text" name="title" class="form-control" id="title" value="{{ $job->title }}" required>
        </div>

        <div class="form-group">
            <label for="salary">Salary</label>
            <input type="number" name="salary" class="form-control" id="salary" value="{{ $job->salary }}" required>
        </div>

        <div class="form-group">
            <label for="region">Region</label>
            <select id="region" name="region" class="form-control" required>
                <option value="Anywhere" {{ $job->region == 'Anywhere' ? 'selected' : '' }}>Anywhere</option>
                <option value="Gandaki Province" {{ $job->region == 'Gandaki Province' ? 'selected' : '' }}>Gandaki Province</option>
                <option value="Madhesh Pradesh" {{ $job->region == 'Madhesh Pradesh' ? 'selected' : '' }}>Madhesh Pradesh</option>
                <option value="Lumbini" {{ $job->region == 'Lumbini' ? 'selected' : '' }}>Lumbini</option>
                <option value="Bagmati" {{ $job->region == 'Bagmati' ? 'selected' : '' }}>Bagmati</option>
                <option value="Sudurpaschim" {{ $job->region == 'Sudurpaschim' ? 'selected' : '' }}>Sudurpaschim</option>
            </select>
        </div>

        <div class="form-group">
            <label for="description">Job Description</label>
            <textarea name="description" class="form-control" id="description" rows="5" required>{{ $job->description }}</textarea>
        </div>

        <div class="form-group">
            <label for="benefits">Benefits</label>
            <textarea name="benefits" class="form-control" id="benefits" rows="4">{{ $job->benefits }}</textarea>
        </div>

        <div class="form-group">
            <label for="keyword">Keywords</label>
            <input type="text" name="keyword" class="form-control" id="keyword" value="{{ $job->keyword }}" required>
        </div>

        {{--  <div class="form-group">
            <label for="deadline">Deadline</label>
            <input type="datetime-local" name="deadline" class="form-control" id="deadline" value="{{ $job->deadline->format('Y-m-d\TH:i') }}" required>
        </div>  --}}

        <div class="form-group">
            <label for="photo">Update Picture</label>
            <input type="file" name="photo" class="form-control" id="photo">
            @if($job->photo)
                <img src="/job_photos/{{ $job->photo }}" alt="Job Photo" style="max-width: 100px; margin-top: 10px;">
            @endif
        </div>

        <button type="submit" class="btn btn-primary">Update Job</button>
    </form>
</div>

</body>
</html>
