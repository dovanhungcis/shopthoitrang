var qty = {};
var total_money = safe_money = 0;
function addCommas(nStr) {
  nStr += '';
  x = nStr.split('.');
  x1 = x[0];
  x2 = x.length > 1 ? '.' + x[1] : '';
  var rgx = /(\d+)(\d{3})/;
  while (rgx.test(x1)) {
    x1 = x1.replace(rgx, '$1' + '.' + '$2');
  }
  return x1 + x2;
}
function showCart() {

  $.ajaxSetup({
    headers : {
      'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
    }
  });
  $
      .ajax({
        type : 'post',
        url : '/sales/cart/showCart',
        data : {

        },
        success : function(data) {
          $('#cart_order').empty();
          $
              .each(
                  data,
                  function(i, f) {
                    qty[i] = f['quantity'];
                    total_money += f['price_sale'] * f['quantitiesOrder'];
                    safe_money += (f['price'] - f['price_sale'])
                        * f['quantitiesOrder'];
                    $('#cart_order')
                        .append(
                            "<div class='cart-sec simpleCart_shelfItem' id = 'item_product"
                                + i
                                + "'> "
                                + "<div class='cart-item cyc'>"
                                + "<img src='/admin1/assets/uploads/posts/"
                                + f['image']['photo']
                                + "' class='img-responsive' alt='' />"
                                + "</div>"
                                + "<div class='cart-item-info'>"
                                + "<h3>"
                                + "<span class='input-group-btn'>"
                                + "<button class='btn btn-secondary' type='button'>"
                                + f['product']['name']
                                + "</button>"
                                + "</span>"
                                + "</h3>"
                                + "<div class='col-lg-6'>"
                                + "<div class='input-group'>"
                                + "<span class='input-group-addon' id='basic-addon1'>Qty</span>"
                                + "<div class='input-group-addon' value = '-' onclick='add("
                                + f['id']
                                + ")'>+</div>"
                                + "<div class='input-group-addon' id='qty_order"
                                + i
                                + "'>"
                                + f['quantitiesOrder']
                                + "</div>"
                                + "<div class='input-group-addon'  value = '+' onclick='sub("
                                + f['id']
                                + ")'>-</div>"
                                + "</div>"
                                + "</div>"
                                + "<div class='col-lg-12 error_order' id = 'error_order"
                                + i
                                + "'>"
                                + "<div class='input-group'>"
                                + "<span class='input-group-addon' id='basic-addon1'>Bạn chỉ được mua tối đa "
                                + f['quantity']
                                + " sản phẩm.</span>"
                                + "</div>"
                                + "</div>"
                                + "<div class='col-lg-12 error_order_min' id = 'error_order_min"
                                + i
                                + "'>"
                                + "<div class='input-group'>"
                                + "<span class='input-group-addon' id='basic-addon1'>Bạn mua tối thiểu 1 sản phẩm.</span>"
                                + "</div>"
                                + "</div>"
                                + "<div class='input-group'>"
                                + "<br> <br> <span class='input-group-addon' id='basic-addon1'><s>"
                                + addCommas(f['price'])
                                + "₫</s> "
                                + addCommas(f['price_sale'])
                                + "₫</span>"
                                + "<div class = 'price_product_hidden'><span id = 'price"
                                + i
                                + "'>"
                                + f['price']
                                + "</span>₫</s> <span id = 'price_sale"
                                + i
                                + "'>"
                                + f['price_sale']
                                + "</span></div>"
                                + "<span class='input-group-addon' id='basic-addon1' onclick='cancel_order("
                                + i + ")'>Hủy</span>" + "</div>"
                                + "<div class='col-lg-8'>" + "<p>Color: "
                                + f['color']['color'] + "</p>" + "</div>"
                                + "<div class='col-lg-4'>" + "<p>Size: "
                                + f['product_sizes']['size'] + "</p>"
                                + "</div>" + "</div>"
                                + "<div class='clearfix'></div>" + "</div>"
                                + "<hr id = 'hr_product" + i + "'>");
                  });
          $("#total_money").empty();
          $("#total_money").append(addCommas(total_money + "₫"));
          $("#safe_money").empty();
          $("#safe_money").append(addCommas(safe_money) + "₫");
        }
      });
}
function add(id) {
  var qty_order = $("#qty_order" + id).text();
  var price = $("#price" + id).text();
  var price_sale = $("#price_sale" + id).text();
  if (qty_order < qty[id]) {
    $("#qty_order" + id).text(parseInt(qty_order) + 1);
    $('#error_order' + id).css('display', 'none');
    $('#error_order_min' + id).css('display', 'none');
    $("#total_money").empty();
    total_money = total_money + parseInt(price_sale);
    safe_money = safe_money + parseInt(price) - parseInt(price_sale);
    $("#total_money").empty();
    $("#total_money").append(addCommas(total_money + "₫"));
    $("#safe_money").empty();
    $("#safe_money").append(addCommas(safe_money) + "₫");
    var data = parseInt(qty_order) + 1;
    $.ajaxSetup({
      headers : {
        'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
      }
    });
    var key = $("#dataProduct").val();
    // console.log(key);
    $.ajax({
      type : 'post',
      url : '/sales/cart/changeCart',
      data : {
        "id" : id,
        "data" : parseInt(qty_order) + 1
      },
      success : function(data) {

      }
    });
  } else
    $('#error_order' + id).css('display', 'block');
}
function sub(id) {
  var qty_order = $("#qty_order" + id).text();
  var price = $("#price" + id).text();
  var price_sale = $("#price_sale" + id).text();
  if (qty_order > 1) {
    $("#qty_order" + id).text(parseInt(qty_order) - 1);
    $('#error_order' + id).css('display', 'none');
    $('#error_order_min' + id).css('display', 'none');
    total_money = total_money - parseInt(price_sale);
    safe_money = safe_money - parseInt(price) + parseInt(price_sale);
    $("#total_money").empty();
    $("#total_money").append(addCommas(total_money + "₫"));
    $("#safe_money").empty();
    $("#safe_money").append(addCommas(safe_money) + "₫");
    var data = parseInt(qty_order) - 1;
    $.ajax({
      type : 'post',
      url : '/sales/cart/changeCart',
      data : {
        "id" : id,
        "data" : parseInt(qty_order) - 1
      },
      success : function(data) {

      }
    });
  } else
    $('#error_order_min' + id).css('display', 'block');
}
function cancel_order(id) {
  $("#item_product" + id).css('display', 'none');
  $("#hr_product" + id).css('display', 'none');
  var qty_order = $("#qty_order" + id).text();
  var price = $("#price" + id).text();
  var price_sale = $("#price_sale" + id).text();
  total_money = total_money - parseInt(price_sale) * parseInt(qty_order);
  safe_money = safe_money - (parseInt(price) - parseInt(price_sale))
      * parseInt(qty_order);
  $("#total_money").empty();
  $("#total_money").append(addCommas(total_money + "₫"));
  $("#safe_money").empty();
  $("#safe_money").append(addCommas(safe_money) + "₫");

  $.ajax({
    type : 'post',
    url : '/sales/cart/cancelProduct',
    data : {
      "id" : id
    },
    success : function(data) {
      $("#number_order").empty();
      $("#number_order").append(data);
    }
  });
}

