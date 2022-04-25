@props(['valuta' => null, 'currency' => null])

<div class="convert-box w-full p-2 h-24 border-b bg-gray-100 items-center space-x-4">
	<div class="w-1/4">
		<input autocomplete="off" placeholder="{{ $valuta->symbol }}" type="text" name="{{ $valuta->name }}" maxlength="8" onkeypress="return isNumberKey(event)" 
		onchange="(function(el){el.value=isNaN(parseFloat(el.value).toFixed(2)) ? '' : parseFloat(el.value).toFixed(2);})(this)" 
		data-currency-name="{{ $currency->name }}"
		class="enter-valuta text-center w-full bg-white rounded-lg text-sm border p-1">
	</div>
	<div class="w-1/4">
		<button class="convert-valuta w-full bg-gray-500 hover:bg-gray-600 shadow hover:shadow-none text-white rounded-lg text-sm borde p-1">CONVERT</button>
	</div>
	<div class="w-1/4">
		<span class="result-valuta block w-full bg-white text-center rounded-lg text-sm border p-1">{{ $currency->symbol }}</span>
	</div>
	<div class="w-1/4">
		<button class="button-valuta w-full bg-red-400 hover:bg-red-500 shadow hover:shadow-none text-white rounded-lg text-sm border p-1">PAYMENT</button>
	</div>
</div>

<script>
	function isNumberKey(evt)
	{
	  var charCode = (evt.which) ? evt.which : evt.keyCode;
	  if (charCode != 46 && charCode > 31 
	    && (charCode < 48 || charCode > 57))
	     return false;

	  return true;
	}   
</script>