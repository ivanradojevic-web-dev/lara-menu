<x-welcome-layout>
	<a href="{{ route('board') }}" class="mb-8 block max-w-max">
		<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
		  <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
		</svg>
	</a>
    <div class="bg-red-100 w-full p-2 rounded-lg flex items-center">
    	<div class="w-3/4 text-sm">Purchuased amount</div>
    	<div class="w-1/4 font-semibold text-sm">{{ $transaction->convert_currency_amount }} {{ $transaction->convert_currency->iso_code }}</div>
    </div>
    <div class="w-full p-2 rounded-lg flex items-center">
    	<div class="w-3/4 text-sm">Converstaion rate</div>
    	<div class="w-1/4 font-semibold text-sm">{{ $transaction->convert_currency_rate }}</div>
    </div>
    <div class="bg-red-100 w-full p-2 rounded-lg flex items-center">
    	<div class="w-3/4 text-sm">Price</div>
    	<div class="w-1/4 font-semibold text-sm">{{ $transaction->currency_amount }} {{ $transaction->currency->iso_code }}</div>
    </div>
    <div class="w-full p-2 rounded-lg flex items-center">
    	<div class="w-3/4 text-sm">Surcharge percentage</div>
    	<div class="w-1/4 font-semibold text-sm">{{ $transaction->surcharge_percentage }}%</div>
    </div>
    <div class="bg-red-100 w-full p-2 rounded-lg flex items-center">
    	<div class="w-3/4 text-sm">Surcharge</div>
    	<div class="w-1/4 font-semibold text-sm">{{ $transaction->surcharge_amount }} {{ $transaction->currency->iso_code }}</div>
    </div>
    <div class="w-full p-2 rounded-lg flex items-center">
    	<div class="w-3/4 text-sm">Discount percentage</div>
    	<div class="w-1/4 font-semibold text-sm">{{ $transaction->discount_percentage }}%</div>
    </div>
    <div class="bg-red-100 w-full p-2 rounded-lg flex items-center">
    	<div class="w-3/4 text-sm">Discount</div>
    	<div class="w-1/4 font-semibold text-sm">{{ $transaction->discount_amount }} {{ $transaction->currency->iso_code }}</div>
    </div>
    <div class="w-full p-2 rounded-lg flex items-center">
    	<div class="w-3/4 text-sm">Total price</div>
    	<div class="w-1/4 font-semibold text-sm">{{ $transaction->paid_currency_amount }} {{ $transaction->currency->iso_code }}</div>
    </div>
</x-welcome-layout>