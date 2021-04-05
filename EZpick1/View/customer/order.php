Order Placed!!
<?php /*
<?php $order = $this->getOrder(); ?>
<?php $orderItems = $this->getItems($order->orderId); ?>
<?php $orderAddresses = $this->getAddresses($order->orderId); ?>

<div class="container">
    <h3>Order Details</h3>
    <hr>
    <table class="table table-striped table-hover table-bordered">
        <thead>
            <tr class="bg-dark text-white text-center">
                <th>OrderId</th>
                <th>CustomerName</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($order) :?>
            <tr>
                <td><?= $order->orderId;?></td>
                <td><?= $order->customerName;?></td>
                <td><?= $order->Email;?></td>
            </tr>
            <?php endif;?>
        </tbody>
    </table>

    <table class="table table-striped table-hover table-bordered">
        <thead>
            <tr class="bg-dark text-white text-center">
                <th>Payment-Method Name</th>
                <th>Shipping-Method Name</th>
                <th>Shipping-Method Code</th>
                <th>Shipping Charges</th>
                <th>Total Amount</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($order) :?>
            <tr>
                <td><?= $order->paymentMethodName;?></td>
                <td><?= $order->shippingMethodName;?></td>
                <td><?= $order->shippingMethodCode;?></td>
                <td><?= $order->shippingCharges;?></td>
                <td><?= $order->shippingAmount;?></td>
            </tr>
            <?php endif;?>
        </tbody>
    </table><br><br>

    <h3>Ordered Item Details</h3>
    <hr>
    <table class="table table-striped table-hover table-bordered">
        <thead>
            <tr class="bg-dark text-white text-center">
                <th>SKU</th>
                <th>Product-Name</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Discount</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($order) :?>
            <tr>
                <td><?= $order->paymentMethodName;?></td>
                <td><?= $order->shippingMethodName;?></td>
                <td><?= $order->shippingMethodCode;?></td>
                <td><?= $order->shippingCharges;?></td>
                <td><?= $order->shippingAmount;?></td>
            </tr>
            <?php endif;?>
        </tbody>
    </table>
</div>*/ ?>