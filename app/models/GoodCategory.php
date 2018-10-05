<?php

namespace app\models;

class GoodCategory extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    public $id_good_category;

    /**
     *
     * @var integer
     */
    public $id_good;

    /**
     *
     * @var integer
     */
    public $id_category;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("phalcon");
        $this->setSource("good_category");
        $this->belongsTo('id_good', 'app\models\Goods', 'id_good', ['alias' => 'Goods']);
        $this->belongsTo('id_category', 'app\models\Categories', 'id_category', ['alias' => 'Categories']);
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'good_category';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return GoodCategory[]|GoodCategory|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return GoodCategory|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
