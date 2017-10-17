<?php

use think\migration\Migrator;
use think\migration\db\Column;

class Orders extends Migrator
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-abstractmigration-class
     *
     * The following commands can be used in this method and Phinx will
     * automatically reverse them when rolling back:
     *
     *    createTable
     *    renameTable
     *    addColumn
     *    renameColumn
     *    addIndex
     *    addForeignKey
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    public function change()
    {
        $table = $this->table( 'orders' );
        $table->addColumn( 'order_number', 'string', array( 'comment' => '订单号' ) )
            ->addColumn( 'total', 'decimal', array(
                'signed'    => 'unsigned',
                'precision' => 7,
                'scale'     => 2,
                'default'   => 0,
                'comment'   => '总价'
            ) )
            ->addColumn( 'is_pay', 'integer', array('default'   => 0, 'comment' => '是否支付' ) )
            ->addColumn( 'is_express', 'integer', array('default'   => 0, 'comment' => '是否发货' ) )
            ->addColumn( 'is_over', 'integer', array('default'   => 0, 'comment' => '是否收货' ) )
            ->addColumn( 'url_id', 'integer', array('default'   => 0, 'comment' => '所属地址ID' ) )
            ->addColumn( 'user_id', 'integer', array('default'   => 0, 'comment' => '所属用户ID' ) )
            ->addColumn( 'remark', 'string', array('default'   =>'',  'comment' => '描述' ) )
            ->addTimestamps()
            ->create();
    }
}
