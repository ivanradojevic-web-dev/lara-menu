<x-welcome-layout>
    
<h1 class="mb-2 text-center text-xl font-bold">Live Exchange Rates</h1>
<h2 class="mb-6 text-center text-lg font-semibold">Buy with {{ $currency->title }}</h2>

<div class="w-full p-2 flex items-center">
	<div class="w-1/3 font-semibold">Currency</div>
	<div class="w-1/3 font-semibold text-center">Rate</div>
	<div class="w-1/3"></div>
</div>

<div class="bg-red-100 w-full p-2 rounded-lg flex items-center">
	<div class="w-1/3 text-sm">{{ $currency->iso_code }}: {{ $currency->symbol }}</div>
	<div class="w-1/3 font-semibold text-sm text-center">1</div>
	<div class="w-1/3"></div>
</div>

@foreach($convert_currencies as $valuta)
<x-table-board :valuta="$valuta" />

<x-convert-box :valuta="$valuta" :currency="$currency" />

<x-checkout-modal />
@endforeach

</x-welcome-layout>