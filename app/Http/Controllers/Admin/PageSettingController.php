<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PageSetting;
use Illuminate\Http\Request;

class PageSettingController extends Controller
{
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

    public function store(Request $request, $page)
    {
        $data = $request->except(['_token', '_method']);
        
        foreach ($data as $key => $value) {
            if ($request->hasFile($key)) {
                $setting = PageSetting::where('page', $page)->where('key', $key)->first();
                if ($setting && $setting->value) {
                    \Illuminate\Support\Facades\Storage::disk('public')->delete($setting->value);
                }
                $value = $request->file($key)->store('settings', 'public');
            }

            PageSetting::updateOrCreate(
                ['page' => $page, 'key' => $key],
                ['value' => $value]
            );
        }

        return back()->with('success', 'Pengaturan Halaman berhasil diperbarui.');
    }
}
