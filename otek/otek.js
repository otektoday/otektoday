$(document).on("scroll", function () {
  var y = $(this).scrollTop();
  var x = $(this).height();
  if (y > 126) {
    $("#scrollTopBtn").fadeIn();
    $("#socialMediaBtn").fadeIn();
    $("#socialcontainer").fadeIn();
    $("#scrollTopBtn").not(".flex").addClass("flex");
    $("#socialMediaBtn").not(".flex").addClass("flex");
    window.location.pathname.search("/home") === -1 && window.innerWidth > 992 ?
    $('header ul.st-nav-list li a').each(function(){
    $(this).removeClass("color-secondary");
    $(this).addClass('color-fff');
    }) : '';
    window.location.pathname.search("/home") !== -1 && window.innerWidth < 992 ?
    $('header ul.st-nav-list li a').each(function(){
    $(this).addClass("color-secondary");
    $(this).removeClass('color-fff');
    }) : '';
  } else {
    $("#scrollTopBtn").fadeOut(300);
    $("#socialMediaBtn").fadeOut(300);
    $("#socialcontainer").fadeOut(300);
    window.location.pathname.search("/home") === -1 || (window.location.pathname.search("/home") !== -1 && window.innerWidth < 950) ?
    $('header ul.st-nav-list li a').each(function(){
    $(this).removeClass("color-fff");
    $(this).addClass('color-secondary');
    }) : '';
    setTimeout(() => {
      $("#scrollTopBtn.flex").removeClass("flex");
      $("#socialMediaBtn.flex").removeClass("flex");
    }, 350);
  }
  if (window.matchMedia("(display-mode: standalone)").matches || window.matchMedia("(display-mode: fullscreen)").matches || navigator.standalone || (window.matchMedia("(display-mode: browser)").matches && navigator.appVersion.search("iPhone")!=-1)) {
      if(y<50 || !y){
  if(window.location.pathname.search("/home")==-1 && window.location.pathname.search("/404")==-1){
        // window.scrollTo(0,50);
  }
      }
  }
});
var fixmenu = function fixmenu() {
  window.location.pathname.search("/home") !== -1 && window.innerWidth < 992
    ? $("header ul.st-nav-list li a").each(function () {
      $(this).removeClass("color-fff");
      $(this).addClass("color-secondary");
    })
    : "";
};
fixmenu();
var checkScrollSpeed = function checkScrollSpeed(settings){
  settings = settings || {};

  var lastPos, newPos, timer, delta, 
      delay = settings.delay || 50; // in "ms" (higher means lower fidelity )

  function clear() {
    lastPos = null;
    delta = 0;
  }

  clear();

    newPos = window.scrollY;
    if ( lastPos != null ){ // && newPos < maxScroll 
      delta = newPos -  lastPos;
    }
    lastPos = newPos;
    clearTimeout(timer);
    timer = setTimeout(clear, delay);
    return delta;

};

$("html").removeAttr("class");

var socialButtons = function socialButtons() {
  setTimeout(() => {
    $("#socialMediaBtn").fadeIn();
    $("#socialcontainer").fadeIn();
    $("#socialMediaBtn").not(".flex").addClass("flex");
    $("#socialMediaBtn").addClass("hovered");
    $("#socialcontainer").trigger("mouseover");
    showcontacts(1);
  }, 2000);
  setTimeout(() => {
    $("#socialMediaBtn").removeClass("hovered");
    $("#socialcontainer").trigger("mouseout");
    showcontacts(2);
  }, 7000);
};
socialButtons();
setInterval(() => {
  socialButtons();
}, 9000);

