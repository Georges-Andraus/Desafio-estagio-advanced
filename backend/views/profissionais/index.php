<?php

use backend\models\Profissionais;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var backend\models\ProfissionaisSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Profissionais';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="profissionais-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Profissionais', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Vincular clinica', ['clinicas/create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'conselho',
            'nome',
            'numero_conselho',
            //'email:email',
            'status',
            [
                'attribute' => 'nascimento',
                'value' => function ($model) {
                    return Yii::$app->formatter->asDate($model->nascimento, 'dd-MM-yyyy'); // Formatando a data
                }
            ],
            [
                'label' => 'Clínicas',
                'value' => function ($model) {
                    $clinicas = [];
                    foreach ($model->clinicas as $clinica) {
                        $clinicas[] = $clinica->nome;
                    }
                    return implode(', ', $clinicas);
                   
                }
            ],
            
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Profissionais $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>

</div>
