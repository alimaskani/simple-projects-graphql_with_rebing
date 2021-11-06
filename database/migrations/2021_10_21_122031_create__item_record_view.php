<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateItemRecordView extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement('
      CREATE OR REPLACE VIEW view_item as SELECT
             p.id,
          	 p.price,
             p.is_default,
             c.hex_code,
             d.name AS name_item,
             d.sub_name,
             e.name AS name_brand

             FROM color_items p
             INNER JOIN colors c ON c.id = p.color_id
             INNER JOIN items d ON  d.id = p.item_id
             INNER JOIN brands e ON e.id = d.brand_id
        ');

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('DROP VIEW view_items');
    }
}
