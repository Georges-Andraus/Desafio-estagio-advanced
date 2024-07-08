<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\Profissionais $model */

$this->title = 'Novo Profissional';
$this->params['breadcrumbs'][] = ['label' => 'Profissionais', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="profissionais-create">

    <div class="rectangle">
        <?= Html::encode($this->title) ?>
        <?= Html::a('Cancelar', ['index'], ['class' => 'btn btn-danger btn-cancel']) ?>
    </div>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

<style>
    body{
        font-family: Arial, sans-serif;
        background-color: #f8f9fa;
    }
    .rectangle {
        background-color: #FFFFFF;

        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px; /* Adicione margem inferior para separar do formulário */
    }

    .rectangle h2 {
        margin: 0;
    }

    .btn-cancel {
        padding: 5px 10px;
        /* Estilo Bootstrap para botão vermelho */
    }
    
</style>
