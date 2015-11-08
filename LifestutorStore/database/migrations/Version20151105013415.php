<?php

namespace Database\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema as DoctrineSchema;
use EntityManager;

use Schema;
use Illuminate\Database\Schema\Blueprint;

class Version20151105013415 extends AbstractMigration
{
    private $classes;

    private $tool;

    public function __construct($version)
    {
        $em = EntityManager::getFacadeRoot();
        $this->tool = new \Doctrine\ORM\Tools\SchemaTool($em);

        $this->classes = array(
            $em->getClassMetadata('Services\User\Data\Roles\Role'),
            $em->getClassMetadata('Services\User\Data\Entities\User\User'),
            $em->getClassMetadata('Services\Inventory\Data\Entities\Item\Item'),
            $em->getClassMetadata('Services\Cart\Data\Entities\Cart\Cart'),
            $em->getClassMetadata('Services\Cart\Data\Entities\Cart\Item')
        );

        parent::__construct($version);
    }

    /**
     * @param Schema $schema
     */
    public function up(DoctrineSchema $schema)
    {
        /*Schema::create('roles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
        });*/

        $this->tool->createSchema($this->classes);
    }

    /**
     * @param Schema $schema
     */
    public function down(DoctrineSchema $schema)
    {
        //Schema::drop('roles');

        $this->tool->dropSchema($this->classes);
    }
}
