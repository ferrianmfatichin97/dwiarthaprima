<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Service;
use App\Models\Client;
use App\Models\Message;

class DashboardController extends Controller
{
    public function index()
    {
        $totalProjects = Project::count();
        $totalServices = Service::count();
        $totalClients  = Client::count();
        $totalMessages = Message::count();
        $unreadMessages = Message::where('is_read', false)->count();
        $recentProjects = Project::latest()->take(5)->get();
        $recentMessages = Message::latest()->take(5)->get();

        return view('admin.dashboard', compact(
            'totalProjects', 'totalServices', 'totalClients',
            'totalMessages', 'unreadMessages', 'recentProjects', 'recentMessages'
        ));
    }
}