var backToTop =   function backToTop() {
    $("#scrollTopBtn").on("click", function (e) {
      e.preventDefault();
      $("html,body").animate(
        {
          scrollTop: 0,
        },
        1000
      );
    });
    var maxwidth = 0;
    var maxheight = 0;
    $('#socialcontainer').hover(function(e) {
      $('#socialMediaBtn img').attr('src','../assets/images/logo/57x57.png');
      $(".socialMediaBtn").each(function () {
        if ($(this).parent().not('.hidden').attr('target') == '_blank') {
          $(this).fadeIn(300);
          $(this).not(".flex").addClass("flex");
          $(this).css("bottom", $(this).data('bottom'));
          $(this).css("left", $(this).data("left"));
          maxheight = maxheight < $(this).data("bottom") ? $(this).data('bottom') : maxheight;
          maxwidth = maxwidth < $(this).data("left") ? $(this).data('left') : maxwidth;
          $("#socialcontainer").css("height", maxheight);
          $("#socialcontainer").css("width", maxwidth);
        }
      });
    },function (e) {
      $('#socialMediaBtn img').attr('src','../assets/images/logo/57x57xf.png');
      $(".socialMediaBtn").each(function() {
        $(this).css("bottom",'');
        $(this).css("left",'');
        $(this).fadeOut(200);
        setTimeout(() => {
          $(this).removeClass("flex");
        }, 250);
        $("#socialcontainer").css("height", "40px");
        $("#socialcontainer").css("width", "40px");
      });
    });
}
backToTop();
var showcontacts = function showcontacts(x) {
    var maxwidth = 0;
    var maxheight = 0;
  if (x==1) {
      $('#socialMediaBtn img').attr('src','../assets/images/logo/57x57.png');
      $(".socialMediaBtn").each(function () {
        if ($(this).parent().not('.hidden').attr('target') == '_blank') {
          $(this).fadeIn(300);
          $(this).not(".flex").addClass("flex");
          $(this).css("bottom", $(this).data('bottom'));
          $(this).css("left", $(this).data("left"));
          maxheight = maxheight < $(this).data("bottom") ? $(this).data('bottom') : maxheight;
          maxwidth = maxwidth < $(this).data("left") ? $(this).data('left') : maxwidth;
          $("#socialcontainer").css("height", maxheight);
          $("#socialcontainer").css("width", maxwidth);
        }
      });
  }
  if (x==2) {
      $('#socialMediaBtn img').attr('src','../assets/images/logo/57x57xf.png');
      $(".socialMediaBtn").each(function() {
        $(this).css("bottom",'');
        $(this).css("left",'');
        $(this).fadeOut(200);
        setTimeout(() => {
          $(this).removeClass("flex");
        }, 250);
        $("#socialcontainer").css("height", "40px");
        $("#socialcontainer").css("width", "40px");
      });
  }
}

var setCookie = function setCookie(cname, cvalue, exdays) {
  var d = new Date();
  d.setTime(d.getTime() + exdays * 1000);
  var expires = "expires=" + d.toUTCString();
  document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
};
var setSession = function setSession(session,value){
  $.post("../include/function.php",
  {SETSESSION:session+"|"+value,},
  function(data){
    return data;
  });
};
var getSession = function getSession(session, selector, attra="data-sion"){
$.post("../include/function.php",
{GETSESSION:session,},function(data){
  $(selector).attr(attra,data);
});
};

var messagecentre = function messagecentre(color, message, button = "en,ar,tr") {
  message = '<br><br><p class="caps">'+message+'</p>';
  $("#divwait").css("display", "none");
  // $("#addadminmsg").css("color", color);
  if ($("#addadminmsg").hasClass("alert-success")) {
    $("#addadminmsg").toggleClass("alert-success");
  }
  if ($("#addadminmsg").hasClass("alert-danger")) {
    $("#addadminmsg").toggleClass("alert-danger");
  }
  if ($("#addadminmsg").hasClass("alert-warning")) {
    $("#addadminmsg").toggleClass("alert-warning");
  }
  if ($("#addadminmsg").hasClass("alert-info")) {
    $("#addadminmsg").toggleClass("alert-info");
  }
  if (color == "red") {
    var icon = '<i class="far fa-window-close mr-2 gegafont"></i>';
    $("#addadminmsg").toggleClass("alert-danger");
  }
  if (color == "yel") {
    var icon = '<i class="fal fa-exclamation-triangle stroke mr-2 gegafont"></i>';
    $("#addadminmsg").toggleClass("alert-warning");
  }
  if (color == "green") {
    var icon = '<i class="fal fa-check-square mr-2 gegafont"></i>';
    $("#addadminmsg").toggleClass("alert-success");
  }
  if (color == "white") {
    var icon = '<i class="fal fa-info stroke mr-2 gegafont"></i>';
    $("#addadminmsg").toggleClass("alert-info");
  }
  if (button != "en,ar,tr") {
    var $buttonarray = button.split(",");
    var $buttonhtml = '<div class="flex flexnowrap" style="justify-content: space-evenly;"><div class="float-left mr-30">';
    $buttonhtml +=
      '<div id="messageapprove" class="btn btn-primary caps">' +
      $buttonarray[0] +
      "</div>";
    $buttonhtml += "</div>";
    $buttonarray.length > 1 ? $buttonhtml += '<div class="float-right">' : '';
    $buttonarray.length > 1 ? $buttonhtml +=
      '<div id="messagecancel" class="btn btn-secondary caps">' +
      $buttonarray[1] +
      "</div>" : '';
      $buttonarray.length > 1 ? $buttonhtml += "</div>" : '';
    $buttonhtml += "</div>";
    message = '<div class="text-center">'+message+'</div><br>';
    message += $buttonhtml;
  }
  $("#addadminmsg").html(icon + message);
  if ($("#lightBox").hasClass("hidden")) {
    $("#lightBox").removeClass("hidden ishidden");
    setTimeout(() => {
    }, 500);
    $("#addadminmsg").css("top",(($(window).height() - $("#addadminmsg").height())/2) + "px");
  }
  // $("#addadminmsg").clone().appendTo(".clonemsg");
  // $(".clonemsg").fadeIn(750);
  setTimeout(function () {
    // $(".clonemsg").fadeOut(750);
    // $(".clonemsg").html("");
    if (button == "en,ar,tr") {
      if (!$("#lightBox").hasClass("hidden")) {
        $("#lightBox").addClass("hidden ishidden");
        setTimeout(() => {
          }, 500);      
      }
    }
  }, 1500);
};
// messagecentre();

