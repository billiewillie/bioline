<?php

    namespace App\Services\Domain;

    use App\Models\Domain;
    use App\Models\DomainIp;
    use App\Models\Ip;

    class Service
    {
        public function store($data)
        {
            $domain = Domain::firstOrCreate(['domain' => $data['domain']]);
            $ip = Ip::firstOrCreate(['ip' => $data['ip']]);
            DomainIp::create([
                'domain_id' => $domain->id,
                'ip_id' => $ip->id,
            ]);
        }
    }
