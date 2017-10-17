<?php

use think\migration\Migrator;
use think\migration\db\Column;

class Orderslists extends Migrator
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
        $table = $this->table( 'orderslists' );
        $table->addColumn( 'remark', 'string', array('default'   => '', 'comment' => '订单备注' ) )
            ->addColumn( 'total', 'decimal', array(
                'signed'    => 'unsigned',
                'precision' => 7,
                'scale'     => 2,
                'default'   => 0,
                'comment'   => '小计'
            ) )
            ->addColumn( 'num', 'integer', array('default'   => 0, 'comment' => '商品数量' ) )
            ->addColumn( 'orders_id', 'integer', array('default'   => 0, 'comment' => '所属订单ID' ) )
            ->addColumn( 'goods_id', 'integer', array('default'   => 0, 'comment' => '商品id' ) )
            ->addColumn( 'goodslists_id', 'integer', array('default'   => 0, 'comment' => '商品规格id' ) )
            ->addTimestamps()
            ->create();
    }
}
