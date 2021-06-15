<div class="table-responsive">
        <table class="table table-hover table-striped">
            <thread>
                <tr>
                    <td>Photo</td>
                    <td>Name</td>
                    <td>Quantity</td>
                    <td>Price</td>
                </tr>
            </thread>
            <tbody>
            <?php foreach ($session['cart'] as $id=>$item):?>
                <tr>
                    <td><?= \yii\helpers\Html::img("@web/images/products/{$item['img']}", ['alt'=>$item['img'], 'height' => '50px'])?></td>
                    <td><a href="#"><?= $item['name']?></a></td>
                    <td><?= $item['qty']?></td>
                    <td><?= $item['price']?></td>
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