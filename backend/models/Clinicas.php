<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "clinicas".
 *
 * @property int $id
 * @property string $nome
 * @property string $cnpj
 *
 * @property ProfissionaisClinicas[] $profissionaisClinicas
 * @property Profissionais[] $profissionals
 */
class clinicas extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'clinicas';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nome', 'cnpj'], 'required'],
            [['nome'], 'string', 'max' => 255],
            [['cnpj'], 'string', 'max' => 14],
            [['cnpj'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nome' => 'Nome',
            'cnpj' => 'Cnpj',
        ];
    }

    /**
     * Gets query for [[ProfissionaisClinicas]].
     *
     * @return \yii\db\ActiveQuery
     */

    /**
     * Gets query for [[Profissionals]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProfissionals()
    {
        return $this->hasMany(Profissional::className(), ['id' => 'profissional_id'])
            ->viaTable('profissionais_clinicas', ['clinica_id' => 'id']);
    }
}
