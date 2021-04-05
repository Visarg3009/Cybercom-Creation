<?php 
if ($this->validCustomer()) {
    $customer_address = $this->getAddresses();
    $billing = $customer_address[0];
    $shipping = $customer_address[1];
?>

<div class="container mt-20">
    <h3><?php echo $this->getTitle();?></h3>
    <hr>
      <form method="post" id="addressForm" action="<?php echo $this->getFormUrl();?>">

        <h4>Billing</h4>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputAddress">Address</label>
                <input type="text" class="form-control" name="billing[Address]" value="<?php echo $billing->Address; ?>">
            </div>
            <div class="form-group col-md-6">
                <label for="inputCity">City</label>
                <input type="text" class="form-control" name="billing[City]" value="<?php echo $billing->City; ?>">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="State">State</label>
                <select class="form-control" name="billing[State]" value="<?php echo $billing->State; ?>">
                    <option value="">Select</option>
                    <option value="Gujarat">Gujarat</option>
                    <option value="Maharastra">Maharastra</option>
                    <option value="Rajasthan">Rajasthan</option>
                    <option value="Himachal">Himachal</option>
                </select>
            </div>
            <div class="form-group col-md-2">
                <label for="inputZip" class="form-label">ZipCode</label>
                <input type="text" class="form-control" name="billing[ZipCode]" value="<?php echo $billing->ZipCode; ?>">
            </div>
            <div class="form-group col-md-4">
                <label for="Country">Country</label>
                <select class="form-control" name="billing[Country]" value="<?php echo $billing->Country; ?>">
                    <option value="">Select</option>
                    <option value="India">India</option>
                    <option value="US">US</option>
                    <option value="Canada">Canada</option>
                    <option value="China">China</option>
                </select>
            </div>
        </div><hr>

        <h4>Shipping</h4>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputAddress">Address</label>
                <input type="text" class="form-control" name="shipping[Address]" value="<?php echo $shipping->Address; ?>">
            </div>
            <div class="form-group col-md-6">
                <label for="inputCity">City</label>
                <input type="text" class="form-control" name="shipping[City]" value="<?php echo $shipping->City; ?>">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="State">State</label>
                <select class="form-control" name="shipping[State]" value="<?php echo $shipping->State; ?>">
                    <option value="">Select</option>
                    <option value="Gujarat">Gujarat</option>
                    <option value="Maharastra">Maharastra</option>
                    <option value="Rajasthan">Rajasthan</option>
                    <option value="Himachal">Himachal</option>
                </select>
            </div>
            <div class="form-group col-md-2">
                <label for="inputZip" class="form-label">ZipCode</label>
                <input type="text" class="form-control" name="shipping[ZipCode]" value="<?php echo $shipping->ZipCode; ?>">
            </div>
            <div class="form-group col-md-4">
                <label for="Country">Country</label>
                <select class="form-control" name="shipping[Country]" value="<?php echo $shipping->Country; ?>">
                    <option value="">Select</option>
                    <option value="India">India</option>
                    <option value="US">US</option>
                    <option value="Canada">Canada</option>
                    <option value="China">China</option>
                </select>
            </div>
        </div>

        <div class="form-row">
          <button type="button" name="save" onclick="mage.setform('#addressForm').load()"  class="btn btn-success">ADD/UPDATE CUSTOMER-ADDRESS</button>
        </div>
      </form>
      <?php } else {?>
      <?php echo "Register First"; }?>
    </div>
</div>