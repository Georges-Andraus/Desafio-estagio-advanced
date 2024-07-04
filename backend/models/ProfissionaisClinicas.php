<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "profissionais_clinicas".
 *
 * @property int $profissional_id
 * @property int $clinica_id
 *
 * @property Clinicas $clinica
 * @property Profissionais $profissional
 */
class ProfissionaisClinicas extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'profissionais_clinicas';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['profissional_id', 'clinica_id'], 'required'],
            [['profissional_id', 'clinica_id'], 'integer'],
            [['profissional_id', 'clinica_id'], 'unique', 'targetAttribute' => ['profissional_id', 'clinica_id']],
            [['clinica_id'], 'exist', 'skipOnError' => true, 'targetClass' => Clinicas::class, 'targetAttribute' => ['clinica_id' => 'id']],
            [['profissional_id'], 'exist', 'skipOnError' => true, 'targetClass' => Profissionais::class, 'targetAttribute' => ['profissional_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'profissional_id' => 'Profissional ID',
            'clinica_id' => 'Clinica ID',
        ];
    }

    /**
     * Gets query for [[Clinica]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getClinica()
    {
        return $this->hasOne(Clinicas::class, ['id' => 'clinica_id']);
    }

    /**
     * Gets query for [[Profissional]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProfissional()
    {
        return $this->hasOne(Profissionais::class, ['id' => 'profissional_id']);
    }
}
