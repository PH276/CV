$('#formulaire').on('submit', function(e){
    e.preventDefault();
    tab = $(this)[0].elements;
    parameters = '';
    var i, j=0;

    for (i=1;i<tab.length;i++){
        j++;
        if (i==tab.length-1) {
            parameters += tab[i].name + "=" + tab[i].value;
        }else{
            parameters += tab[i].name + "=" + tab[i].value + '&';
        }
    }
    console.log( j);
    console.log(parameters);
    var xhr = new XMLHttpRequest();

    xhr.open("POST", "table_ins.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send(parameters);

    xhr.onreadystatechange = function(){
        if (xhr.readyState == 4 && xhr.status == 200){
            var obj = JSON.parse(xhr.responseText);
            // $("#affichage").html(obj);
        }
    };


    // console.log($(this)[0].elements);
    // console.log($(this)[0].elements['c_niveau'].value);
});

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

$('#frm').on('submit', function(e){
    e.preventDefault();
    var id = this.id.value;
    var competence = this.competence.value;
    var c_niveau = this.c_niveau.value;
    console.log(competence + ' ' + c_niveau);
    
})

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
