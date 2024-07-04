<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\Profissionais $model */

$this->title = 'Update Profissionais: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Profissionais', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="profissionais-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