var sortTable = function sortTable(b, d=null) {
  if (typeof b !== "undefined") {
    var $table, $rows, $switching, $i, $x, $y, $shouldSwitch;
    if(d==null){
      $table = $(".alldivs").find("table");
    }else{
    $table = $(d);
    }
    $switching = true;
          /*Make a loop that will continue until
no switching has been done:*/
    while ($switching) {
      //start by saying: no switching is done:
      $switching = false;
      $rows = $table.children("tbody:not(.tarm)").children("tr");
      /*Loop through all table rows (except the
first, which contains table headers):*/
      for ($i = 0; $i+1 < $rows.length; $i++) {
        //start by saying there should be no switching:
        $shouldSwitch = false;
        /*Get the two elements you want to compare,
one from current row and one from the next:*/
        $x = $rows[$i].getElementsByTagName("td")[b];
        $y = $rows[$i + 1].getElementsByTagName("td")[b];
        //check if the two rows should switch place:
        if ($x.innerHTML.toLowerCase() > $y.innerHTML.toLowerCase()) {
          //if so, mark as a switch and break the loop:
          $shouldSwitch = true;
          break;
        }
      }
      if ($shouldSwitch) {
        /*If a switch has been marked, make the switch
and mark that a switch has been done:*/
        $rows[$i].parentNode.insertBefore($rows[$i + 1], $rows[$i]);
        $switching = true;
      }
    }
  }
};

var txtLang = function txtLang(en, ar, tr) {
  var cookie_name = "Lang";
  var lang = "";
  if (getCookie(cookie_name)) {
    lang = getCookie(cookie_name);
  } else {
    lang = "ar";
  }
  switch (lang) {
    case "tr":
      return tr;
      break;
    case "en":
      return en;
      break;
    case "ar":
      return ar;
      break;
    default:
      return ar;
      break;
  }
};

var pad = function pad(num, size) {
  var s = num + "";
  while (s.length < size) s = "0" + s;
  return s;
};

var tail = function tail(num, size) {
  var s = num + "";
  while (s.length < size) s = s + "0";
  return s;
};

