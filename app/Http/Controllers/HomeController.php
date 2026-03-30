<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Service;
use App\Models\Client;
use Illuminate\Support\Facades\Cache;

class HomeController extends Controller
{
    public function index()
    {
        $projects = Cache::remember('home:projects:latest6', now()->addMinutes(10), function () {
            return Project::query()
                ->latest()
                ->take(6)
                ->get(['id', 'title', 'category', 'description', 'image', 'is_featured', 'created_at']);
        });

        $services = Cache::remember('home:services:all', now()->addMinutes(30), function () {
            return Service::query()->orderBy('name')->get(['id', 'name', 'description', 'icon']);
        });

        $clients = Cache::remember('home:clients:all', now()->addMinutes(30), function () {
            return Client::query()->orderBy('name')->get(['id', 'name', 'logo']);
        });

        return view('frontend.home', compact('projects', 'services', 'clients'));
    }

    public function projects()
    {
        $projects = Project::query()
            ->latest()
            ->select(['id', 'title', 'category', 'description', 'image', 'is_featured', 'created_at'])
            ->paginate(9);

        $categories = Cache::remember('projects:categories', now()->addHours(6), function () {
            return Project::query()
                ->select('category')
                ->distinct()
                ->orderBy('category')
                ->pluck('category');
        });

        return view('frontend.projects', compact('projects', 'categories'));
    }

    public function contact()
    {
        return view('frontend.contact');
    }
}
