<?php

    namespace App\Http\Controllers\Domain;

    use App\Http\Controllers\Controller;
    use App\Services\Domain\Service;

    class BaseController extends Controller
    {
        public $service;

        public function __construct(Service $service)
        {
            $this->service = $service;
        }
    }
