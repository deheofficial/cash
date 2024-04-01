function grabAjax(ids,urls){
    //alert("hahaha");
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
