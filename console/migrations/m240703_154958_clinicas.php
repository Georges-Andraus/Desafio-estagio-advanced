<?php

use yii\db\Migration;

/**
 * Class m240703_154958_clinicas
 */
class m240703_154958_clinicas extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m240703_154958_clinicas cannot be reverted.\n";

        return false;
    }

    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // https://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%clinicas}}', [
           'id' => $this->primaryKey(),
           'nome' => $this->string(255)->notNull(),
           'cnpj' => $this->string(14)->notNull()->unique() 
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('{{%clinicas}');
    }

}
