<?php

namespace App\Http\Controllers;
use App\Repositories\CategoryRepository;
use App\Repositories\SettingRepository;
class HomeController extends Controller
{

    protected $categoryRepository;
    protected $settingRepository;

    public function __construct(CategoryRepository $categoryRepository, SettingRepository $settingRepository)
    {
        $this->categoryRepository=$categoryRepository;
        $this->settingRepository=$settingRepository;
    }
    public function index(){
        return "Site index";
    }
}
