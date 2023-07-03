@forelse($products as $product)
	<div class="col-md-2 col-xs-4 product_list no-print" >
	 <div class="product_box bg-gray"  data-toggle="tooltip" data-placement="bottom" data-variation_id="{{$product->product_id}}" title="{{$product->name}}" >
		<div class="image-container" style="height: 100px; width :90px;">
			@if(!empty($product->product_image))
				<img src="{{asset('/uploads/img/' . $product->product_image)}}" alt="Product Image" width="193px;" height="194px;">
			@else
				<img src="{{asset('/img/default.png')}}" alt="Product Image" width="193px;" height="194px;">
			@endif
		</div>
			<div class="text text-muted text-uppercase">
				<small>{{$product->name}} 
				
				</small>
			</div>
			
		</div>
		
	</div>
	
@empty
	<input type="hidden" id="no_products_found">
	<div class="col-md-12">
		<h4 class="text-center">
			@lang('lang_v1.no_products_to_display')
		</h4>
	</div>
@endforelse

<div id="myModal" class="modal">
</div>
 