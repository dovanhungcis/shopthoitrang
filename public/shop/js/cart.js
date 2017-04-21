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
	function showCart(){
		total_money = safe_money = 0; 
		$.ajaxSetup({
			headers: {
		    	'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		    }
		});
		$.ajax({
			type :'post',
		    url : '/sales/cart/showCart',
		    data : {
			    
			},
			success:function(data){
		    	$('#cart_order').empty();
		    	$.each(data, function (i, f) {
			    	qty[i] = f['quantity'];
			    	total_money += f['price_sale'] * f['quantitiesOrder'];
			    	safe_money += (f['price']-f['price_sale']) * f['quantitiesOrder'];
    		    	$('#cart_order').append(
    		    			"<div class='cart-sec simpleCart_shelfItem' id = 'item_product"+i+"'> "+
							"<div class='cart-item cyc'>"+
								"<img src='/admin1/assets/uploads/posts/"+f['image']['photo']+"' class='img-responsive' alt='' />"+
							"</div>"+
							"<div class='cart-item-info'>"+
								"<h3>"+
									"<span class='input-group-btn'>"+
										"<button class='btn btn-secondary' type='button'>"+f['product']['name']+"</button>"+
									"</span>"+
								"</h3>"+
								"<div class='col-lg-6'>"+
									"<div class='input-group'>"+
										"<span class='input-group-addon' id='basic-addon1'>Qty</span>"+
										"<div class='input-group-addon' value = '-' onclick='add("+f['id']+")'>+</div>"+
										"<div class='input-group-addon' id='qty_order"+i+"'>"+f['quantitiesOrder']+"</div>"+
										"<div class='input-group-addon'  value = '+' onclick='sub("+f['id']+")'>-</div>"+	
									"</div>"+
								"</div>"+
								"<div class='col-lg-12 error_order' id = 'error_order"+i+"'>"+
								"<div class='input-group'>"+
									"<span class='input-group-addon' id='basic-addon1'>Bạn chỉ được mua tối đa "+f['quantity']+" sản phẩm.</span>"+
								"</div>"+
								"</div>"+
								"<div class='col-lg-12 error_order_min' id = 'error_order_min"+i+"'>"+
								"<div class='input-group'>"+
									"<span class='input-group-addon' id='basic-addon1'>Bạn mua tối thiểu 1 sản phẩm.</span>"+
								"</div>"+
							"</div>"+
								"<div class='input-group'>"+
									"<br> <br> <span class='input-group-addon' id='basic-addon1'><s>"+addCommas(f['price'])+"₫</s> "+addCommas(f['price_sale'])+"₫</span>"+
									"<div class = 'price_product_hidden'><span id = 'price"+i+"'>"+f['price']+"</span>₫</s> <span id = 'price_sale"+i+"'>"+f['price_sale']+"</span></div>"+
									"<span class='input-group-addon' id='basic-addon1' onclick='cancel_order("+i+")'>Hủy</span>"+
								"</div>"+
								"<div class='col-lg-8'>"+
									"<p>Color: "+f['color']['color']+"</p>"+
								"</div>"+
								"<div class='col-lg-4'>"+
								"<p>Size: "+f['product_sizes']['size']+"</p>"+
							"</div>"+
							"</div>"+
							"<div class='clearfix'></div>"+
						"</div>"+
						"<hr id = 'hr_product"+i+"'>"
    				);
		    	});
		    	$("#total_money").empty();
		    	$("#total_money").append(addCommas(total_money+"₫"));
		    	$("#safe_money").empty();
		    	$("#safe_money").append(addCommas(safe_money)+"₫");
		    }
		});
	}
	function add(id){

		$.ajaxSetup({
			headers: {
		    	'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		    }
		});
		var qty_order = $("#qty_order"+id).text();
		var price = $("#price"+id).text();
		var price_sale = $("#price_sale"+id).text();
		if(qty_order < qty[id] ){
			$("#qty_order"+id).text(parseInt(qty_order)+1);
			$('#error_order'+id).css('display','none');
			$('#error_order_min'+id).css('display','none');
			$("#total_money").empty();
			total_money = total_money + parseInt(price_sale);
			safe_money = safe_money + parseInt(price) - parseInt(price_sale);
			$("#total_money").empty();
	    	$("#total_money").append(addCommas(total_money+"₫"));
	    	$("#safe_money").empty();
	    	$("#safe_money").append(addCommas(safe_money)+"₫");
	    	$("#total_money_checkout").empty();
	    	$("#total_money_checkout").append(addCommas(total_money)+"₫");
	    	$("#total_checkout").empty();
	    	$("#total_checkout").append(addCommas(total_money+15000)+"₫");
	    	$("#qty_checkout"+id).empty();
	    	$("#qty_checkout"+id).text(parseInt(qty_order)+1);
			var data = parseInt(qty_order) + 1;
			$.ajaxSetup({
				headers: {
			    	'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			    }
			});
	   		var key = $( "#dataProduct" ).val();
	   		$.ajax({
				type :'post',
			    url : '/sales/cart/changeCart',
			    data : {
					"id" : id,
					"data" : parseInt(qty_order) + 1
				},
				success:function(data){
			    	
			    }
			});
		}else
			$('#error_order'+id).css('display','block');
	}
	function sub(id){

		$.ajaxSetup({
			headers: {
		    	'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		    }
		});
		var qty_order = $("#qty_order"+id).text();
		var price = $("#price"+id).text();
		var price_sale = $("#price_sale"+id).text();
		if(qty_order > 1 ){
			$("#qty_order"+id).text(parseInt(qty_order)-1);
			$('#error_order'+id).css('display','none');
			$('#error_order_min'+id).css('display','none');
			total_money = total_money - parseInt(price_sale);
			safe_money = safe_money - parseInt(price) + parseInt(price_sale);
			$("#total_money").empty();
	    	$("#total_money").append(addCommas(total_money+"₫"));
	    	$("#safe_money").empty();
	    	$("#safe_money").append(addCommas(safe_money)+"₫");
	    	$("#total_money_checkout").empty();
	    	$("#total_money_checkout").append(addCommas(total_money)+"₫");
	    	$("#total_checkout").empty();
	    	$("#total_checkout").append(addCommas(total_money+15000)+"₫");
	    	$("#qty_checkout"+id).empty();
	    	$("#qty_checkout"+id).text(parseInt(qty_order)-1);
			var data = parseInt(qty_order) - 1;
			$.ajax({
				type :'post',
			    url : '/sales/cart/changeCart',
			    data : {
					"id" : id,
					"data" : parseInt(qty_order) - 1
				},
				success:function(data){
			    	
			    }
			});
		}else
			$('#error_order_min'+id).css('display','block');
	}
	function cancel_order(id){

		$.ajaxSetup({
			headers: {
		    	'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		    }
		});
		$("#item_product"+id).css('display','none');
		$("#item_product_checkout"+id).css('display','none');
		$("#hr_product"+id).css('display','none');
		var qty_order = $("#qty_order"+id).text();
		var price = $("#price"+id).text();
		var price_sale = $("#price_sale"+id).text();
		total_money = total_money - parseInt(price_sale)*parseInt(qty_order);
		safe_money = safe_money - (parseInt(price) - parseInt(price_sale)) * parseInt(qty_order);
		$("#total_money").empty();
    	$("#total_money").append(addCommas(total_money+"₫"));
    	$("#safe_money").empty();
    	$("#safe_money").append(addCommas(safe_money)+"₫");
    	$("#total_money_checkout").empty();
    	$("#total_money_checkout").append(addCommas(total_money)+"₫");
    	$("#total_checkout").empty();
    	$("#total_checkout").append(addCommas(total_money+15000)+"₫");
    	$.ajax({
			type :'post',
		    url : '/sales/cart/cancelProduct',
		    data : {
				"id" : id
			},
			success:function(data){
				$("#number_order").empty();
		    	$("#number_order").append(data);
		    }
		});
	}
	function changeDataProduct(data){
		$('#dataProduct').val(data);
	}
    function addcart(){
    	$.ajaxSetup({
			headers: {
		    	'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		    }
		});
   		var key = $( "#dataProduct" ).val();
   		$.ajax({
			type :'post',
		    url : '/sales/cart/addcart',
		    data : {
				"data" : key
			},
			success:function(data){
		    	$("#number_order").empty();
		    	$("#number_order").append(data);
		    }
		});
    }
    function edit_cart(){
    	$("#myModal").show();
    }
    function updateAddress(){
    	var phone = $("#phone").val();
    	var address =$("#address_change").val();
    	var city = $("#city").val();
    	var district = $("#district").val();
    
    	$("#phone_co").text(phone);
    	$("#address_co").text(address);
    	$("#city_co").text(city);
    	$("#district_co").text(district);
    }
    function order(){
    	var count_error = 0;
    	var phone = $("#phone_co").text();
    	var address = $("#address_co").text();
    	var city = $("#city_co").text();
    	var district = $("#district_co").text();
    	var data = {};
    	data['phone'] = phone;
    	data['address'] = address;
    	data['city'] = city;
    	data['district'] = district;
    	if(phone==''){
    		$('#error_phone').css('display','block');
    		count_error = 1;
    	}
    	if(address==''){
    		$('#error_add').css('display','block');
    		count_error = 1;
    	}
    	if(city==''){
    		$('#error_add').css('display','block');
    		count_error = 1;
    	}
    	if(district==''){
    		$('#error_add').css('display','block');
    		count_error = 1;
    	}
    	console.log(count_error);
    	console.log(address);
    	console.log(phone);
    	console.log(city);
    	console.log(district);
    	if(count_error ==0){
    		$.ajaxSetup({
    			headers: {
    		    	'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    		    }
    		});
    		$.ajax({
    			type :'post',
    		    url : '/sales/cart/order',
    		    data : {
	    		    "data" : data
    			},
    			success:function(data){
    		    	if(data==1){
    		    		$(location).attr('href', 'http://meramera.dev.com/sales/cart/success');
    		    	}
    		    }
    		});
    	}
    }