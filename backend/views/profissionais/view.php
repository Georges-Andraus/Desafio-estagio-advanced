<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var backend\models\Profissionais $model */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Profissionais', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="profissionais-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'conselho',
            'nome',
            'numero_conselho',
            'nascimento',
            'email:email',
            'status',
            'clinicas.nome',
            
        ],
    ]) ?>

</div>
<h2>Clínicas Associadas</h2>
    <ul>
        <?php foreach ($model->clinicas as $clinicas): ?>
            <li>
                <?= Html::encode($clinicas->nome) ?>
                <?= Html::a('Excluir', ['profissional/delete-clinica', 'id' => $model->id, 'clinica_id' => $clinica->id], [
                    'class' => 'btn btn-danger btn-xs',
                    'data' => [
                        'confirm' => 'Você tem certeza que deseja excluir esta clínica associada a este profissional?',
                        'method' => 'post',
                    
                    ],
                ]) ?>
            </li>
        <?php endforeach; ?>
    </ul>
</div>