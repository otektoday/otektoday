(function ($) {
var clearjs = function clearjs() {
setTimeout(function(){
$("div#clear[data-id='clear']").html("");
console.log("cleared");
}, 5000);
};
clearjs();
}(jQuery));