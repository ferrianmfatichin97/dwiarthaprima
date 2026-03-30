<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PageSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PageSettingController extends Controller
{
    private const FILE_KEYS = [
        'home' => ['home_hero_video'],
        'project' => [],
        'about' => [],
        'services' => [],
        'contact' => [],
    ];

    private const RULES = [
        'home' => [
            'home_hero_video' => 'nullable|file|mimes:mp4,webm|max:10240',
            'home_hero_title' => 'nullable|string|max:255',
            'home_hero_subtitle' => 'nullable|string|max:255',
            'home_about_title' => 'nullable|string|max:255',
            'home_about_desc' => 'nullable|string|max:5000',
        ],
        'project' => [
            'project_hero_title' => 'nullable|string|max:255',
            'project_hero_desc' => 'nullable|string|max:5000',
            'project_cta_title' => 'nullable|string|max:255',
            'project_cta_desc' => 'nullable|string|max:5000',
        ],
        'about' => [
            'about_hero_title' => 'nullable|string|max:255',
            'about_hero_desc' => 'nullable|string|max:5000',
            'about_story_title' => 'nullable|string|max:255',
            'about_story_desc' => 'nullable|string|max:8000',
            'about_vision' => 'nullable|string|max:5000',
            'about_mission' => 'nullable|string|max:8000',
        ],
        'services' => [
            'services_hero_title' => 'nullable|string|max:255',
            'services_hero_desc' => 'nullable|string|max:5000',
            'services_cta_title' => 'nullable|string|max:255',
            'services_cta_desc' => 'nullable|string|max:5000',
        ],
        'contact' => [
            'contact_email' => 'nullable|email|max:255',
            'contact_phone' => 'nullable|string|max:255',
            'contact_whatsapp' => 'nullable|string|max:255',
            'contact_address' => 'nullable|string|max:5000',
            'contact_hours' => 'nullable|string|max:255',
        ],
    ];

    public function home()
    {
        $settings = PageSetting::where('page', 'home')->pluck('value', 'key')->toArray();
        return view('admin.pages.home', compact('settings'));
    }

    public function project()
    {
        $settings = PageSetting::where('page', 'project')->pluck('value', 'key')->toArray();
        return view('admin.pages.project', compact('settings'));
    }

    public function about()
    {
        $settings = PageSetting::where('page', 'about')->pluck('value', 'key')->toArray();
        return view('admin.pages.about', compact('settings'));
    }

    public function services()
    {
        $settings = PageSetting::where('page', 'services')->pluck('value', 'key')->toArray();
        return view('admin.pages.services', compact('settings'));
    }

    public function contact()
    {
        $settings = PageSetting::where('page', 'contact')->pluck('value', 'key')->toArray();
        return view('admin.pages.contact', compact('settings'));
    }

    public function store(Request $request, $page)
    {
        if (!array_key_exists($page, self::RULES)) {
            abort(404);
        }

        $validated = $request->validate(self::RULES[$page]);
        $fileKeys = self::FILE_KEYS[$page] ?? [];

        foreach (array_keys(self::RULES[$page]) as $key) {
            if (in_array($key, $fileKeys, true)) {
                if (!$request->hasFile($key)) {
                    continue;
                }

                $existing = PageSetting::where('page', $page)->where('key', $key)->first();
                if ($existing && is_string($existing->value) && Str::startsWith($existing->value, "settings/{$page}/")) {
                    Storage::disk('public')->delete($existing->value);
                }

                $storedPath = $request->file($key)->store("settings/{$page}", 'public');
                PageSetting::updateOrCreate(
                    ['page' => $page, 'key' => $key],
                    ['value' => $storedPath]
                );

                cache()->forget("pagesetting:{$page}:{$key}");

                continue;
            }

            if (!array_key_exists($key, $validated)) {
                continue;
            }

            $value = $validated[$key];
            if (is_string($value) && trim($value) === '') {
                $value = null;
            }

            PageSetting::updateOrCreate(
                ['page' => $page, 'key' => $key],
                ['value' => $value]
            );

            cache()->forget("pagesetting:{$page}:{$key}");
        }

        return back()->with('success', 'Pengaturan Halaman berhasil diperbarui.');
    }
}