function showCart() {

  $.ajaxSetup({
    headers : {
      'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
    }
  });
  $
      .ajax({
        type : 'post',
        url : '/sales/cart/showCart',
        data : {

        },
        success : function(data) {
          $('#cart_order').empty();
          $
              .each(
                  data,
                  function(i, f) {
                    qty[i] = f['quantity'];
                    total_money += f['price_sale'] * f['quantitiesOrder'];
                    safe_money += (f['price'] - f['price_sale'])
                        * f['quantitiesOrder'];
                    $('#cart_order')
                        .append(
                            "<div class='cart-sec simpleCart_shelfItem' id = 'item_product"
                                + i
                                + "'> "
                                + "<div class='cart-item cyc'>"
                                + "<img src='/admin1/assets/uploads/posts/"
                                + f['image']['photo']
                                + "' class='img-responsive' alt='' />"
                                + "</div>"
                                + "<div class='cart-item-info'>"
                                + "<h3>"
                                + "<span class='input-group-btn'>"
                                + "<button class='btn btn-secondary' type='button'>"
                                + f['product']['name']
                                + "</button>"
                                + "</span>"
                                + "</h3>"
                                + "<div class='col-lg-6'>"
                                + "<div class='input-group'>"
                                + "<span class='input-group-addon' id='basic-addon1'>Qty</span>"
                                + "<div class='input-group-addon' value = '-' onclick='add("
                                + f['id']
                                + ")'>+</div>"
                                + "<div class='input-group-addon' id='qty_order"
                                + i
                                + "'>"
                                + f['quantitiesOrder']
                                + "</div>"
                                + "<div class='input-group-addon'  value = '+' onclick='sub("
                                + f['id']
                                + ")'>-</div>"
                                + "</div>"
                                + "</div>"
                                + "<div class='col-lg-12 error_order' id = 'error_order"
                                + i
                                + "'>"
                                + "<div class='input-group'>"
                                + "<span class='input-group-addon' id='basic-addon1'>Bạn chỉ được mua tối đa "
                                + f['quantity']
                                + " sản phẩm.</span>"
                                + "</div>"
                                + "</div>"
                                + "<div class='col-lg-12 error_order_min' id = 'error_order_min"
                                + i
                                + "'>"
                                + "<div class='input-group'>"
                                + "<span class='input-group-addon' id='basic-addon1'>Bạn mua tối thiểu 1 sản phẩm.</span>"
                                + "</div>"
                                + "</div>"
                                + "<div class='input-group'>"
                                + "<br> <br> <span class='input-group-addon' id='basic-addon1'><s>"
                                + addCommas(f['price'])
                                + "₫</s> "
                                + addCommas(f['price_sale'])
                                + "₫</span>"
                                + "<div class = 'price_product_hidden'><span id = 'price"
                                + i
                                + "'>"
                                + f['price']
                                + "</span>₫</s> <span id = 'price_sale"
                                + i
                                + "'>"
                                + f['price_sale']
                                + "</span></div>"
                                + "<span class='input-group-addon' id='basic-addon1' onclick='cancel_order("
                                + i + ")'>Hủy</span>" + "</div>"
                                + "<div class='col-lg-8'>" + "<p>Color: "
                                + f['color']['color'] + "</p>" + "</div>"
                                + "<div class='col-lg-4'>" + "<p>Size: "
                                + f['product_sizes']['size'] + "</p>"
                                + "</div>" + "</div>"
                                + "<div class='clearfix'></div>" + "</div>"
                                + "<hr id = 'hr_product" + i + "'>");
                  });
          $("#total_money").empty();
          $("#total_money").append(addCommas(total_money + "₫"));
          $("#safe_money").empty();
          $("#safe_money").append(addCommas(safe_money) + "₫");
        }
      });
}
function add(id) {
  var qty_order = $("#qty_order" + id).text();
  var price = $("#price" + id).text();
  var price_sale = $("#price_sale" + id).text();
  if (qty_order < qty[id]) {
    $("#qty_order" + id).text(parseInt(qty_order) + 1);
    $('#error_order' + id).css('display', 'none');
    $('#error_order_min' + id).css('display', 'none');
    $("#total_money").empty();
    total_money = total_money + parseInt(price_sale);
    safe_money = safe_money + parseInt(price) - parseInt(price_sale);
    $("#total_money").empty();
    $("#total_money").append(addCommas(total_money + "₫"));
    $("#safe_money").empty();
    $("#safe_money").append(addCommas(safe_money) + "₫");
    var data = parseInt(qty_order) + 1;
    $.ajaxSetup({
      headers : {
        'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
      }
    });
    var key = $("#dataProduct").val();
    // console.log(key);
    $.ajax({
      type : 'post',
      url : '/sales/cart/changeCart',
      data : {
        "id" : id,
        "data" : parseInt(qty_order) + 1
      },
      success : function(data) {

      }
    });
  } else
    $('#error_order' + id).css('display', 'block');
}
function sub(id) {
  var qty_order = $("#qty_order" + id).text();
  var price = $("#price" + id).text();
  var price_sale = $("#price_sale" + id).text();
  if (qty_order > 1) {
    $("#qty_order" + id).text(parseInt(qty_order) - 1);
    $('#error_order' + id).css('display', 'none');
    $('#error_order_min' + id).css('display', 'none');
    total_money = total_money - parseInt(price_sale);
    safe_money = safe_money - parseInt(price) + parseInt(price_sale);
    $("#total_money").empty();
    $("#total_money").append(addCommas(total_money + "₫"));
    $("#safe_money").empty();
    $("#safe_money").append(addCommas(safe_money) + "₫");
    var data = parseInt(qty_order) - 1;
    $.ajax({
      type : 'post',
      url : '/sales/cart/changeCart',
      data : {
        "id" : id,
        "data" : parseInt(qty_order) - 1
      },
      success : function(data) {

      }
    });
  } else
    $('#error_order_min' + id).css('display', 'block');
}
function cancel_order(id) {
  $("#item_product" + id).css('display', 'none');
  $("#hr_product" + id).css('display', 'none');
  var qty_order = $("#qty_order" + id).text();
  var price = $("#price" + id).text();
  var price_sale = $("#price_sale" + id).text();
  total_money = total_money - parseInt(price_sale) * parseInt(qty_order);
  safe_money = safe_money - (parseInt(price) - parseInt(price_sale))
      * parseInt(qty_order);
  $("#total_money").empty();
  $("#total_money").append(addCommas(total_money + "₫"));
  $("#safe_money").empty();
  $("#safe_money").append(addCommas(safe_money) + "₫");

  $.ajax({
    type : 'post',
    url : '/sales/cart/cancelProduct',
    data : {
      "id" : id
    },
    success : function(data) {
      $("#number_order").empty();
      $("#number_order").append(data);
    }
  });
}
/**
 * edit information user
 */
