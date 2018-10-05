<?php 

use Phalcon\Db\Column;
use Phalcon\Db\Index;
use Phalcon\Db\Reference;
use Phalcon\Mvc\Model\Migration;

/**
 * Class GoodCategoryMigration_100
 */
class GoodCategoryMigration_100 extends Migration
{
    /**
     * Define the table structure
     *
     * @return void
     */
    public function morph()
    {
        $this->morphTable('good_category', [
                'columns' => [
                    new Column(
                        'id_good_category',
                        [
                            'type' => Column::TYPE_INTEGER,
                            'notNull' => true,
                            'autoIncrement' => true,
                            'size' => 11,
                            'first' => true
                        ]
                    ),
                    new Column(
                        'id_good',
                        [
                            'type' => Column::TYPE_INTEGER,
                            'notNull' => true,
                            'size' => 11,
                            'after' => 'id_good_category'
                        ]
                    ),
                    new Column(
                        'id_category',
                        [
                            'type' => Column::TYPE_INTEGER,
                            'notNull' => true,
                            'size' => 11,
                            'after' => 'id_good'
                        ]
                    )
                ],
                'indexes' => [
                    new Index('PRIMARY', ['id_good_category'], 'PRIMARY'),
                    new Index('id_good', ['id_good'], null),
                    new Index('id_category', ['id_category'], null)
                ],
                'references' => [
                    new Reference(
                        'good_category_ibfk_1',
                        [
                            'referencedTable' => 'goods',
                            'referencedSchema' => 'phalcon',
                            'columns' => ['id_good'],
                            'referencedColumns' => ['id_good'],
                            'onUpdate' => 'RESTRICT',
                            'onDelete' => 'RESTRICT'
                        ]
                    ),
                    new Reference(
                        'good_category_ibfk_2',
                        [
                            'referencedTable' => 'categories',
                            'referencedSchema' => 'phalcon',
                            'columns' => ['id_category'],
                            'referencedColumns' => ['id_category'],
                            'onUpdate' => 'RESTRICT',
                            'onDelete' => 'RESTRICT'
                        ]
                    )
                ],
                'options' => [
                    'TABLE_TYPE' => 'BASE TABLE',
                    'AUTO_INCREMENT' => '15',
                    'ENGINE' => 'InnoDB',
                    'TABLE_COLLATION' => 'utf8_general_ci'
                ],
            ]
        );
    }

    /**
     * Run the migrations
     *
     * @return void
     */
    public function up()
    {
        self::$connection->insert(
            'good_category',
            array(
                array(1,1,1),
                array(2,1,4),
                array(3,2,1),
                array(4,3,3),
                array(5,3,2),
                array(6,4,3),
                array(7,5,1),
                array(8,6,1),
                array(9,6,4),
                array(10,7,3),
                array(11,8,2),
                array(12,9,4),
                array(13,10,3),
                array(14,10,2)
            )
        );
    }

    /**
     * Reverse the migrations
     *
     * @return void
     */
    public function down()
    {

    }

}
