//alert($.fn.jquery);    $代表 jquery3.2.1 版本 
//alert($jq.fn.jquery); //$jq代表 jquery1.7.1 版本 tao add
$jq(function(){
	/*------------------------------购物车效果-----------------------------------*/	   
	$jq(".cart-section").hover(function(){
		$jq(".hidden-cart").css("display","block");
		$jq(".hidden-cart-c").css("display","block");
	},function(){
		$jq(".hidden-cart").css("display","none");
		$jq(".hidden-cart-c").css("display","none");
		})	
	
	$jq(".hidden-cart-c ul li ins").click(function(){
		$jq(this).parents('li').remove();
	})
	


	var $jqsubblock = $jq(".subpage"), $jqhead=$jqsubblock.find('h2'), $jqul = $jq("#proinfo"), $jqlis = $jqul.find("li"), inter=false;
	
	$jqhead.click(function(e){
		e.stopPropagation();
		if(!inter){
			$jqul.show();
		}else{
			$jqul.hide();
		}
		inter=!inter;
	});
	
	$jqul.click(function(event){
		event.stopPropagation();
	});
	
	$jq(document).click(function(){
		$jqul.hide();
		inter=!inter;
	});

	$jqlis.hover(function(){
		if(!$jq(this).hasClass('nochild')){
			$jq(this).addClass("prosahover");
			$jq(this).find(".prosmore").removeClass('hide');
		}
	},function(){
		if(!$jq(this).hasClass('nochild')){
			if($jq(this).hasClass("prosahover")){
				$jq(this).removeClass("prosahover");
			}
			$jq(this).find(".prosmore").addClass('hide');
		}
	});
})

