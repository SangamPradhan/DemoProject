<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class JobController extends Controller
{
    public function add_job(Request $request)
    {
        $data = new Job;
        $data->type = $request->input('type');
        $data->region = $request->input('region');
        $data->title = $request->input('title');
        $data->description = $request->input('description');
        $data->qualification = $request->input('qualification');
        $data->vacancy = $request->input('vacancy');
        $data->salary = $request->input('salary');
        $data->benefits = $request->input('benefits');
        $data->keyword = $request->input('keyword');
        $data->deadline = $request->input('deadline');

        $photo=$request->photo;
        if ($photo) {
            $photoname=time().'.'.$photo->getClientOriginalExtension();
            $photo->move("job_photos",$photoname);
            $data->photo=$photoname;
        } else {
            $data->photo = 'default.jpg'; // replace with your default image filename
        }

        $data->save();

        return redirect()->back()->with('message', 'Job added successfully');
    }


    public function showJobs()
    {
        $data = Job::orderBy('created_at', 'desc')->paginate(10);

        return view('job', compact('jobs'));
    }

    public function job()
    {
        $data = Job::orderBy('created_at', 'desc')->paginate(10);

        return view('user.job', compact('data'));
    }

    public function job_details($id)
    {
        $job = Job::orderBy('created_at', 'desc')->paginate(10);
        $job = Job::find($id);

        if ($job) {
            return view('user.job_details', compact('job'));
        } else {
            return redirect('/job')->with('error', 'Job not found');
        }
    }

    public function show($id)
    {
        $user = Auth::user();

        if($user) {
            $usertype = $user->usertype;
        } else {
            $usertype = null;
        }

        $job = Job::find($id);

        return view('job_details', [
            'job' => $job,
            'usertype' => $usertype
        ]);
    }

    public function editjob(Request $request)
    {
        $id = $request->id; // if coming from request
        $job = Job::findOrFail($id);
        return view('user.editjob', compact('job'));
    }


    public function updatejob(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'salary' => 'required|numeric',
            'location' => 'required|string|max:255',
            'description' => 'required|string',
        ]);


        $job = Job::findOrFail($id);
        $job->title = $request->title;
        $job->salary = $request->salary;
        $job->location = $request->location;
        $job->description = $request->description;


        $job->save();

        return redirect()->back()->with('success', 'Job updated successfully!');
    }


    }