var inputnum = function inputnum() {
  // client-side validation of numeric inputs, optionally replacing separator sign(s).
  $("div").on("keydown", "input[data-type='number']", function (e) {
    // allow function keys and decimal separators
    console.log(e.keyCode);
    if (
      // backspace, delete, tab, escape, enter, comma and .
      $.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 188, 190]) !== -1 ||
      // Ctrl/cmd+A, Ctrl/cmd+C, Ctrl/cmd+X
      ($.inArray(e.keyCode, [65, 67, 88]) !== -1 &&
        (e.ctrlKey === true || e.metaKey === true)) ||
      // home, end, left, right
      (e.keyCode >= 35 && e.keyCode <= 40)
    ) {
      /*
// optional: replace commas with dots in real-time (for en-US locals)
if (e.keyCode === 188) {
e.preventDefault();
$(this).val($(this).val() + ".");
}
*/
      // optional: replace decimal points (num pad) and dots with commas in real-time (for EU locals)
      if (e.keyCode === 110 || e.keyCode === 190 || e.keyCode === 188) {
        e.preventDefault();
        $(this).val($(this).val() + ",");
      }
      if (e.keyCode === 38) {
        e.preventDefault();
        $(this).val(parseInt($(this).val()) + 1);
      }
      if(typeof $(this).attr("data-max") !=="undefined"){
        if(parseInt($(this).val()) >= parseInt($(this).attr("data-max"))){
          $(this).val($(this).attr("data-max"));
        }
      }
      if (e.keyCode === 40) {
        e.preventDefault();
        $(this).val(parseInt($(this).val()) - 1);
      }
      if(typeof $(this).attr("data-min") !=="undefined"){
        if(parseInt($(this).val()) <= parseInt($(this).attr("data-min"))){
          $(this).val($(this).attr("data-min"));
        }
      }
        $(this).val($(this).val().replace(',,',','));
        return;
    }
    // block any non-number
    if (
      (e.shiftKey || e.keyCode < 48 || e.keyCode > 57) &&
      (e.keyCode < 96 || e.keyCode > 105)
    ) {
      e.preventDefault();
    }
  });
};
inputnum();

var getCookie = function getCookie(cname) {
  var name = cname + "=";
  var decodedCookie = decodeURIComponent(document.cookie);
  var ca = decodedCookie.split(";");
  for (var i = 0; i < ca.length; i++) {
    var c = ca[i];
    while (c.charAt(0) == " ") {
      c = c.substring(1);
    }
    if (c.indexOf(name) == 0) {
      return c.substring(name.length, c.length);
    }
  }
  return "";
};

var genkod = function genkod(selector){
  var redata = "";
  $.post("../include/genpass.php", 
  { genpass: "genpass" },
   function(data,status) {
    // $(selector).attr("data-genkod", "");
    return data;
  });
};

