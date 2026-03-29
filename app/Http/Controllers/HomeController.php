<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Service;
use App\Models\Client;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $projects = Project::latest()->take(6)->get();
        $services = Service::all();
        $clients  = Client::all();
        return view('frontend.home', compact('projects', 'services', 'clients'));
    }

    public function projects()
    {
        $projects   = Project::latest()->paginate(9);
        $categories = Project::select('category')->distinct()->pluck('category');
        return view('frontend.projects', compact('projects', 'categories'));
    }

    public function contact()
    {
        return view('frontend.contact');
    }
}
