<?php

use yii\db\Migration;

/**
 * Class m240703_144754_alter_profissionais_table
 */
class m240708_203620_alter_profissionais_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        // Remove a coluna 'status'
        $this->dropColumn('{{%profissionais}}', 'status');

        // Adiciona a coluna 'ativo'
        $this->addColumn('{{%profissionais}}', 'ativo', "ENUM('sim', 'não') NOT NULL DEFAULT 'sim'");
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // Adiciona a coluna 'status' de volta
        $this->addColumn('{{%profissionais}}', 'status', "ENUM('ativo', 'inativo') NOT NULL");

        // Remove a coluna 'ativo'
        $this->dropColumn('{{%profissionais}}', 'ativo');
    }
}


    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m240708_203620_alter_profissionais_table cannot be reverted.\n";

        return false;
    }
    */