var setDateControl = function setDateControl(t=1){
      $(".DateControl").removeAttr("disabled");
    // $.datetimepicker.setLocale('tr');
    var $today = new Date();
    var $hours = ($today.getTime() + 18000000) / 1000 / 60 / 60 / 24;
    $hours = $hours - parseInt($hours);
    $hours = parseInt($hours * 24);
    var $minute = $today.getTime() / 1000 / 60 / 60 / 24;
    $minute = $minute - parseInt($minute);
    $minute = $minute * 24;
    $minute = $minute - parseInt($minute);
    $minute = parseInt($minute * 60);
    var $format = "yy-mm-dd " + pad($hours, 2) + ":" + pad($minute, 2);
    for (let index = 0; index < $(".DateControl").length; index++) {
      const element = $(".DateControl")[index];
      element.classList.add(index);
    var $dayonce = $(".DateControl." + index).attr("data-min");
    if(typeof $(".DateControl." + index).attr("data-max") !=="undefined"){
      var $daysonra = $(".DateControl." + index).attr("data-max");
    }else{
      var $daysonra = "+4D";
    }
      if (element.value.length > 0) {
        var $datecontrol = new Date(element.value);
        if ($today > $datecontrol) {
          $dayonce = new Date($datecontrol - $today);
          $dayonce = $dayonce / 1000 / 60 / 60 / 24;
          // $(".DateControl."+index).datetimepicker({theme:'darkx',minDate: $dayonce,});
          $(".DateControl." + index).datepicker(
            {
              minDate: $dayonce,
              maxDate: $daysonra,
              changeMonth: true,
              changeYear: true,
              firstDay: 1,
              showOtherMonths: true,
              selectOtherMonths: true,
              dateFormat: $format,
              showAnim: "clip",
              defaultDate: $datecontrol,
              beforeShowDay: function(date) {
              if(typeof $(this).attr("data-avdate") !=="undefined"){
                if($(this).attr("data-avdate").length>0){
                  var $avDays = $(this).attr("data-avdate").split(",");
                }
                }else{
                  var $avDays = ["1","2","3","4","5","6","0"];
                }
                var $noDays = [7];
                var $disDays = date.getDay();
                  if(($.inArray($disDays+'', $avDays)!==-1)){
                    // $noDays.push($disDays);
                    return [true,"",""];
                  }else{
                    return [false,"",""];
                  }
                // return $noDays;
                },
              onClose: function (selectedDate) {
                $(".DateControl." + index).datepicker(
                  "option",
                  "dateFormat",
                  "yy-mm-dd " +
                  $("select#TimeID-1 option:selected")
                  .text()
                  .substring(
                    $("select#TimeID-1 option:selected").text().length - 5,
                    $("select#TimeID-1 option:selected").text().length
                  )
                );
                $("select#TimeID-1").val($("select#TimeID-1").val());
              },
            },
            $.datepicker.regional[txtLang("tr","en","ar")]
          );
        } else {
          // $(".DateControl."+index).datetimepicker({theme:'darkx',minDate:'-1970/01/10'});
          $(".DateControl." + index).datepicker(
            {
              minDate: $dayonce,
              maxDate: $daysonra,
              changeMonth: true,
              changeYear: true,
              firstDay: 1,
              showOtherMonths: true,
              selectOtherMonths: true,
              dateFormat: $format,
              showAnim: "clip",
              defaultDate: $datecontrol,
              beforeShowDay: function(date) {
              if(typeof $(".DateControl." + index).attr("data-avdate") !=="undefined"){
                alert($(".DateControl." + index).attr("data-avdate"));
                if($(".DateControl." + index).attr("data-avdate").length>0){
                  var $avDays = $(".DateControl." + index).attr("data-avdate").split(",");
            }
              }else{
                var $avDays = ["1","2","3","4","5","6","0"];
            }
              var $noDays = [7];
              var $disDays = date.getDay();
                  if(($.inArray($disDays+'', $avDays)!==-1)){
                    // $noDays.push($disDays);
                    return [true,"",""];
                  }else{
                    return [false,"",""];
                  }
                // return $noDays;
              },
              onClose: function (selectedDate) {
                $(".DateControl." + index).datepicker(
                  "option",
                  "dateFormat",
                  "yy-mm-dd " +
                  $("select#TimeID-1 option:selected")
                  .text()
                  .substring(
                    $("select#TimeID-1 option:selected").text().length - 5,
                    $("select#TimeID-1 option:selected").text().length
                  )
                );
                $("select#TimeID-1").val($("select#TimeID-1").val());
              },
            },
            $.datepicker.regional[txtLang("tr","en","ar")]
          );
        }
      } else {
        // $(".DateControl."+index).datetimepicker({theme:'darkx',minDate:'-1970/01/10'});
        $(".DateControl." + index).datepicker(
          {
            minDate: $dayonce,
            maxDate: $daysonra,
            changeMonth: true,
            changeYear: true,
            firstDay: 1,
            showOtherMonths: true,
            selectOtherMonths: true,
            dateFormat: $format,
            showAnim: "clip",
            beforeShowDay: function(date) {
            if(typeof $(".DateControl." + index).attr("data-avdate") !=="undefined"){
            if($(".DateControl." + index).attr("data-avdate").length>0){
              var $avDays = $(".DateControl." + index).attr("data-avdate").split(",");
            }
            }else{
              var $avDays = ["1","2","3","4","5","6","0"];
            }
            var $noDays = [7];
            var $disDays = date.getDay();
            if(($.inArray($disDays+'', $avDays)!==-1)){
              // $noDays.push($disDays);
              return [true,"",""];
            }else{
              return [false,"",""];
            }
          // return $noDays;
            },
            onClose: function (selectedDate) {
              $(".DateControl." + index).datepicker(
                "option",
                "dateFormat",
                "yy-mm-dd " +
                $("select#TimeID-1 option:selected")
                .text()
                .substring(
                  $("select#TimeID-1 option:selected").text().length - 5,
                  $("select#TimeID-1 option:selected").text().length
                )
              );
              $("select#TimeID-1").val($("select#TimeID-1").val());
            },
          },
          $.datepicker.regional[txtLang("tr","en","ar")]
        );
      }
    }
    if(t==1){
      console.log(t);
    $(".clonemsg").load("../forms/sistemtime.drop.php", {
      FormSource: 1,
      idx:t,
      TimeText: $(".DateControl").val().substring(11, 16),
    }, function(){
      $(".clonemsg select#TimeID-"+t).not(".ui-datepicker-year.form-control").toggleClass("ui-datepicker-year form-control");
        $(".clonemsg select#TimeID-"+t).clone().appendTo("body div#ui-datepicker-div div.ui-datepicker-header div.ui-datepicker-title");
      // $(".clonemsg").html("");
    });
  }
};

