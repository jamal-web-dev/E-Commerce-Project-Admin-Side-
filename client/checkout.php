<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Checkout Page.</title>
  <link rel="stylesheet" href="css/checkout.css">
</head>
<body>
  <main>
    <h1>Checkout Now!</h1>
    <section class="container">
      <form action="">
        <label for="">Contact</label>
        <input type="email" placeholder="Email Address *">
        <label for="" class="m-20">Billing Details</label>
        <div class="box">
          <input type="text" placeholder="First Name">
          <input type="text" placeholder="Last Name">
        </div>
        <input type="text" placeholder="House number and street name *">
        <div class="box">
          <input type="text" placeholder="Town">
          <input type="tel" placeholder="Phone">
        </div>
        <label for="" class="m-20">Additional Information</label>
        <textarea name="" id="" placeholder="Note about your order"></textarea>
        <label for="" class="m-20">Payment Method</label>
        <p>Sorry, it seems that there are no available payment methods for your state. Please contact us if you require assistance or wish to make alternate arrangements.</p>
        <input type="submit" value="Place Order" class="order-btn m-20" >
      </form>
      <div class="products">
        <ul>
          <li>
            <div class="name-img">
              <img src="images/frozen-chicken-wings.jpg" alt="">
              <h3>36" Side-by-Side Refrigerator and Freezer with 25 Cubic Ft. Total Capacity, Black</h3>
            </div>
            <strong><em>$749.00</em></strong>
          </li>
          <li>
            <div class="name-img">
              <img src="images/frozen-chicken-wings.jpg" alt="">
              <h3>36" Side-by-Side Refrigerator and Freezer with 25 Cubic Ft. Total Capacity, Black</h3>
            </div>
            <strong><em>$749.00</em></strong>
          </li>
        </ul>
        <div class="total m-20">
          Total
          <span>$749.00</span>
        </div>
      </div>
    </section>
  </main>
</body>
</html>