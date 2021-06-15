<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\modules\admin\models\Order;
use app\modules\admin\models\OrderItems;
/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Order */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Orders', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="order-view">

    <h1>View order #<?= $model->id; ?></h1>

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
            'created_at',
            'updated_at',
            'qty',
            'sum',
            [
                    'attribute'=>'status',
                'value'=>$model->status ? "<span class='text-success'>nonactive</span>" : '<span class="text-danger">active</span>',
                'format'=>'html'
],
//            'status',
            'name',
            'email:email',
            'phone',
            'address',
        ],
    ]) ?>

    <?php $items = $model->orderItems;?>
    <div class="table-responsive">
        <table class="table table-hover table-striped">
            <thread>
                <tr>
                    <td>Name</td>
                    <td>Quantity</td>
                    <td>Price</td>
                    <td>Sum</td>
                </tr>
            </thread>
            <tbody>
            <?php foreach ($items as $item):?>
                <tr>
                    <td><a href="<?= \yii\helpers\Url::to(['/product/view', 'id'=>$item->product_id])?>"><?= $item['name']?></a></td>
                    <td><?= $item['qty_item']?></td>
                    <td><?= $item['price']?></td>
                    <td><?= $item['sum_item']?></td>
                </tr>
            <?php endforeach;?>
            </tbody>
        </table>
    </div>

</div>
