<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call('WidgetTableSeeder');
    }
}

class WidgetTableSeeder extends Seeder
{
    public function run()
    {
        App\Widget::truncate();

        factory(App\Widget::class, 20)->create();
    }
}
