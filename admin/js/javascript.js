$(document).ready(function() {

    // $('#menu li a').on('click', function(e){
    $('.menu-ajax').on('click', function(e){
        e.preventDefault();
        var url= e.currentTarget.toString();
        var indexTable = url.lastIndexOf('table');

        var xhr = new XMLHttpRequest();

        var parameters = url.substring(indexTable);

        xhr.open("POST", "table_liste.php", true);
        xhr.setRequestHeader("Content-type",
        "application/x-www-form-urlencoded");
        xhr.send(parameters);
        // $(this).unbind('click').submit();

        xhr.onreadystatechange = function(){
            if (xhr.readyState == 4 && xhr.status == 200){
                // console.log(r.responseText);
                // console.log(xhr.responseText);
                var obj = JSON.parse(xhr.responseText);
                // console.log(obj['montableau']);
                $('#affichage').html(obj);
                // console.log(obj);
            }
        };

    });

});
