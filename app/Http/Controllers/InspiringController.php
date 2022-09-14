<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\InspiringService;

class InspiringController extends Controller
{
    private $service;

    public function __construct(InspiringService $inspiringService)
    {   
        $this->service = $inspiringService;
    }

    /**
     * @return string
     */
    public function inspire() 
    {
        return $this->service->inspire();
    }

    public function add() {
        return $this->service->add('hey');
    }

    public function getAllPosts() {
        return $this->service->getAllPosts();
    }
}
