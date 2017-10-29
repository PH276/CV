function supp(id){

    var indexId = id;
    var xhr = new XMLHttpRequest();
    var parameters = "id="+id;

    xhr.open("POST", "table_supp.php", true);
    xhr.setRequestHeader("Content-type",
    "application/x-www-form-urlencoded");
    xhr.send(parameters);

    // -----------------------------------------------------

    var xhr = new XMLHttpRequest();

    xhr.open("GET", "table_liste.php", true);
    xhr.setRequestHeader("Content-type",
    "application/x-www-form-urlencoded");
    xhr.send();

    xhr.onreadystatechange = function(){
        if (xhr.readyState == 4 && xhr.status == 200){
            var obj = JSON.parse(xhr.responseText);
            $("head title").html(obj.titre_page);
            $("#affichage").html(obj.a_afficher);
        }
    };
}

// $('form')
function enregistrer(id){
    console.log(id);
}

function form_ajout(id){
    var xhr = new XMLHttpRequest();

    xhr.open("POST", "table_form.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send("id="+id);

    xhr.onreadystatechange = function(){
        if (xhr.readyState == 4 && xhr.status == 200){
            var obj = JSON.parse(xhr.responseText);
            $("#affichage").html(obj);
        }
    };

}
