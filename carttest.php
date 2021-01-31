<script>
function calculateValues(e) {
  console.log("recalc");
  let item = $('#numberCol');
  let itemCount = Math.round(item.val());
  item.val(itemCount);
  let total = $("#primaryTotal");
  let price = total.find(".price");
  let priceValue = price.data("price") * 1;
  let totalValue = priceValue * itemCount;
  price.text(totalValue.toFixed(2));
 // console.log("recalc val", priceValue, itemCount, totalValue);

}
$(function() {
  //setup a fake value remove for real code
  $("#primaryTotal").find(".price").data("price", 123.45);
  $("#btnMinus").add("#btnPlus").on('click', function(e) {
    //console.log('plus minus', this.id);
    let num = $('#numberCol');
    let numValue = Math.round(num.val()) * 1;
    if (numValue < num.attr("min")) {
      numValue = num.attr("min") * 1;
      num.val(Math.round(numValue));
    }
    if (numValue > num.attr("max")) {
      numValue = num.attr("max") * 1;
      num.val(Math.round(numValue));
    }
    if (this.id === "btnMinus") {
      numValue--;
    } else {
      numValue++;
    }
    num.val(numValue).trigger('change');
   // console.log('plus minus val', numValue);
    //calculateValues(e);
  });
  $("#numberCol").on('change', calculateValues);
});
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<table id="mytable">
  <tbody>
    <td class="cart-qty nostretch text-center">
      <div class="spinner" data-addclass-on-smdown="spinner-sm">
        <button type="button" class="btn btn-icon rounded-circle" id="btnMinus"><i data-feather="minus"></i>-</button>
        <input type="number" class="form-control" value="1" min="1" max="999" id="numberCol" />
        <button type="button" class="btn btn-icon rounded-circle" id="btnPlus"><i data-feather="plus"></i>+</button>
      </div>
    </td>
    <td class="cart-price text-right">
      <span class="roboto-condensed bold" id="primaryTotal"><span>Rs:</span><span class="price" data-price="@item.ItemPrice">@item.ItemPrice</span>
    </td>
  </tbody>
</table>