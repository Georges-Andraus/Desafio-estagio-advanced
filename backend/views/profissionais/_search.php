<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\models\ProfissionaisSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="profissionais-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'conselho') ?>

    <?= $form->field($model, 'nome') ?>

    <?= $form->field($model, 'numero_conselho') ?>

    <?= $form->field($model, 'nascimento') ?>

    <?php // echo $form->field($model, 'email') ?>

    <?php // echo $form->field($model, 'status') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
