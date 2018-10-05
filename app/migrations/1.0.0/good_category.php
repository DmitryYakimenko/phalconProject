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
        $this->batchInsert('good_category', [
                'id_good_category',
                'id_good',
                'id_category'
            ]
        );
    }

    /**
     * Reverse the migrations
     *
     * @return void
     */
    public function down()
    {
        $this->batchDelete('good_category');
    }

}
