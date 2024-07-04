<?php

use yii\db\Migration;

/**
 * Class m240703_144754_profissionais
 */
class m240703_144754_profissionais extends Migration
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
        echo "m240703_144754_profissionais cannot be reverted.\n";

        return false;
    }

    
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // https://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%profissionais}}', [
            'id' => $this->primaryKey(),
            'conselho' => "ENUM('CRM', 'CRO', 'CRN', 'COREN') NOT NULL",
            'nome' => $this->string(255)->notNull(),
            'numero_conselho' => $this->string(20)->notNull(),
            'nascimento' => $this->date()->notNull(),
            'email' => $this->string(255)->notNull(),
            'status' => "ENUM('ativo', 'inativo') NOT NULL",
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('{{%user}}');
    }
}


