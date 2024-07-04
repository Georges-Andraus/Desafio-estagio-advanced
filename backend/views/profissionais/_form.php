<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\Clinicas;

/** @var yii\web\View $this */
/** @var backend\models\Profissionais $model */
/** @var yii\widgets\ActiveForm $form */

$clinicas = ArrayHelper::map(Clinicas::find()->all(), 'id', 'nome');

?>

<div class="profissionais-form">

    <?php 
 
    
    
    
    $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'conselho')->dropDownList([ 'CRM' => 'CRM', 'CRO' => 'CRO', 'CRN' => 'CRN', 'COREN' => 'COREN', ], ['prompt' => 'Selecione o conselho']) ?>

    <?= $form->field($model, 'nome')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'numero_conselho')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nascimento')->Input('date') ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->dropDownList([ 'ativo' => 'Ativo', 'inativo' => 'Inativo', ], ['prompt' => 'Status']) ?>

    <?= $form->field($model, 'clinicas')->listBox($clinicas, ['multiple' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
