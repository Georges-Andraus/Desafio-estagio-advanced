<?php

use yii\db\Migration;

/**
 * Class m240703_155920_profissionais_clinicas
 */
class m240703_155920_profissionais_clinicas extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%profissionais_clinicas}}', [
            'profissional_id' => $this->integer()->notNull(),
            'clinica_id' => $this->integer()->notNull(),
            'PRIMARY KEY(profissional_id, clinica_id)',
        ]);

        // Adicionar chaves estrangeiras
        $this->addForeignKey(
            'fk-profissionais_clinicas-profissional_id',
            '{{%profissionais_clinicas}}',
            'profissional_id',
            '{{%profissionais}}',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-profissionais_clinicas-clinica_id',
            '{{%profissionais_clinicas}}',
            'clinica_id',
            '{{%clinicas}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // Remover chaves estrangeiras na ordem inversa da criação
        $this->dropForeignKey('fk-profissionais_clinicas-clinica_id', '{{%profissionais_clinicas}}');
        $this->dropForeignKey('fk-profissionais_clinicas-profissional_id', '{{%profissionais_clinicas}}');

        $this->dropTable('{{%profissionais_clinicas}}');
    }

    /*
 // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m240703_155920_profissionais_clinicas cannot be reverted.\n";

        return false;
    }
    /*
  profissional_id INT NOT NULL,
    clinica_id INT NOT NULL,
    PRIMARY KEY (profissional_id, clinica_id),
    FOREIGN KEY (profissional_id) REFERENCES profissional(id),
    FOREIGN KEY (clinica_id) REFERENCES clinica(id)
    */
}
