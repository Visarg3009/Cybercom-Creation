<?php $paymentMethods = $this->getPaymentMethods();?>
<?php $shippingMethods = $this->getShippingMethods();?>
<?php $billingAddress = $this->getBillingAddress();?>
<?php $shippingAddress = $this->getShippingAddress();?>
<?php $cart = $this->getCart();?>

<div class="shadow p-3 mb-5 bg-white rounded">
    <div class="h2 text-center mb-1" >
        <p>CheckOut Page</p>
    </div>
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <form action="" method="POST" id="addressGrid" enctype="multipart/form-data" novalidate>
                <table class="table" width=100%>
                    <tbody>
                        <tr>
                            <td>
                                <table border="1" height="500px" class="table">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th colspan="2" scope="col">Billing Address</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Address</td>
                                            <td><input name="billing[address]" type="text" class="disable1" id="address" value="<?php echo $billingAddress->address ?>"></td>
                                        </tr>
                                        <tr>
                                            <td>City</td>
                                            <td><input name="billing[city]" class="disable1" id="city" value="<?php echo $billingAddress->city ?>" type="text"></td>
                                        </tr>
                                        <tr>
                                            <td>State</td>
                                            <td><input name="billing[state]" class="disable1" id="state" value="<?php echo $billingAddress->state ?>" type="text"></td>
                                        </tr>
                                        <tr>
                                            <td>Country</td>
                                            <td><input name="billing[country]" class="disable1" id="country" value="<?php echo $billingAddress->country ?>" type="text"></td>
                                        </tr>
                                        <tr>
                                            <td>ZipCode</td>
                                            <td><input name="billing[zipcode]" class="disable1" id="zipCode" value="<?php echo $billingAddress->zipcode ?>" type="text"></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <a onclick="mage.setform('#addressGrid').setUrl('<?php echo $this->getUrl()->getUrl('saveBilling', 'customer\Cart\CheckOut') ?>').load()" class="btn btn-outline-secondary" href="javascript:void(0)">Save</a>
                                            </td>
                                            <td>
                                                <input class="ml-auto" name="bookAddressBilling" value="1" type="checkbox">
                                                <label for="save">save to address book</label>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                            <td>
                                <table border="1" height="500px" class="table">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th colspan="2" scope="col">Shipping Address</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Same as Billing</td>
                                            <td><input value="1" name="sameAsBilling" type="checkbox"></td>
                                        </tr>
                                        <tr>
                                            <td>Address</td>
                                            <td><input name="shipping[address]" type="text" class="disable" id="address" value="<?php echo $shippingAddress->address ?>"></td>
                                        </tr>
                                        <tr>
                                            <td>City</td>
                                            <td><input name="shipping[city]" class="disable" id="city" value="<?php echo $shippingAddress->city ?>" type="text"></td>
                                        </tr>
                                        <tr>
                                            <td>State</td>
                                            <td><input name="shipping[state]" class="disable" id="state" value="<?php echo $shippingAddress->state ?>" type="text"></td>
                                        </tr>
                                        <tr>
                                            <td>Country</td>
                                            <td><input name="shipping[country]" class="disable" id="country" value="<?php echo $shippingAddress->country ?>" type="text"></td>
                                        </tr>
                                        <tr>
                                            <td>ZipCode</td>
                                            <td><input name="shipping[zipcode]" class="disable" id="zipcode" value="<?php echo $shippingAddress->zipcode ?>" type="text"></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <a onclick="mage.setform('#addressGrid').setUrl('<?php echo $this->getUrl()->getUrl('saveShipping', 'customer\Cart\CheckOut') ?>').load()" class="btn btn-outline-secondary" href="javascript:void(0)">Save</a>
                                            </td>
                                            <td>
                                                <input class="ml-auto" name="bookAddressShipping" value="1" type="checkbox">
                                                <label for="save">save to address book</label>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <table border="1" class="table">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th colspan="2" scope="col">Payment Method</th>
                                        </tr>
                                        <tr>
                                            <td><b>Select</b></td>
                                            <td><b>Name</b></td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (!$paymentMethods): ?>
                                            <tr>
                                                <td colspan="2">No Payment Method Available</td>
                                            </tr>
                                        <?php else: ?>
                                            <?php foreach ($paymentMethods->getData() as $paymentMethod): ?>
                                                <tr>
                                                    <td><input name="paymentMethod" type="radio" value="<?php echo $paymentMethod->method_Id ?>" <?php if ($cart->paymentMethodId == $paymentMethod->method_Id): ?> checked <?php endif;?>></td>
                                                    <td><?php echo $paymentMethod->name ?></td>
                                                </tr>
                                            <?php endforeach;?>
                                        <?php endif;?>
                                        <tr>
                                            <td colspan="2">
                                                <a onclick="mage.setform('#addressGrid').setUrl('<?php echo $this->getUrl()->getUrl('savePaymentMethod', 'customer\Cart\CheckOut') ?>').load()" class="btn btn-outline-secondary" href="javascript:void(0)">Save</a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                            <td>
                                <table border="1" class="table">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th colspan="3" scope="col">Shipping Method</th>
                                        </tr>
                                        <tr>
                                            <td><b>Select</b></td>
                                            <td><b>Name</b></td>
                                            <td><b>Amount</b></td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (!$shippingMethods): ?>
                                            <tr>
                                                <td colspan="2">No Shipment Method Available</td>
                                            </tr>
                                        <?php else: ?>
                                            <?php foreach ($shippingMethods->getData() as $shippingMethod): ?>
                                                <tr>
                                                    <td><input name="shippingMethod" type="radio" value="<?php echo $shippingMethod->method_Id ?>" <?php if ($cart->shippingMethodId == $shippingMethod->method_Id): ?> checked <?php endif;?>></td>
                                                    <td><?php echo $shippingMethod->name ?></td>
                                                    <td><?php echo $shippingMethod->amount ?></td>
                                                </tr>
                                            <?php endforeach;?>
                                        <?php endif;?>
                                        <tr>
                                            <td colspan="3">
                                                <a onclick="mage.setform('#addressGrid').setUrl('<?php echo $this->getUrl()->getUrl('saveShippingMethod', 'customer\Cart\CheckOut') ?>').load()" class="btn btn-outline-secondary" href="javascript:void(0)">Save</a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <table border="1" class="table">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th colspan="2" scope="col">Billing Details</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><b>Base Total</b></td>
                                            <td><?php echo $this->getBaseTotal(); ?></td>
                                        </tr>
                                        <tr>
                                            <td><b>Shipping Charges</b></td>
                                            <td><?php echo $this->getShippingCharges(); ?></td>
                                        </tr>
                                        <tr>
                                            <td><b>Grand Total</b></td>
                                            <td><?php echo $this->getShippingAmount(); ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <a class="btn btn-success" href="<?php echo $this->getUrl()->getUrl('placeOrder','customer\Cart\Order',['id'=>$cart->cartId]); ?>">Place Order</a>
                <!-- <a class="btn btn-success" onclick="mage.setUrl('<?php //echo $this->getUrl()->getUrl('placeOrder','customer\Cart\Order',['id'=>$cart->cartId]); ?>').load();" href="javascript:void(0);">Place Order</a> -->
            </form>
        </div>
    </div>
</div>

<script type="text/javascript">
    function function1() {
        var elements = document.getElementsByClassName('disable');
        $(elements).each(function(i, element) {
            if (element.disabled) {
                // element.value = document.getElementById(element.id).value;
                element.disabled = false;
            } else {
                // element.value = document.getElementById(element.id).value;
                element.disabled = true;
            }
        })
    };
</script>