var gotoHREF = function gotoHREF($value, $href){
console.log($value,$href);
if($value.length>0){
window.location = $href;
}else{
gotoHREF($value,$href);
}
};

var searchBar = function searchBar(alldivs=".alldivs", sum=0, sumhead="Total"){
$(alldivs).on("keyup", "div.addnewSearch form input[data-id='SearchBar']", function(e){
e.preventDefault();
var $Summing = 0;
var $Searching = $(this).val().toLowerCase();
var $foundSearch = 0;
sum>0 ? $(alldivs+" div.summing").html("") : "";
$(alldivs+" table tbody tr").each(function(){
$foundSearch = 0;
$(this).children("td").each(function(){
var $thtml = $(this).html().toLowerCase();
if($thtml.includes($Searching)===true){
$foundSearch = 1;
}
});
sum>0 && $foundSearch == 1 && $Searching.length > 0 ? $Summing += parseFloat($(this).children("td:nth-child("+sum+")").attr("data-val")) : "";
$foundSearch == 1?$(this).show("slow"):$(this).hide("slow");
$Summing > 0 ? $(alldivs+" div.summing").html(sumhead + new Intl.NumberFormat('tr-TR', { style: 'decimal', minimumFractionDigits: 2}).format(Number($Summing))) : "";
});

});
};
searchBar();

