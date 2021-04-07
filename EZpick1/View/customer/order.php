<?php $order = $this->getOrder(); ?>
<?php $orderItems = $this->getItems($order->orderId); ?>
<?php $orderAddresses = $this->getAddresses($order->orderId); ?>

<div class="container">
    <h3>Order Details :</h3>
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
                <td><?= $order->email;?></td>
            </tr>
            <?php endif;?>
        </tbody>
    </table><br>

    <h3>Order Payment-Shipping Method Details :</h3>
    <hr>
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
    </table><br>

    <h3>Ordered Item Details :</h3>
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
            <?php if ($orderItems) :?>
            <?php foreach ($orderItems->getData() as $key => $orderItem) :?>
            <tr>
                <td><?= $orderItem->sku;?></td>
                <td><?= $orderItem->name;?></td>
                <td><?= $orderItem->basePrice;?></td>
                <td><?= $orderItem->quantity;?></td>
                <td><?= $orderItem->discount;?></td>
                <td><?= $orderItem->Total;?></td>
            </tr>
            <?php endforeach; ?>
            <?php endif;?>
        </tbody>
    </table><br>

    <h3>Ordered Address Details :</h3>
    <hr>
    <table class="table table-striped table-hover table-bordered">
        <thead>
            <tr class="bg-dark text-white text-center">
                <th>Address-Type</th>
                <th>Address</th>
                <th>City</th>
                <th>State</th>
                <th>Country</th>
                <th>ZipCode</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($orderAddresses) :?>
            <?php foreach ($orderAddresses->getData() as $key => $orderAddress) :?>
            <tr>
                <td><?= $orderAddress->addressType;?></td>
                <td><?= $orderAddress->address;?></td>
                <td><?= $orderAddress->city;?></td>
                <td><?= $orderAddress->state;?></td>
                <td><?= $orderAddress->country;?></td>
                <td><?= $orderAddress->zipcode;?></td>
            </tr>
            <?php endforeach; ?>
            <?php endif;?>
        </tbody>
    </table><br>
</div>