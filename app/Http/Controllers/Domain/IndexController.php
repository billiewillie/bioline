<?php

    namespace App\Http\Controllers\Domain;

    use App\Http\Controllers\Controller;
    use App\Models\Domain;
    use App\Models\DomainIp;
    use App\Models\Ip;
    use Illuminate\Http\Request;

    class IndexController extends Controller
    {
        public function __invoke()
        {
            $domains = Domain::all();
            $allViews = DomainIp::all()->count();
            $uniqueViews = Ip::all()->count();

            $data = [
                'domains' => $domains,
                'all_views' => $allViews,
                'unique_views' => $uniqueViews
            ];
            return $data;
        }
    }
