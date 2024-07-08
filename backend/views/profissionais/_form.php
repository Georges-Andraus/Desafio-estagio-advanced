<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\Clinicas;
use kartik\select2\Select2;

/** @var yii\web\View $this */
/** @var backend\models\Profissionais $model */
/** @var yii\widgets\ActiveForm $form */

$clinicas = ArrayHelper::map(Clinicas::find()->all(), 'id', 'nome');

?>

<div class="profissionais-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-md-4">
            <?= $form->field($model, 'conselho')->dropDownList([ 
                'CRM' => 'CRM', 
                'CRO' => 'CRO', 
                'CRN' => 'CRN', 
                'COREN' => 'COREN', 
            ], ['prompt' => 'Selecione o conselho']) ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'nome')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'numero_conselho')->textInput(['maxlength' => true]) ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <?= $form->field($model, 'nascimento')->Input('date') ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'ativo')->dropDownList([ 
                'sim' => 'sim', 
                'nao' => 'nao', 
            ], ['prompt' => 'Status']) ?>
        </div>
    </div>

    <div class="row">
       <div class="col-md-12">
            <?= $form->field($model, 'clinicas')->widget(Select2::classname(), [
                'data' => $clinicas,
                'options' => ['placeholder' => 'Selecione as clínicas ...', 'multiple' => true],
                'pluginOptions' => [
                    'allowClear' => true,
                    'tags' => true,
                ],
            ]); ?>
        </div>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
