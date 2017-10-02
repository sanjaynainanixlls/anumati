$(document).ready(function () {
	var arrivalDate = moment($('#stayDetails').data('arrivaldate')).format('DD-MM-YYYY');
	var departureDate = moment($('#stayDetails').data('departuredate')).format('DD-MM-YYYY');
	var stayDetails = arrivalDate.concat(' To ', departureDate);
	$('.stayDetailSpan').html(stayDetails);
	var printContents = document.getElementById('printDetails').innerHTML;
	if ($('#printDetails').children().length) {
		w = window.open();
		w.document.write('<html><head><title>Anumati Pass Details</title>');
		// Add the stylesheet link and inline styles to the new document:
		w.document.write('<link rel="stylesheet" href="css/bootstrap.css">');
		w.document.write('<link rel="stylesheet" href="css/pdf.css">');
		w.document.write('</head><body >');
		w.document.write(printContents);
		w.document.write('</body></html>');
		setTimeout(function () {
			window.document.close();
			w.print();
			w.close();
		}, 100);


		return false;
	}
});
