<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\Clinicas $model */

$this->title = 'Update Clinicas: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Clinicas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="clinicas-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
