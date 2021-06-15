<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
?>

<?php if (Yii::$app->session->has('success')): ?>
    <div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="close">
            <span aria-hidden="true">&times;</span>
        </button>
        <?php echo Yii::$app->session->getFlash('success');?>
    </div>
<?php endif; ?>

<?php if (Yii::$app->session->has('error')): ?>
    <div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="close">
            <span aria-hidden="true">&times;</span>
        </button>
        <?php echo Yii::$app->session->getFlash('error');?>
    </div>
<?php endif; ?>

<div class="container">
    <?php if (!empty($session['cart'])): ?>
        <div class="table-responsive">
            <table class="table table-hover table-striped">
                <thread>
                    <tr>
                        <td>Photo</td>
                        <td>Name</td>
                        <td>Quantity</td>
                        <td>Price</td>
                        <td>Sum</td>
                        <td ><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></td>
                    </tr>
                </thread>
                <tbody>
                <?php foreach ($session['cart'] as $id=>$item):?>
                    <tr>
                        <td><?= \yii\helpers\Html::img($item['img'], ['alt'=>$item['img'], 'height' => '50px'])?></td>
                        <td><a href="<?= Url::to(['product/view', 'id'=>$id])?>"><?= $item['name']?></a></td>
                        <td><?= $item['qty']?></td>
                        <td><?= $item['price']?></td>
                        <td><?= $item['qty']*$item['price']?></td>
                        <td><span data-id="<?= $id?>" class="glyphicon glyphicon-remove text-danger del-item" aria-hidden="true"></span></td>
                    </tr>
                <?php endforeach;?>
                <tr>
                    <td colspan="4">Overall: </td>
                    <td><?= $session['cart.qty']?></td>
                </tr>
                <tr>
                    <td colspan="4">Overall sum: </td>
                    <td><?= $session['cart.sum']?></td>
                </tr>
                </tbody>
            </table>
        </div>
        <hr/>
    <?php $form = ActiveForm::begin() ?>
    <?= $form->field($order, 'name')?>
    <?= $form->field($order, 'email')?>
    <?= $form->field($order, 'phone')?>
    <?= $form->field($order, 'address')?>
    <?= Html::submitButton('Send order', ['class'=>'btn btn-success'])?>

        <?php ActiveForm::end() ?>
    <?php else:?>
        <h3>The cart is empty</h3>
    <?php endif; ?>
</div>
