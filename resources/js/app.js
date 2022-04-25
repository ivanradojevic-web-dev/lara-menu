require('./bootstrap');

document.addEventListener('DOMContentLoaded', (event) => {

	document.querySelectorAll('.open-convert-box').forEach( (item, index) => {
		item.addEventListener("click", function() {

			let panel = document.querySelectorAll('.convert-box')

		    if (panel[index].style.display === "flex") {
		      panel[index].style.display = "none";
		    } else {
		      panel[index].style.display = "flex";
		    }

		});
	});

	document.querySelectorAll('.convert-valuta').forEach( (item, index) => {
		//convert event
		item.addEventListener("click", function() {

			let enterValuta = document.querySelectorAll('.enter-valuta')[index]

			if (enterValuta.value > 0.99) {

			 	axios
	             .get('/api/convert', {
	                params: {
	                    valuta_value: enterValuta.value,
	  					valuta_name: enterValuta.name,
	  					currency_name: enterValuta.getAttribute("data-currency-name")
	                }
				})
				.then(function (response) {
					convertResult = response.data.convert_result
					convertCurrencyAmount = response.data.convert_currency_amount
					convertCurrencyCode = response.data.convert_currency_code
					convertCurrencyId = response.data.convert_currency_id
					convertCurrencyRate = response.data.convert_currency_rate
					currencyId = response.data.currency_id
					currencyCode = response.data.currency_code
					paidCurrencyAmount = response.data.paid_currency_amount
					surchargeAmount = response.data.surcharge_amount
					surchargePerecentage = response.data.surcharge_percentage
					discountAmount = response.data.discount_amount
					discountPerecentage = response.data.discount_percentage

					//show convert result
					document.querySelectorAll('.result-valuta')[index].innerText = convertResult

					var btn = document.querySelectorAll(".button-valuta")[index];

					var modal = document.querySelectorAll(".modal-valuta")[index]
					//pre-payment info event
					btn.onclick = function() {
					  	document.querySelectorAll(".modal-valuta")[index].style.display = "block";

					 	//submit payment event
					  	document.querySelectorAll('.transaction-form')[index].addEventListener('submit', (e) => {
					  		e.preventDefault();

					  		document.querySelectorAll('.submit')[index].disabled = true;

						  	axios
			  	            .post('/api/transaction', {
			  	                currency_id: currencyId,
			  	                convert_currency_id: convertCurrencyId,
			  	                convert_currency_rate: convertCurrencyRate,
			  	                surcharge_percentage: surchargePerecentage,
			  	                surcharge_amount: surchargeAmount,
			  	                convert_currency_amount: convertCurrencyAmount,
			  	                currency_amount: convertResult,
			  	                paid_currency_amount: paidCurrencyAmount,
			  	                discount_percentage: discountPerecentage,
			  	                discount_amount: discountAmount, 
			  	            })
			  	            .then(function (response) {
			  	            	if (response.data.success == true) {
			  	            		window.location.replace(response.data.url);
			  	            	}
	            			})
	            			.catch(function (error) {
				 				console.log(error);
							})
					 	});
					}

					var close = document.querySelectorAll('.close')[index];

					close.onclick = function() {
					 	document.querySelectorAll(".modal-valuta")[index].style.display = "none";
					}

					window.onclick = function(event) {
					  if (event.target == modal) {
					    document.querySelectorAll(".modal-valuta")[index].style.display = "none";
					  }
					}

					document.querySelectorAll('.cart-purchuased')[index].innerText = convertCurrencyAmount + ' ' + convertCurrencyCode
					document.querySelectorAll('.cart-rate')[index].innerText = convertCurrencyRate
					document.querySelectorAll('.cart-price')[index].innerText = convertResult + ' ' + currencyCode
					document.querySelectorAll('.cart-surcharge-percentage')[index].innerText = surchargePerecentage + '%'
					document.querySelectorAll('.cart-surcharge-amount')[index].innerText = surchargeAmount + ' ' + currencyCode
					document.querySelectorAll('.cart-discount-percentage')[index].innerText = discountPerecentage + '%'
					document.querySelectorAll('.cart-discount-amount')[index].innerText = discountAmount + ' ' + currencyCode
					document.querySelectorAll('.cart-total-price')[index].innerText = paidCurrencyAmount + ' ' + currencyCode
				})
				.catch(function (error) {
				 	console.log(error);
				})
			}
		});
	});
})
