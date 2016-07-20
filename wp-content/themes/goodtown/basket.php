<?php
/* Template Name: Basket */
?>

<?php get_header(); ?>
<div class="container">
  <div class="row ">
    <div class="col-xs-12 col-sm-12 col-md-12 ">
      
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
        <button type='button' data-toggle="modal" data-target=".modal-order" >Замовити</button>
       <!-- <button type='button' onclick='saveProductInDB()'>Замовити</button>-->
      </div>
    </div>
  </div>

      <div class="modal fade modal-order" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">

            <div class="modal-header center">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h2 class="modal-title">Замовлення</h2>
            </div>

            <div class="modal-body">

              <div class="content-block">

                <div class="modal fade modal-order" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-lg">
                    <div class="modal-content">

                      <div class="modal-header center">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h2 class="modal-title">Заповніть форму</h2>
                      </div>

                      <div class="modal-body">

                        <div class="content-block purchase-form">

                          <form name="lol" id="sendForm" action="#">
                            <input type="text"    name="name" class="form-control"  placeholder="Імя">
                            <input type="email" name="email" class="form-control" pattern="^[a-zA-Z0-9_\.\-]+@(?:[a-zA-Z0-9\-]+\.)+[a-z]{2,4}$" placeholder="Email:">
                            <input type="tel" name="phone"  class="form-control" pattern="((09)|(06)|(05)|8|\+7|\+3)\d{7,10}$" placeholder="Телефон:">
                            <input type="submit" class="form-submit" value="Замовити">

                          </form>

                        </div>

                      </div>

                    </div>
                  </div>
                </div>

              </div>

            </div>

            <div class="modal-footer">
              <button  class="buttonclass" type="button" id="0" onclick="SaveDataInLocalStage()">Додати в корзину</button>
              <button type="button" onClick='location.href="/basket"'>Перейти в корзину</button>
            </div>

          </div>
        </div>
      </div>



</div>
      </div>
  </div>
</div>

      

<?php get_footer(); ?>




