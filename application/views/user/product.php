<? foreach($products as $product){?>
    <div class="card mb-3">
  <img class="card-img-top" src="..." alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title"><?=$product->name_product?></h5>
    <p class="card-text"><?=$product->description_product?></p>
    <p class="card-text"><?=$product->price_product?>€</p>
    <p class="card-text"><small class="text-muted"></small></p>
  </div>
</div>
<?}?>