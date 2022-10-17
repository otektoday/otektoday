( function( factory ) {
	if ( typeof define === "function" && define.amd ) {

		// AMD. Register as an anonymous module.
		define( [ "../widgets/datepicker" ], factory );
	} else {

		// Browser globals
		factory( jQuery.datepicker );
	}
}( function( datepicker ) {

datepicker.regional.tr = {
	closeText: "kapat",
	prevText: "Önceki",
	nextText: "Sonraki",
	currentText: "Bugün",
	monthNames: ["Ocak", "Şubat", "Mart", "Nisan", "Mayıs", "Haziran", "Temmuz", "Ağustos", "Eylül", "Ekim", "Kasım", "Aralık"],
	monthNamesShort: ["Oca", "Şub", "Mar", "Nis", "May", "Haz", "Tem", "Ağu", "Eyl", "Eki", "Kas","Ara" ],
	dayNames: [ "Pazar", "Pazartesi", "Salı", "Çarşamba", "Perşembe", "Cuma", "Cumartesi" ],
	dayNamesShort: [ "Paz", "Pzt", "Sal", "Çar", "Per", "Cum", "Cmt" ],
	dayNamesMin: [ "Pa", "Pt", "Sa", "Ça", "Pe", "Cu", "Ct" ],
	weekHeader: "Hafta",
	dateFormat: "yy-mm-dd",
	firstDay: 0,
		isRTL: false,
	showMonthAfterYear: false,
	yearSuffix: "" };
datepicker.setDefaults( datepicker.regional.tr );

return datepicker.regional.tr;

} ) );