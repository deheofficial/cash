$(function() {

    $('.btn-link[aria-expanded="true"]').closest('.accordion-item').addClass('active');
  $('.collapse').on('show.bs.collapse', function () {
	  $(this).closest('.accordion-item').addClass('active');
	});

  $('.collapse').on('hidden.bs.collapse', function () {
	  $(this).closest('.accordion-item').removeClass('active');
	});

    

});


function showAJAX(elementID,URLs)

{      

    // alert("testing");

     // alert(URLs);

    if(document.getElementById('loading'))

        document.getElementById('loading').style.display='none';

    

    xmlhttp = GetXmlHttpObject();

        

    if (xmlhttp==null)

      {

      alert ("Browser does not support HTTP Request");

      return;

      }

    var urls=URLs;

   

    xmlhttp.onreadystatechange=function()

      {

       if (xmlhttp.readyState==4 && xmlhttp.status==200)

        {

        	// alert(xmlhttp.responseText);

          //document.getElementById(elementID).innerHTML=xmlhttp.responseText;

          $("#"+elementID).html(xmlhttp.responseText);

		  // alert(xmlhttp.responseText);

          document.getElementById('loading').style.display='none';  

        }

      }

    xmlhttp.open("GET",urls,true);

    xmlhttp.send(null);

   

    

}


function grabAjax(ids,urls){

    // alert("hahaha");

    $.ajax({

        url: urls,

        async: false,

        type: "POST",

        data: "",

        datatype: "html",



        success: function(data){

            //alert(data);

            $("#"+ids).html(data);

        }

    });



}