function editInfo() {
  $("#last_name").val($("#l_name").text());
  $("#first_name").val($("#f_name").text());
  $("#date").val($("#birthday").text());
  $("#pwd").val('');
  console.log($("#sex").text());
  if ($("#sex").text().trim() == "Nam")
    $("#inlineRadio1").attr('checked', 'checked');
  else
    $("#inlineRadio").attr('checked', 'checked');
}
/**
 * update information user
 */
function updateInfo() {
  var last_name = $("#last_name").val();
  var first_name = $("#first_name").val();
  var birthday = $("#date").val();
  var password = $("#pwd").val();
  var gender = $('input[name=inlineRadioOptions]:checked').val();

  var data = {};

  if (last_name != '')
    data["last_name"] = last_name;
  if (first_name != '')
    data["first_name"] = first_name;
  if (birthday != '')
    data['birthday'] = birthday;
  if (password != '')
    data['password'] = password;
  data['gender'] = gender;
  $.ajaxSetup({
    headers : {
      'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
    }
  });

  $.ajax({
    type : 'post',
    url : '/sales/account/changeAccount',
    data : {
      "data" : data
    },
    success : function(data) {
      $("#l_name").text(last_name);
      $("#f_name").text(first_name);
      $("#birthday").text(birthday);
      if (gender == 1)
        $("#sex").text("Nam");
      else
        $("#sex").text("Nữ");
    }
  });
}
