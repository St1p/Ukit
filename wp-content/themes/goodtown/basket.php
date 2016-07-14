<?php
/* Template Name: Basket */
?>

<?php get_header(); ?>
<div class="container">
  <div class="row ">
    <div class="col-xs-12 col-sm-12 col-md-12 ">


      <form id="sendForm"  onsubmit="saveProductInDB()">
        <legend>Заповніть форму</legend>
        <label for="name">Імя:</label>
        <input  name="name"  type="text">
        <label for="email">Email:</label>
        <input name="email"  type="text">
        <label for="email">Телефон:</label>
        <input name="phone"  type="text">
      
      </form>
      
    <div class="content-block">
  <h2>Корзина Продуктів</h2>
  <div class="table-block basket-content">

    <div class="row-block">
      <div class="cell-block">
        <label  >Назва товару</label>
      </div>
      <div class="cell-block">
        <label >Ціна</label>
      </div>
      <div class="cell-block">
        <label  >Тара товару</label>
      </div>
      <div class="cell-block">
        <label ></label>
      </div>
    </div>

  </div>

  <div class="table-block">

    <div class="row-block">
      <div class="cell-block">
        <label  >До сплати </label>
      </div>
      <div class="cell-block">
        <label id="totalPrice"></label>
      </div>
      <div class="cell-block">
        <button type='button' onclick='location.href="/product"'>Продовжити замовлення</button>
      </div>
      <div class="cell-block">
        <button type='button' onclick='saveProductInDB()'>Замовити</button>
      </div>
    </div>
  </div>

</div>
      </div>
  </div>
</div>

      

<?php get_footer(); ?>




