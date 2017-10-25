$(document).ready(function() {
    $('.supp').bind('click', function(e){
        e.preventDefault();
        var url= e.currentTarget.toString();
        var indexId = url.lastIndexOf('id');

        var xhr = new XMLHttpRequest();

        var parameters = url.substring(indexId);

        xhr.open("POST", "table_supp.php", true);
        xhr.setRequestHeader("Content-type",
        "application/x-www-form-urlencoded");
        xhr.send(parameters);

        xhr.onreadystatechange = function(){
            if (xhr.readyState == 4 && xhr.status == 200){
                // console.log(r.responseText);
                var obj = JSON.parse(xhr.responseText);
                console.log(obj);
                // console.log(obj['montableau']);
                $("main").innerHTML = obj;

            }
        };

    });
});
