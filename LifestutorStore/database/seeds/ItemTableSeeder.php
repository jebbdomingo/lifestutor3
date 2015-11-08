<?php

use Illuminate\Database\Seeder;

class ItemTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*
         * Generate Items
         */
        $em        = app('EntityManager')->getFacadeRoot();
        $generator = \Faker\Factory::create();
        $populator = new Faker\ORM\Doctrine\Populator($generator, $em);
        $populator->addEntity('Services\Inventory\Data\Entities\Item\Item', 20, array(
          'title.value' => function() use ($generator) { return ucwords(implode(' ', $generator->words(3))); },
          'description.value' => function() use ($generator) { return $generator->paragraph(3); },
          'price.value' => function() use ($generator) { return $generator->randomFloat(2, 1, 50000); },
          'quantity.value' => function() use ($generator) { return $generator->randomDigitNotNull; }
        ));

        $generatedItems = $populator->execute();
    }
}
