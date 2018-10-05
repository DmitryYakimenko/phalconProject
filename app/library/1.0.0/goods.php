<?php 

use Phalcon\Db\Column;
use Phalcon\Db\Index;
use Phalcon\Db\Reference;
use Phalcon\Mvc\Model\Migration;

/**
 * Class GoodsMigration_100
 */
class GoodsMigration_100 extends Migration
{
    /**
     * Define the table structure
     *
     * @return void
     */
    public function morph()
    {
        $this->morphTable('goods', [
                'columns' => [
                    new Column(
                        'id_good',
                        [
                            'type' => Column::TYPE_INTEGER,
                            'notNull' => true,
                            'autoIncrement' => true,
                            'size' => 11,
                            'first' => true
                        ]
                    ),
                    new Column(
                        'name',
                        [
                            'type' => Column::TYPE_VARCHAR,
                            'notNull' => true,
                            'size' => 255,
                            'after' => 'id_good'
                        ]
                    ),
                    new Column(
                        'img',
                        [
                            'type' => Column::TYPE_VARCHAR,
                            'notNull' => true,
                            'size' => 255,
                            'after' => 'name'
                        ]
                    ),
                    new Column(
                        'id_good_type',
                        [
                            'type' => Column::TYPE_INTEGER,
                            'notNull' => true,
                            'size' => 11,
                            'after' => 'img'
                        ]
                    )
                ],
                'indexes' => [
                    new Index('PRIMARY', ['id_good'], 'PRIMARY'),
                    new Index('id_good_type', ['id_good_type'], null)
                ],
                'references' => [
                    new Reference(
                        'goods_ibfk_1',
                        [
                            'referencedTable' => 'good_types',
                            'referencedSchema' => 'phalcon',
                            'columns' => ['id_good_type'],
                            'referencedColumns' => ['id_good_type'],
                            'onUpdate' => 'RESTRICT',
                            'onDelete' => 'RESTRICT'
                        ]
                    )
                ],
                'options' => [
                    'TABLE_TYPE' => 'BASE TABLE',
                    'AUTO_INCREMENT' => '11',
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
            'goods',
            array(
                array(1,'ASUS X570UD-E4037 (90NB0HS1-M00460) Black','copy_asus_x570ud_e4026_5a6ef38f49ec7_images_2751817615.jpg',1),
                array(2,'Dell Inspiron 7577 (i75581S0DL-418) Black','copy_dell_inspiron_7577_i75581s2dl_418_5a67d47126ab8_images_2656406375.jpg',1),
                array(3,'HP 255 G6 (2EW01ES) Dark Ash','copy_hp_255_g6_2hg33es_59e5ed03f3de6_images_2271600422.jpg',1),
                array(4,'Lenovo V110 (80TG00AJRK) Black','copy_lenovo_80th001ark_5b0415db1d993_images_4675567408.jpg',1),
                array(5,'Everest Home 4070 (4070_9414)','everest_home_4070_9414_images_7691758248.jpg',3),
                array(6,'Everest MSI Dragon PC 9057 (9057_6410)','everest_msi_dragon_pc_9057_6410_images_6814830614.jpg',3),
                array(7,'ARTLINE Business B29 v02 (B29v02)','artline_business_b29_v02_images_508808317.jpg','3'),
                array(8,'Artline Gaming X26 v01 (X26v01)','artline_x26v01_images_7016809194.jpg','3'),
                array(9,'Samsung Galaxy Note 9 6/128GB Midnight Black','samsung_sm_n960fzkdsek_images_6520779374.jpg',2),
                array(10,'Samsung Galaxy A7 2017 Duos SM-A720 Gold','samsung_sm_a720fzddsek_images_1828064742.jpg',2)
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
