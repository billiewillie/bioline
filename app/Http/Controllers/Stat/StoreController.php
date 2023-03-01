<?php

    namespace App\Http\Controllers\Stat;

    use App\Http\Controllers\Controller;
    use App\Http\Requests\Stat\StoreRequest;
    use App\Models\DomainIp;

    class StoreController extends Controller
    {
        public function __invoke(StoreRequest $request)
        {
            $data = $request->validated();

            if ($data['day'] === 0) {
                $domainIPs = DomainIp::query()
                    ->where('domain_id', $data['id'])
                    ->whereYear('created_at', $data['year'])
                    ->whereMonth('created_at', $data['month'])
                    ->groupBy('ip_id')
                    ->pluck('ip_id')
                    ->count();

                $domainIPsAll = DomainIp::query()
                    ->where('domain_id', $data['id'])
                    ->whereYear('created_at', $data['year'])
                    ->whereMonth('created_at', $data['month'])
                    ->count();
            } else {
                $domainIPs = DomainIp::query()
                    ->where('domain_id', $data['id'])
                    ->whereYear('created_at', $data['year'])
                    ->whereMonth('created_at', $data['month'])
                    ->whereDay('created_at', $data['day'])
                    ->groupBy('ip_id')
                    ->pluck('ip_id')
                    ->count();

                $domainIPsAll = DomainIp::query()
                    ->where('domain_id', $data['id'])
                    ->whereYear('created_at', $data['year'])
                    ->whereMonth('created_at', $data['month'])
                    ->whereDay('created_at', $data['day'])
                    ->count();
            }

            $stats = [
                'all_views' => $domainIPsAll,
                'unique_views' => $domainIPs
            ];

            return $stats;
        }
    }
