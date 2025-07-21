<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jobs = Job::all();

        return view("jobs.index")->with("jobs", $jobs);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("jobs.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validatedData = $request->validate([
            "title" => "required|string|max:255",
            "description" => "required|string",
            "salary" => "required|integer",
            "tags" => "nullable|string",
            "job_type" => "required|string",
            "remote" => "required|string",
            "requirements" => "nullable|string",
            "benefits" => "nullable|string",
            "address" => "nullable|string",
            "city" => "required|string",
            "state" => "required|string",
            "zipcode" => "nullable|string",
            "contact_email" => "required|string",
            "contact_phone" => "nullable|string",
            "company_name" => "required|string",
            "company_description" => "nullable|string",
            "company_logo" => "nullable|image|mimes:jpeg,jpg,png,gif|max:2048",
            "company_website" => "nullable|url"
        ]);

        //Hardcoded user id
        $validatedData["user_id"] = 1;

        // Check the image
        if ($request->hasFile("company_logo")) {
            // store the file and get path
            $path = $request->file("company_logo")->store("logos", "public");

            // add path to validated data
            $validatedData["company_logo"] = $path;
        }

        Job::create($validatedData);

        return redirect()->route("jobs.index")->with("success", "Job listings created succesfully");
    }

    /**
     * Display the specified resource.
     */
    public function show(Job $job)
    {
        return view("jobs.show")->with("job", $job);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Job $job): View
    {
        return view("jobs.edit")->with("job", $job);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Job $job)
    {
         $validatedData = $request->validate([
            "title" => "required|string|max:255",
            "description" => "required|string",
            "salary" => "required|integer",
            "tags" => "nullable|string",
            "job_type" => "required|string",
            "remote" => "required|string",
            "requirements" => "nullable|string",
            "benefits" => "nullable|string",
            "address" => "nullable|string",
            "city" => "required|string",
            "state" => "required|string",
            "zipcode" => "nullable|string",
            "contact_email" => "required|string",
            "contact_phone" => "nullable|string",
            "company_name" => "required|string",
            "company_description" => "nullable|string",
            "company_logo" => "nullable|image|mimes:jpeg,jpg,png,gif|max:2048",
            "company_website" => "nullable|url"
        ]);

       

        // Check the image
        if ($request->hasFile("company_logo")) {
            //delete old logo
            if ($job->company_logo && Storage::disk('public')->exists($job->company_logo)) {
                Storage::disk('public')->delete($job->company_logo);
            }

            // store the file and get path
            $path = $request->file("company_logo")->store("logos", "public");

            // add path to validated data
            $validatedData["company_logo"] = $path;
        }

        $job->update($validatedData);

        return redirect()->route("jobs.index")->with("success", "Job listings updated succesfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Job $job): RedirectResponse
    {
        // If logo, then delete it
        if ($job->company_logo && Storage::disk('public')->exists($job->company_logo)) {
            Storage::disk('public')->delete($job->company_logo);
        }

        $job->delete();

        return redirect()->route("jobs.index")->with("success", "Job listings deleted succesfully");
    }
}
