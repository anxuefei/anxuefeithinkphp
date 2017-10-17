<?php

use think\migration\Migrator;
use think\migration\db\Column;
use Phinx\Db\Adapter\PostgresAdapter;

class Goods extends Migrator
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
        $table = $this->table( 'goods' );
        $table->addColumn( 'name', 'string', array( 'limit' => 150, 'default' => '', 'comment' => '商品名称' ) )
            ->addColumn( 'price', 'decimal', array(
                'signed'    => 'unsigned',
                'precision' => 7,
                'scale'     => 2,
                'default'   => 0,
                'comment'   => '价格'
            ) )
            ->addColumn( 'uptime', 'datetime', array( 'default' => 0, 'comment' => '上架时间' ) )
            ->addColumn( 'content_images', 'string', array(
                'limit'   => '1000',
                'default' => '',
                'comment' => '商品内容页图册，用|线隔开多张图片'
            ) )
            ->addColumn( 'list_image', 'string', array( 'limit' => '500', 'default' => '', 'comment' => '商品列表页图' ) )
            ->addColumn( 'content', 'text', array( 'comment' => '商品详情' ) )
            ->addColumn( 'describe', 'string', array( 'comment' => '商品描述' ) )
            ->addColumn( 'click', 'integer', array( 'limit'   => PostgresAdapter::INT_SMALL,
                'signed'  => 'unsigned',
                'default' => 0,
                'comment' => '查看次数'
            ) )
            ->addColumn( 'category_id', 'integer', array( 'default' => 0, 'comment' => '所属栏目' ) )
            ->addTimestamps()
            ->create();

    }
}
