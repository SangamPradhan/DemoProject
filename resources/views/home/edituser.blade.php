<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Extend User Model</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <!-- Other includes remain the same -->

    <!-- MAIN CSS -->
    <link rel="stylesheet" href="style.css">

</head>

@include('home.header') <br><br><br>
<body>

<!-- Form Start -->
<form action="{{ url('/updateuser', $user->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">X</button>
        </div>
    @endif

    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-12 col-xl-6">
                <div class="bg-secondary rounded h-100 p-4">
                    <h6 class="mb-4">Edit Selected User Details</h6>

                    <!-- Pre-fill the form with user details -->
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="email"
                            name="email" value="{{ $user->email }}" aria-describedby="" readonly>
                    </div>


                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name"
                            name="name" value="{{ $user->name }}">
                    </div>

                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone</label>
                        <input type="text" class="form-control" id="phone"
                            name="phone" value="{{ $user->phone }}">
                    </div>

                    <div class="form-floating mb-3">
                    <label for="floatingSelect">Select User type</label>
                        <select class="form-select" id="usertype" name="usertype" aria-label="Floating label select example">
                            <option value="2" {{ $user->usertype == 2 ? 'selected' : '' }}>External User</option>
                            <option value="3" {{ $user->usertype == 3 ? 'selected' : '' }}>Internal User</option>
                        </select>

                    </div>

                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </div>
        </div>
    </div>
</form>
</body>
