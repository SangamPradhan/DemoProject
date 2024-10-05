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

<body>
@include('home.header')

<div class="container-fluid pt-4 px-4">

    <!-- Display Success Message -->
        @if (session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif

    <div class="container-fluid">
    <div class="form-container">
        <h2 class="form-header">Add New User</h2>
        <form action="{{ url('/create_user') }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" required>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>
            </div>

            <div class="form-group">
                <label for="phone">Phone</label>
                <input type="text" id="phone" name="phone" required>
            </div>

            <div class="form-group">
                <label for="usertype">User Type</label>
                <select id="usertype" name="usertype" required>
                    <option value="2">External User</option>
                    <option value="3">Internal User</option>
                </select>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>

            <button type="submit" class="btn-submit">Submit</button>
        </form>
    </div>
</div>
