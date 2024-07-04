<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\Profissionais $model */

$this->title = 'Create Profissionais';
$this->params['breadcrumbs'][] = ['label' => 'Profissionais', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="profissionais-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
