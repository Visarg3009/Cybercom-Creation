<?php $cartItems = $this->getCart()->getItems();?>
<?php $cart = $this->getCart()?>
<section id="cart-view">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="cart-view-area">
          <div class="cart-view-table">
          <form action="" id="updateCart" method="post">
            <input type="button" class="btn btn-warning m-3 float-right" onclick="mage.setform('#updateCart').setUrl('<?php echo $this->getUrl()->getUrl('updateCart','customer\Cart'); ?>').load();" href="javascript:void(0);" value="UPDATE">
              <div class="table-responsive">
                <table class="table">
                    <thead>
                      <tr>
                      <!-- <th>Item ID</th> -->
                      <th>Remove</th>
                      <th>Product</th>
                      <th>Product-Name</th>
                      <th>Price</th>
                      <th>Quantity</th>
                      <th>Discount</th>
                      <th>Total</th>
                      </tr>
                    </thead>
                    <?php if($cartItems) : ?>       
                    <?php foreach ($cartItems->data as $key=>$item) {?>
                    <?php $product = $this->getProduct($item->productId);?>
                    <tbody>
                      <tr>
                        <td><a class="remove" onclick="mage.setUrl('<?php echo $this->getUrl()->getUrl('delete','customer\Cart',['id'=>$item->cartItemId]); ?>').load();" href="javascript:void(0);"><fa class="fa fa-close"></fa></a></td>
                        <td><a href="<?= $this->getUrl()->getUrl('view','ProductDetail',['id'=>$product->product_id]);?>"><img src="./Images/Product/<?= $product->image_name?>" alt="img"></a></td>
                        <td><a class="aa-cart-title" href="<?= $this->getUrl()->getUrl('view','ProductDetail',['id'=>$product->product_id]);?>"><?= $product->name?></a></td>
                        <td> <?php echo $item->price;?> </td>
                        <td> <input class="aa-cart-quantity" type="text" name="item[<?php echo $item->cartItemId ?>]" value="<?php echo $item->quantity; ?>"> </td>
                        <td> <?php echo $item->discount * $item->quantity; ?> </td>
                        <td> <?php echo ($item->quantity * $item->basePrice)- ($item->quantity * $item->discount); ?> </td>
                      </tr>
                    <?php } ?>
                    <?php else : ?>
                      <tr>
                        <td colspan="7">NO RECORDS FOUND!!!</td>
                      </tr>
                    <?php endif; ?>
                    </tbody>
                  </table>
                </div>
             </form>
             <?php if($cartItems) : ?>   
             <!-- Cart Total view -->
             <div class="cart-view-total">
               <h4>Cart Totals</h4>
               <table class="aa-totals-table">
                 <tbody>
                 
                   <tr>
                     <th>Subtotal</th>
                      <td><?php echo $item->quantity * $item->basePrice; ?></td>
                   </tr>
                   <tr>
                     <th>Total</th>
                     <td><?php echo ($item->quantity * $item->basePrice)- ($item->quantity * $item->discount); ?></td>
                   </tr>
                   
                 </tbody>
               </table>
               <a href="<?php echo $this->getUrl()->getUrl('checkOut','customer\Cart\Checkout',null,true); ?>" class="aa-cart-view-btn">Proced to Checkout</a>
             </div>
             <?php endif; ?>
           </div>
         </div>
       </div>
     </div>
   </div>
</section>