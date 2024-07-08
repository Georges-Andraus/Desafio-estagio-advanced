<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "profissionais".
 *
 * @property int $id
 * @property string $conselho
 * @property string $nome
 * @property string $numero_conselho
 * @property string $nascimento
 * @property string $email
 * @property string $status
 *
 * @property Clinicas[] $clinicas
 * @property ProfissionaisClinicas[] $profissionaisClinicas
 */
class Profissionais extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'profissionais';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['conselho', 'nome', 'numero_conselho', 'nascimento', 'email', 'ativo'], 'required'],
            [['conselho', 'ativo'], 'string'],
            [['numero_conselho'], 'unique', 'message' => 'Já existe um registro com esse valor.'],
            [['email'], 'unique', 'message' => 'Já existe um email registro com esse valor.', 'targetAttribute' => ['email']],
            [['email'], 'email'],
            ['nascimento', 'date', 'format' => 'php:Y-m-d'],
            [['nome', 'email'], 'string', 'max' => 255],
            [['numero_conselho'], 'string', 'max' => 20],
            
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'conselho' => 'Conselho',
            'nome' => 'Nome',
            'numero_conselho' => 'Numero Conselho',
            'nascimento' => 'Nascimento',
            'email' => 'Email',
            'ativo' => 'Ativo',
        ];
    }

    /**
     * Gets query for [[Clinicas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getClinicas()
    {
        return $this->hasMany(Clinicas::className(), ['id' => 'clinica_id'])->viaTable('profissionais_clinicas', ['profissional_id' => 'id']);
    }

    /**
     * Gets query for [[ProfissionaisClinicas]].
     *
     * @return \yii\db\ActiveQuery
     */
    
}
