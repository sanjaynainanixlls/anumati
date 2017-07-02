

$(document).ready(function () {




	$('#proceedButton').on('click', function () {
		$('#instructionsDiv').hide();
		$('#formDiv').show();
		$(window).scrollTop(0);
	});
	$('#numberOfMales,#numberOfFemales,#numberOfChildren').change(function () {
		var numberOfMales = parseInt($('#numberOfMales').val()) || 0;
		var numberOfFemales = parseInt($('#numberOfFemales').val()) || 0;
		var numberOfChildren = parseInt($('#numberOfChildren').val()) || 0;

		$('#totalCount').val(numberOfMales + numberOfFemales + numberOfChildren).trigger('change');
		if (parseInt($('#totalCount').val()) > 6) {
			$('#totalCountError').show();
			$('#totalCountError').text('MAXIMUM 6 PEOPLE CAN REGISTER IN ONE ANUMATI PASS. FOR MORE PEOPLE PLEASE REGISTER AGAIN.');
			$('#groupMember1').hide();
			$('#groupMember2').hide();
			$('#groupMember3').hide();
			$('#groupMember4').hide();
			$('#groupMember5').hide();
			document.getElementById('button1id').disabled = true;
			document.getElementById('groupMember1Name').required = false;
			document.getElementById('groupMember2Name').required = false;
			document.getElementById('groupMember3Name').required = false;
			document.getElementById('groupMember4Name').required = false;
			document.getElementById('groupMember5Name').required = false;
		}
		else if (parseInt($('#totalCount').val()) <= 0) {
			$('#totalCountError').show();
			$('#totalCountError').text('MINIMUM 1 PERSON HAS TO REGISTER IN ONE ANUMATI PASS. PLEASE UPDATE THE NUMBER OF PEOPLE');
			$('#groupMember1').hide();
			$('#groupMember2').hide();
			$('#groupMember3').hide();
			$('#groupMember4').hide();
			$('#groupMember5').hide();
			document.getElementById('button1id').disabled = true;
			document.getElementById('groupMember1Name').required = false;
			document.getElementById('groupMember2Name').required = false;
			document.getElementById('groupMember3Name').required = false;
			document.getElementById('groupMember4Name').required = false;
			document.getElementById('groupMember5Name').required = false;
		}
		else {
			$('#totalCountError').hide();
			document.getElementById('button1id').disabled = false;
		}
	});

	$('#totalCount').bind('change', function () {
		var totalCount = parseInt($(this).val());
		if (totalCount <= 6) {
			if (totalCount == 1) {
				$('#groupMember1').hide();
				$('#groupMember2').hide();
				$('#groupMember3').hide();
				$('#groupMember4').hide();
				$('#groupMember5').hide();
				$('#totalCountError').hide();
				document.getElementById('groupMember1Name').required = false;
				document.getElementById('groupMember2Name').required = false;
				document.getElementById('groupMember3Name').required = false;
				document.getElementById('groupMember4Name').required = false;
				document.getElementById('groupMember5Name').required = false;
			}
			if (totalCount == 2) {
				$('#groupMember1').show();
				$('#groupMember2').hide();
				$('#groupMember3').hide();
				$('#groupMember4').hide();
				$('#groupMember5').hide();
				$('#totalCountError').hide();
				document.getElementById('groupMember1Name').required = true;
				document.getElementById('groupMember2Name').required = false;
				document.getElementById('groupMember3Name').required = false;
				document.getElementById('groupMember4Name').required = false;
				document.getElementById('groupMember5Name').required = false;
			}
			if (totalCount == 3) {
				$('#groupMember1').show();
				$('#groupMember2').show();
				$('#groupMember3').hide();
				$('#groupMember4').hide();
				$('#groupMember5').hide();
				$('#totalCountError').hide();
				document.getElementById('groupMember1Name').required = true;
				document.getElementById('groupMember2Name').required = true;
				document.getElementById('groupMember3Name').required = false;
				document.getElementById('groupMember4Name').required = false;
				document.getElementById('groupMember5Name').required = false;
			}
			if (totalCount == 4) {
				$('#groupMember1').show();
				$('#groupMember2').show();
				$('#groupMember3').show();
				$('#groupMember4').hide();
				$('#groupMember5').hide();
				$('#totalCountError').hide();
				document.getElementById('groupMember1Name').required = true;
				document.getElementById('groupMember2Name').required = true;
				document.getElementById('groupMember3Name').required = true;
				document.getElementById('groupMember4Name').required = false;
				document.getElementById('groupMember5Name').required = false;
			}
			if (totalCount == 5) {
				$('#groupMember1').show();
				$('#groupMember2').show();
				$('#groupMember3').show();
				$('#groupMember4').show();
				$('#groupMember5').hide();
				$('#totalCountError').hide();
				document.getElementById('groupMember1Name').required = true;
				document.getElementById('groupMember2Name').required = true;
				document.getElementById('groupMember3Name').required = true;
				document.getElementById('groupMember4Name').required = true;
				document.getElementById('groupMember5Name').required = false;
			}
			if (totalCount == 6) {
				$('#groupMember1').show();
				$('#groupMember2').show();
				$('#groupMember3').show();
				$('#groupMember4').show();
				$('#groupMember5').show();
				$('#totalCountError').hide();
				document.getElementById('groupMember1Name').required = true;
				document.getElementById('groupMember2Name').required = true;
				document.getElementById('groupMember3Name').required = true;
				document.getElementById('groupMember4Name').required = true;
				document.getElementById('groupMember5Name').required = true;
			}
		}
	});



});
