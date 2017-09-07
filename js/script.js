$(document).ready(function () {
	var arrivalDate = moment($('#stayDetails').data('arrivaldate')).format('DD-MM-YYYY');
	var departureDate = moment($('#stayDetails').data('departuredate')).format('DD-MM-YYYY');
	var stayDetails = arrivalDate.concat(' To ', departureDate);
	$('.stayDetailSpan').html(stayDetails);
	var printContents = document.getElementById('printDetails').innerHTML;
	w = window.open();
	w.document.write(printContents);
	w.print();
	w.close();
});
