<?php

namespace App\Http\Controllers\Admin;

use App\Traits\UploadAble;
use Illuminate\Http\Request;
use App\Models\Setting;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Response;
use App\Models\SmsGate;

class SettingController extends Controller
{

    public function index(Setting $setting)
    {
        abort_if(Gate::denies('settings_management'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.settings.index',compact('setting'));
    }
    
    public function smsGateway()
    {

        return view('admin.smsgateway.index');

    }
      /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SmsGate  $smsgateway
     * @return \Illuminate\Http\Response
     */
    public function smsgatewayEdit($id)
    {
        // abort_if(Gate::denies('admin_page_management'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $smsgateway = SmsGate::find($id);

        return view('admin.smsgateway.edit', compact('smsgateway'));
    }

  
}