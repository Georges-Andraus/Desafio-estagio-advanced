<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\Clinicas $model */

$this->title = 'Create Clinicas';
$this->params['breadcrumbs'][] = ['label' => 'Clinicas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="clinicas-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
