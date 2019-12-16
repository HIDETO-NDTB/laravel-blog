<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Settings;
use Illuminate\Support\Facades\Session;

class SettingsController extends Controller
{
    public function index(){
        return view('settings.settings')->with('settings',Settings::first());
    }

    public function update(Request $request,Settings $setting){

        $this->validate($request, [
        'site_name' => 'required',
        'contact_email' => 'required',
        'contact_number' => 'required',
        'address' => 'required'
        ]);

        $setting = Settings::first();
        $setting->fill($request->input())->save();

        Session::flash('success','Settings Updated Successfully');
        return redirect()->route('settings.index');
    }


}
