( function( factory ) {
	if ( typeof define === "function" && define.amd ) {

		// AMD. Register as an anonymous module.
		define( [ "../widgets/datepicker" ], factory );
	} else {

		// Browser globals
		factory( jQuery.datepicker );
	}
}( function( datepicker ) {

datepicker.regional.ar = {
	closeText: "إغلاق",
	prevText: "السابق",
	nextText: "التالي",
	currentText: "اليوم",
	monthNames: ["يناير","فبراير","مارس","أبريل","مايو","يونيو","يوليو","أغسطس","سبتمبر","أكتوبر","نوفمبر","ديسمبر"],
	monthNamesShort: ["يناير","فبراير","مارس","أبريل","مايو","يونيو","يوليو","أغسطس","سبتمبر","أكتوبر","نوفمبر","ديسمبر"],
	dayNames: ["الاحد","الاثنين","الثلاثاء","الاربعاء","الخميس","الجمعة","السبت"],
	dayNamesShort: ["الاحد","الاثنين","الثلاثاء","الاربعاء","الخميس","الجمعة","السبت"],
	dayNamesMin: ["الاحد","الاثنين","الثلاثاء","الاربعاء","الخميس","الجمعة","السبت"],
	weekHeader: "اسبوع",
	dateFormat: "yy-mm-dd",
	firstDay: 0,
		isRTL: true,
	showMonthAfterYear: false,
	yearSuffix: "" };
datepicker.setDefaults( datepicker.regional.ar );

return datepicker.regional.ar;

} ) );