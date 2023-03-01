<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Eloquent\SoftDeletes;

    class Ip extends Model
    {
        use HasFactory;
        use SoftDeletes;

        protected $table = 'ips';
        protected $guarded = false;

        public function domains()
        {
            return $this->belongsToMany(Domain::class, 'domain_ips', 'ip_id', 'domain_id')->withTimestamps();
        }
    }
