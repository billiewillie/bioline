<?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    class CreateDomainIpsTable extends Migration
    {
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up()
        {
            Schema::create('domain_ips', function (Blueprint $table) {
                $table->id();

                $table->unsignedBigInteger('domain_id');
                $table->unsignedBigInteger('ip_id');

                $table->index('domain_id', 'domain_ip_domain_idx');
                $table->index('ip_id', 'domain_ip_ip_idx');

                $table->foreign('domain_id', 'domain_ip_domain_fk')->on('domains')->references('id');
                $table->foreign('ip_id', 'domain_ip_ip_fk')->on('ips')->references('id');

                $table->timestamps();
            });
        }

        /**
         * Reverse the migrations.
         *
         * @return void
         */
        public function down()
        {
            Schema::dropIfExists('domain_ips');
        }
    }
