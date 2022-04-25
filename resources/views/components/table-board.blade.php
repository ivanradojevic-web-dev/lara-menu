@props(['valuta' => null, 'currency' => null])

<div class="w-full p-2 border-b flex items-center">
	<div class="w-1/3 text-sm">{{ $valuta->iso_code }}: {{ $valuta->symbol }}</div>
	<div class="w-1/3 text-center">{{ $valuta->pivot->rate }}</div>
	<div class="w-1/3 flex justify-end items-center space-x-2">
		<div class="relative group">
			<div class="absolute bottom-full px-1 py-0.5 leading-none rounded border opacity-0 group-hover:opacity-100 transition duration-200 text-xs text-white bg-gray-900 pointer-events-none">Surcharge for this transaction is {{ $valuta->pivot->surcharge }}%</div>
			<span class="cursor-pointer">
				<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
				  <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
				</svg>
			</span>
		</div>
		<div class="relative group">
			<div class="absolute bottom-full px-1 py-0.5 leading-none rounded border opacity-0 group-hover:opacity-100 transition duration-200 text-xs text-white bg-gray-900 pointer-events-none">Transaction</div>
			<span class="cursor-pointer open-convert-box fill-current hover:text-red-500">
				<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
				  <path fill-rule="evenodd" d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd" />
				</svg>
			</span>
		</div>
	</div>
</div>