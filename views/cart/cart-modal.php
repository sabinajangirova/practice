<?php if (!empty($session['cart'])): ?>
    <div class="table-responsive">
        <table class="table table-hover table-striped">
            <thread>
                <tr>
                    <td>Photo</td>
                    <td>Name</td>
                    <td>Quantity</td>
                    <td>Price</td>
                    <td ><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></td>
                </tr>
            </thread>
            <tbody>
                <?php foreach ($session['cart'] as $id=>$item):?>
                <tr>
                    <td><?= \yii\helpers\Html::img($item['img'], ['alt'=>$item['img'], 'height' => '50px'])?></td>
                    <td><a href="#"><?= $item['name']?></a></td>
                    <td><?= $item['qty']?></td>
                    <td><?= $item['price']?></td>
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
<?php else:?>
    <h3>The cart is empty</h3>
<?php endif; ?>