<?php

namespace App\View\Components\Admin;

use App\Models\Setting;
use Illuminate\View\Component;
use Illuminate\Support\Str;

class Sidebar extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $setting = Setting::first();
        $split = Str::ucsplit($setting->site_name);
        $alias2 = [];
        foreach($split as $sp)
        {
            array_push($alias2,Str::substr($sp, 0, 1));
        }
        $alias = implode('',$alias2);
        return view('components.admin.sidebar',compact('setting','alias'));
    }
}
