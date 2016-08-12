<?php
/* Template Name: Products */
?>


<?php get_header(); ?>
<div class="modal fade modal-order" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <div class="modal-header center">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h2 class="modal-title">Замовлення</h2>
      </div>

      <div class="modal-body">

        <div class="content-block">

          <div class="table-block">

            <div class="row-block">
              <div class="cell-block">
                <label >Виберіть тару:</label>
              </div>
              <div class="cell-block">
                <select  id="chooseProductValue" >
                  <option value="1">1 літр</option>
                  <option value="10">10 літр</option>
                  <option value="200">200 літр </option>
                  <option value="1000">1000 літр</option>
                </select>
              </div>
            </div>

            <div class="row-block">
              <div class="cell-block">
                <label  >Ціна за 1 літр:  </label>
              </div>
              <div class="cell-block" id="priceForLetters"></div>
            </div>

            <div class="row-block">
              <div class="cell-block">
                <label >Ціна за каністру: </label>
              </div>
              <div class="cell-block" id="priceForCanister"></div>
            </div>

            <div class="row-block">
              <div class="cell-block">
                <label >Ціна за бочку: </label>
              </div>
              <div class="cell-block" id="priceForBarrel"></div>
            </div>


            <div class="row-block">
              <div class="cell-block">
                <label >Ціна за контейнер:</label>
              </div>
              <div class="cell-block" id="priceForContainer"></div>
            </div>

            <div id="error-block" class="row-block ">
              <div class="cell-block">
                <p > Виберіть: </p >
              </div>
              <div class="cell-block">
                <p > Тару Продукту </p >
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
  <div id="product-block" class="min-height" >
    <div class="container ">
      <div class="row">
      <div class="col-xs-3 col-sm-3 col-md-3">

        <div class="spares-list ">
          <h4>
            <i class="fa fa-list"></i>
оберіть розділ</h4>
          <ul>
            <li><a onClick="productSelection('dobavki');">тротуарної плитки</a></li>
            <li><a onClick="productSelection('3');"> товарного бетону</a></li>
            <li><a onClick="productSelection('4');">Залізо-бетону</a></li>
            <li><a onClick="productSelection('barvniki');">Барвники</a></li>

          </ul>
        </div>

    </div>
      <div class="col-xs-9 col-sm-9 col-md-9">
        <div class="main-product ">

          <div class="presentation">
            <h2>Добавки до бетону</h2>
             <p> Наш інтернет-магазин добавок для бетону пропонує вам добавки в бетон останнього покоління.
Ми співпрацюємо  з польською компаніє ATLAS - це польський концерн
              до складу якого входять 16 виробничих підприємств , 5 власних копалень гіпсу,
              ангідриту та кварцевого піску. В концерні працює понад 2000 людей.
            </p>
            <ul><strong>Переваги, які ви получите при купівлі будівельних добавок компанії «UKIT»:</strong>
            <li>Противоморозные добавки в бетон – это возможность работы с
              бетоном при очень низких температурах – до -20°С!</li>
              <li>Добавки в растворы «Виртуоз» повышают однородность смесей, избавляют их от расслаивания.
Растворы приобретают пластичность, их проще укладывать.</li>
              <li> Конечные изделия не растрескиваются, имеют ровную, глянцевую поверхность.</li>

              </ul>
              <ol><strong>Добавки в бетон «UKIT» незаменимы:</strong>
              <li> При монолитном строительстве – возведении зданий любой этажности и форм.</li>
                <li> При изготовлении плитки и бетонных блоков.</li>
                <li> Перекрытий, ограждений, бордюров, столбов.</li>
                <li> Памятников и архитектурных элементов.</li>
              </ol>

          </div>
      </div>
      <!-- KO-919 -->
          <div class="dobavki">

              <?php
              $category = get_category_by_slug('products');
              $posts = get_posts( array('category' => $category->cat_ID));
              foreach($posts as $post) {
                  $my_post = get_post( $post->ID );
              ?>
            <div class="product-block clearfix">

              <div class="img-block">
                <span> <?php echo $my_post->post_title;  ?> </span>
                  <figure>
                      <?php echo get_the_post_thumbnail($post->ID); ?>
                  </figure>

              </div>
                <?php echo $my_post->post_content; ?>



              <div class="button-block">
                <button class="getProductName" data-toggle="modal" data-target=".modal-order" type='button'>Замовити</button>
               <!-- <button type='button' onClick='getMoreHeight("KO-919")'>Детальніше</button>-->
                <button type='button' class="getMoreHight">Детальніше</button>
              </div>
        </div>
              <?php }  ?>


       </div>

      <!-- END.KO-919 -->


      <div class="barvniki">
          <a href="">
            <div class="product-block">

              vvhgh

            </div></a>
          </div>

    </div>
  </div>
  </div>
</div>

<?php  get_footer(); ?>

