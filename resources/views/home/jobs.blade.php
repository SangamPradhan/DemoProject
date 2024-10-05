<!DOCTYPE html>
<html lang="en">

<head>
    <link href="style.css" rel="stylesheet">
</head>

<body>
    <div class="container-fluid position-relative d-flex p-0">

        <!-- Sidebar Start -->
        @include('home.header')
        <br><br>
        <!-- Sidebar End -->

        <!-- Content Start -->
        <div class="container-fluid pt-4 px-4"> <br><br>

            <!-- Display success message if exists -->
            @if(session('message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('message') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">X</button>
            </div>
            @endif

                <div class="form-container">
                        <h2 class="form-header">Add Job Post</h2>
                        <form action="{{ url('/add_job') }}" method="post" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label for="type">Type</label>
                                <select id="type" name="type" required>
                                    <option value="Full-Time">Full-Time</option>
                                    <option value="Part-Time">Part-Time</option>
                                    <option value="Intern">Intern</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="region">Region</label>
                                <select id="region" name="region" required>
                                    <option value="Anywhere">Anywhere</option>
                                    <option value="Gandaki Province">Gandaki Province</option>
                                    <option value="Madhesh Pradesh">Madhesh Pradesh</option>
                                    <option value="Lumbini">Lumbini</option>
                                    <option value="Bagmati">Bagmati</option>
                                    <option value="Sudurpaschim">Sudurpaschim</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" id="title" name="title" placeholder="Job Title" required>
                            </div>

                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea id="description" name="description" rows="4" placeholder="Job Description" required></textarea>
                            </div>

                            <div class="form-group">
                                <label for="qualification">Qualifications</label>
                                <select id="qualification" name="qualification" required>
                                    <option value="+2">+2</option>
                                    <option value="Bachelor">Bachelors</option>
                                    <option value="Masters">Masters</option>
                                    <option value="PhD">PhD</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="vacancy">Vacancies</label>
                                <input type="number" id="vacancy" name="vacancy" placeholder="Vacancy Count" required>
                            </div>

                            <div class="form-group">
                                <label for="salary">Salary</label>
                                <input type="text" id="salary" name="salary" placeholder="Salary Amount" required>
                            </div>

                            <div class="form-group">
                                <label for="benefits">Benefits</label>
                                <textarea id="benefits" name="benefits" rows="4" placeholder="Job Benefits"></textarea>
                            </div>

                            <div class="form-group">
                                <label for="keyword">Keywords</label>
                                <input type="text" id="keyword" name="keyword" placeholder="Job Keywords" required>
                            </div>

                            <div class="form-group">
                                <label for="deadline">Deadline</label>
                                <input type="datetime-local" id="deadline" name="deadline" required>
                            </div>

                            <div class="form-group">
                                <label for="photo">Upload Photo</label>
                                <input type="file" id="photo" name="photo">
                            </div>

                            <button type="submit" class="btn-submit">Add Job</button>
                        </form>
                    </div>

        </div>

        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>
</body>

</html>
