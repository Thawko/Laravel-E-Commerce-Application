<?php

namespace App\Repositories;

use App\Models\Setting;

class SettingRepository{
    protected $setting;

    public function __construct(Setting $setting)
    {
        $this->setting = $setting;
    }

    public function getAll()
    {
        return $this->setting->all()->first();
    }

    public function updateSetting($data){
        $setting = $this->setting->find($data["id"]);
        $setting->keywords = $data["keywords"];
        $setting->title = $data["title"];
        $setting->status = $data["status"];
        $setting->description = $data["description"];
        $setting->company = $data["company"];
        $setting->address = $data["address"];
        $setting->phone = $data["phone"];
        $setting->fax = $data["fax"];
        $setting->email = $data["email"];
        $setting->smtpserver = $data["smtpserver"];
        $setting->smtpemail = $data["smtpemail"];
        $setting->smtppassword = $data["smtppassword"];
        $setting->smtpport = $data["smtpport"];
        $setting->facebook = $data["facebook"];
        $setting->instagram = $data["instagram"];
        $setting->youtube = $data["youtube"];
        $setting->aboutus = $data["aboutus"];
        $setting->contact = $data["contact"];
        $setting->update();
        return $setting;
    }

    public function createSetting()
    {
        $setting = new $this->setting;
        $setting->title="E Commerce";
        $setting->save();
        return  $setting->fresh();
    }
}
