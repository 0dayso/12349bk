 define(function(require, exports) {
   var $ = require('jquery');
   var attachFastClick = require('fastclick');
   var Mobilebone = require("mb");


   Mobilebone.init();
   attachFastClick(document.body);

   document.addEventListener('touchmove', function(e) {
     e.preventDefault();
   }, false);


   $(".footer h4").click(function() {
     $(".footer h4").removeClass('active');
     $(this).addClass('active');
   });



   function getHash() {
     var hash = window.location.hash;
     var hashID = '';
     if (hash.indexOf(".php") != -1) {
       hashID = (window.location.hash.split("#&")[1]).split(".php")[0];
     } else {
       hashID = window.location.hash.split("#&")[1];
     }

     return hashID;
   }



   function doCheck(page_in) {

     var pageID = page_in;
     var moduleList = ['index', 'feedback','order'];

     $(".footer h4").removeClass('active');
     if (pageID == "index") {
       $(".footer h4").eq(0).addClass('active');
     } else if (pageID == "order") {
       $(".footer h4").eq(1).addClass('active');
     } else if (pageID == "my") {
       $(".footer h4").eq(2).addClass('active');
     }

     for (var i = 0; i < moduleList.length; i += 1) {
       if (pageID == moduleList[i]) {
         modulePath = "./module/" + pageID;
         require.async(modulePath, function(ex) {
           if (ex) ex.init(page_in);
         });
         break;
       }
     }


     $(".page").removeClass("in").addClass('out');
     $("#" + pageID).removeClass("out").addClass('in');
   }


   Mobilebone.animationend = function() {};
   Mobilebone.animationstart = function(page_in) {};
   Mobilebone.onpagefirstinto = function(page_in) {};


   Mobilebone.fallback = function(page_in, page_out) {};


   Mobilebone.callback = function(page_in) {

     doCheck(getHash());

   }



   doCheck(getHash());


 })