var login = function login() {
$(".listdiv").on("click", "button[id^='logbutton-']", function (e) {
  e.preventDefault();
  var $targetlog = $(this).attr("id").replace("logbutton-","");
  var $returnlog = $(this).attr("data-return");
  var url = "../logout/?targetlog="+$targetlog+"&returnlog="+$returnlog;
  // window.open(url,'_blank');
  window.location.replace(url);
});
$("body").on("click", "button[id^='logbutton-']", function (e) {
  e.preventDefault();
  var $targetlog = $(this).attr("id").replace("logbutton-","");
  var $returnlog = $(this).attr("data-return");
  var url = "../logout/?targetlog="+$targetlog+"&returnlog="+$returnlog;
  // window.open(url,'_blank');
  window.location.replace(url);
});
$(".addpanel").on("click", "button[id^='logbutton-']", function (e) {
  e.preventDefault();
  var $targetlog = $(this).attr("id").replace("logbutton-","");
  var $returnlog = $(this).attr("data-return");
  var url = "../logout/?targetlog="+$targetlog+"&returnlog="+$returnlog;
  // window.open(url,'_blank');
  window.location.replace(url);
});
$("body").on("click","a.share",function(e){
e.preventDefault();
var $sharetitle = $('body').attr('data-project');
var shareData = {
title: $sharetitle,
text: $(this).children("i").attr("data-title") + " " + $(this).children("i").attr("data-link"),
url: $(this).children("i").attr("data-link"),
}
if (navigator.share) {
navigator.share(shareData).then(() => {
//console.log('Thanks for sharing!');
})
.catch(console.error);
} else if (window.ReactNativeWebView) {
var shareObject = { 
title: $sharetitle, 
subject: $sharetitle,
message: $(this).children("i").attr("data-title") + " " + $(this).children("i").attr("data-link"),
url: $(this).children("i").attr("data-link"),
purpose:"Sharing",
}
window.ReactNativeWebView.postMessage(JSON.stringify(shareObject));
} else {
// fallback
$(this).parent("li").toggleClass("hidden");
}
});

$("body").on("click", "a[data-link]", function (e) {
  e.preventDefault();
  var $sisn = atob($(this).attr("data-link"));
  var $sid = $(this).attr("data-srv");
  var $dhref = $(this).attr("data-href");
  $.post(
    "../include/function.php",
    { SETSESSION: $sisn + "|" + $sid },
    function (data) {
      gotoHREF(data, $dhref);
    }
  );
});

$("form.newsubscription").on("submit",function(e){
  e.preventDefault();
  var $SubscriptionName = btoa(unescape(encodeURIComponent('Visitor')));
  var $SubscriptionEmail = btoa(unescape(encodeURIComponent($("form.newsubscription input[type='email']").val())));
  $("form.newsubscription input[type='email']").val().length > 0 ?
  $.post(
      "../datacontrol/newsubscription.dc.php",
      {
      newsubscriptionman: 'newsubscriptionadd',
      submit: "submit",
      SubscriptionID: '',
      SubscriptionName: $SubscriptionName,
      SubscriptionEmail: $SubscriptionEmail,
      SubscriptionStatus: 1,
      },
      function(data, status) {
      if (status == "success") {
      var $ardata = JSON.parse(data);
      if ($ardata[0].substring(0, 2) == "--") {
      var icon = "green";
      var datamsg = $ardata[0].substring(2);
      $("form.newsubscription input[name='email']").val('');
      } else {
      if ($ardata[0].substring(0, 2) == "++") {
      var icon = "yel";
      var datamsg = $ardata[0].substring(2);
      } else {
      var icon = "red";
      var datamsg = $ardata[0];
      }
      }
      messagecentre(icon, datamsg);
      }
      }
      ) : messagecentre('red', txtLang('Please Fill The Form','يرجى تعبئة النموذج','Lütfen formu doldurun'));
});

$("body").on("click", "form div[data-id='recordsubmitbtn']", function (e) {
e.preventDefault();
  var $thisform = $(this).closest("form");
var $error = 0;
if (
$(this).closest('form').find("input.MessageFrom").val().length > 0 &&
$(this).closest('form').find("input.MessageEmail").val().length > 0 &&
$(this).closest('form').find("input.MessagePhone").val().length > 0
) {
if($(this).closest('form').find("input.MessagePhone").val().substring(0,1) != "+"){
messagecentre('red',txtLang('Please Insert Country Code with "+" sign','الرجاء إدخال رمز الدولة مع علامة "+"','Lütfen "+" İşaretli Ülke Kodunu Girin'));
return;
}
if ($error == 0) {
$(this).closest('form').find("#divwaitwebmessage").css("display", "flex");
var $MessageFrom = btoa(unescape(encodeURIComponent($(this).closest('form').find("input.MessageFrom").val())));
var $MessageEmail = btoa(unescape(encodeURIComponent($(this).closest('form').find("input.MessageEmail").val())));
var $MessagePhone = btoa(unescape(encodeURIComponent($(this).closest('form').find("input.MessagePhone").val())));
var $MessageSubject = btoa(unescape(encodeURIComponent($(this).closest('form').find('input.MessageSubject').val())));
var $MessageBody = btoa( unescape( encodeURIComponent( $(this).closest("form").find("textarea.MessageBody").val() + " - " + $(this).closest("form").find("input.MessageDate").val() + " - " + $(this).closest("form").find("select.MessageDepartment option:selected" ).text() + " - " + $(this).closest("form").find("select.MessageTreatment option:selected" ).text() ) ) );

$.post(
"../datacontrol/webmessage.dc.php",
{
webmessageman: 'webmessageadd',
submit: "submit",
MessageID: '',
MessageFrom: $MessageFrom,
MessageEmail: $MessageEmail,
MessagePhone: $MessagePhone,
MessageSubject: $MessageSubject,
MessageBody: $MessageBody,
MessageStatus: 1,
},
function(data, status) {
if (status == "success") {
var $ardata = JSON.parse(data);
if ($ardata[0].substring(0, 2) == "--") {
var icon = "green";
var datamsg = $ardata[0].substring(2);
$.post(
'../include/webmessage.php',
{
webmessageman: 'webmessageadd',
submit: "submit",
MessageID: '',
MessageFrom: $MessageFrom,
MessageEmail: $MessageEmail,
MessagePhone: $MessagePhone,
MessageSubject: $MessageSubject,
MessageBody: $MessageBody,
},function (data) {
var $msg = txtLang( "The email has been sent successfully",  "تم ارسال البريد بنجاح" ,"E-posta başarıyla gönderildi");
var $msgr = txtLang( "please fill all the fields",  "يرجى تعبئة كل البيانات" ,"lütfen tüm alanları doldurun");
data ? messagecentre('green', $msg) : messagecentre('yel', $msgr);
  $thisform.trigger("reset");
  $thisform.hide(300);
  $("#contactpopup .st-video-popup-close").trigger('click');
  $("#contactpopup .st-video-popup-close").click();
  setTimeout(() => {
    window.location = '../thankyou';
  }, 2000);
}
);
} else {
if ($ardata[0].substring(0, 2) == "++") {
var icon = "yel";
var datamsg = $ardata[0].substring(2);
} else {
var icon = "red";
var datamsg = $ardata[0];
}
}
$(this).closest('form').find("#divwaitwebmessage").css("display", "none");
messagecentre(icon, datamsg);
}
}
);
var $SubscriptionAge = btoa(unescape(encodeURIComponent('')));
var toDate = new Date();
var $SubscriptionComingDate = (toDate.getYear() + 1900) + (toDate.getMonth() < 9 ? '-0' + (toDate.getMonth() + 1) : '-' + (toDate.getMonth() + 1)) + (toDate.getDate() < 10 ? '-0' + toDate.getDate() : '-0' + toDate.getDate());
var $SubscriptionPrice = '0';
var $SubscriptionDiagnosis = btoa(unescape(encodeURIComponent('')));

$.post(
"../datacontrol/newsubscription.dc.php",
{
newsubscriptionman: 'newsubscriptionadd',
submit: "submit",
SubscriptionID: '',
SubscriptionName: $MessageFrom,
SubscriptionPhone: $MessagePhone,
SubscriptionEmail: $MessageEmail,
SubscriptionAge: $SubscriptionAge,
SubscriptionMobile: $MessagePhone,
SubscriptionHealth: $MessageBody,
SubscriptionComingDate: $SubscriptionComingDate,
SubscriptionPrice: $SubscriptionPrice,
SubscriptionDiagnosis: $SubscriptionDiagnosis,
SubscriptionStatus: 1,
},
function(data, status) {
if (status == "success") {
console.log(data);
}
}
);
} else {
e.preventDefault();
$(this).closest('form').find("#divwaitwebmessage").css("display", "none");
$error = 0;
var $msg = txtLang( "you don't have the required privilege to do this action ",  "لا يوجد لديك الصلاحية لاتمام هذه العملية" ,"bu işlemi yapmak için gerekli ayrıcalığınız yok");
messagecentre("red", $msg);
}
} else {
e.preventDefault();
$(this).closest('form').find("#divwaitwebmessage").css("display", "none");
$error = 0;
var $msg = txtLang( "please fill all the fields",  "يرجى تعبئة كل البيانات" ,"lütfen tüm alanları doldurun");
messagecentre("yel", $msg);
}
});
$("body").on("change","form select.MessageDepartment",function(e){
e.preventDefault();
  var $this = $(this);
var $SelectedCategory = $(this).val();
$('div.clonemsg').load('../forms/treatments.drop.php',
{
    CategoryID: $SelectedCategory,
},
function(data){
    $.each($(this).closest('form').find('select.MessageTreatment option'), function(){
      $(this).attr('value') > '0' ? $(this).remove() : '';
    });
    $.each($('div.clonemsg select#TreatmentID option'), function(){
      $(this).attr('value') > '0' ? $(this).appendTo($this.closest('form').find('select.MessageTreatment')) : '';
    });

});
});
};  
login();

var alldivs = function alldivs(diva, divb="xx", alldvs=".alldivs"){
if(typeof $(alldvs).attr("class") != "undefined"){
$(alldvs).each(function(){
if(divb!="xx"){
// $(this).not($(diva)).not($(divb)).html(function(){$(this).not($(diva)).not($(divb)).hide("slow"); return "";});
$(this).not($(diva)).not($(divb)).hide(function(){
  // $(this).not($(diva)).not($(divb)).html(""); 
  return "slow";
});
$(divb).show("slow");
}else{
// $(this).not(diva).html(function(){$(this).not($(diva)).html("slow");return "";});
$(this).not(diva).hide(function(){
  // $(this).not($(diva)).html("");
return "slow";
});
}
});
console.log("show");
$(diva).show("slow");
$dateControl=0;
}
// loadhere();
};
var cachesToKeep = [''];
caches.keys().then(function(keyList) {
return Promise.all(keyList.map(function(key) {
if (cachesToKeep.indexOf(key) === -1) {
return caches.delete(key);
}
}));
});