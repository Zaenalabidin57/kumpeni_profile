<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    public function index()
    {
        return view('admin.pages.setting',[
            'title' => 'Pengaturan Web',
            'setting' => Setting::first()
        ]);
    }

    public function update()
    {
        request()->validate([
            'site_name' => ['required'],
            'email' => ['email'],
            'meta_description' => ['max:140'],
            'author' => ['required'],
            'favicon' => ['image','mimes:png,jpg,jpeg,ico']
        ]);

        $setting = Setting::first();
        $data = request()->all();

        if(request()->file('favicon'))
        {
            Storage::disk('public')->delete($setting->favicon);
            $data['favicon'] = request()->file('favicon')->store('settings','public');
        }else{
            $data['favicon'] = $setting->favicon;
        }

        if(request()->file('image'))
        {
            Storage::disk('public')->delete($setting->image);
            $data['image'] = request()->file('image')->store('settings','public');
        }else{
            $data['image'] = $setting->image;
        }

        $setting->update($data);

        return redirect()->route('admin.settings.index')->with('success','Pengaturan Web berhasil disimpan.');
    }
}
