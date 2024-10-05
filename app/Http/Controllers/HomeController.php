<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    public function index()
    {
        // Fetch the necessary fields from the users table
        $users = User::select('id', 'name', 'phone', 'usertype', 'created_at')->get();

        // Pass users data to the home.index view
        return view('home.index', ['users' => $users]);
    }

    public function redirect()
    {
        if (Auth::check()) { // Check if the user is authenticated
            $usertype = Auth::user()->usertype;

            if ($usertype == '1')
            {
                return view('home.index');
            }
            elseif ($usertype == '2')
            {
                return view('user.home');
            }
            else
            {
                return view('user.home');
            }
        } else {
            return redirect()->route('login'); // Redirect to login if not authenticated
        }
    }


    public function createuser()
    {
        return view('home.createuser');
    }

    // public function create_user(Request $request)
    // {
    //     $request->validate([
    //         'name' => 'required|string|max:255',
    //         'email' => 'required|string|email|max:255|unique:users',
    //         'phone' => 'required|string|max:15',
    //         'usertype' => 'required|integer',
    //         'password' => 'required|string|min:8|confirmed',
    //     ]);

    //     $data = new User;
    //     $data->name = $request->input('name');
    //     $data->email = $request->input('email');
    //     $data->phone = $request->input('phone');
    //     $data->usertype = $request->input('usertype');
    //     $data->password = Hash::make($request->input('password'));
    //     $data->save();

    //     return redirect()->back()->with('success', 'User created successfully.');
    // }


public function create_user(Request $request)
{

    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'phone' => 'required|string|max:15',
        'usertype' => 'required|integer',
        'password' => 'required|string|min:8|confirmed',
    ]);

    $user = new User();
    $user->name = $request->input('name');
    $user->email = $request->input('email');
    $user->phone = $request->input('phone');
    $user->usertype = $request->input('usertype');
    $user->password = Hash::make($request->input('password'));
    $user->save();

    return redirect()->back()->with('success', 'User created successfully.');
}

    public function edituser($id)
    {
        $user = User::findOrFail($id);

        return view('home.edituser', compact('user'));
    }

    public function updateuser(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.$id,
            'phone' => 'required|string|max:15',
            'usertype' => 'required|integer',
        ]);

        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->usertype = $request->usertype;

        $user->save();

        return redirect()->back()->with('success', 'User updated successfully!');
    }

    public function home()
    {
        return view('user.home');
    }

    public function createjobs()
    {
        return view('home.jobs');
    }

    public function manageuser()
    {
        $users = User::select('id', 'name', 'phone', 'usertype', 'created_at')->get();

        // Pass users data to the manageuser view
        return view('home.manageuser', ['users' => $users]);
    }

    public function deleteuser($id)
    {
        // Find the user by ID
        $user = User::find($id);

        if ($user) {
            $user->delete();
        }

        return redirect()->back()->with('success', 'User deleted successfully!');
    }

    public function showJobs()
    {
        $data = Job::orderBy('created_at', 'desc')->paginate(10);

        return view('job', compact('jobs'));
    }

    public function job()
    {
        $data = Job::orderBy('created_at', 'desc')->paginate(10);

        return view('user.job', compact('job'));
    }

    public function show($id)
    {
        $user = Auth::user();  // Get the authenticated user

        // Fetch job details (assuming you have a Job model)
        $job = Job::find($id);

        // Pass usertype and job data to the view
        return view('job-details', [
            'job' => $job,
            'usertype' => $user->usertype
        ]);
    }




}
