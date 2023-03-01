<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Eloquent\SoftDeletes;

    class Domain extends Model
    {
        use HasFactory;
        use SoftDeletes;

        protected $table = 'domains';
        protected $guarded = false;

        protected $withCount = ['visited'];

        public function ips()
        {
            return $this->belongsToMany(Ip::class, 'domain_ips', 'domain_id', 'ip_id')->withTimestamps();
        }

        public function visited()
        {
            return $this->belongsToMany(Ip::class, 'domain_ips', 'domain_id', 'ip_id');
        }
    }
