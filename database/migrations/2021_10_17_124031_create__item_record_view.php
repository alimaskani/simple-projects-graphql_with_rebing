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
        CREATE VIEW view_items as SELECT
        items.id  ,
         brands.name as brand_name ,
          items.name as item_name ,
           items.subname as item_subname ,
           items.price  ,
           colors.name AS color_name ,
            colors.is_default as default_color
            FROM brands , items , colors WHERE brands.id = items.brand_id AND colors.item_id = items.id
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
