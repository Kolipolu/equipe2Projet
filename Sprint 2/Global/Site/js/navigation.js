//Envoie la requete au serveur et retourne la réponse.
function Requete(callback){
    $.ajax({
        type: "POST",
        url: Url(arguments) ,
        success: function(data){
            callback(data);
        }
    });
}

function UploadFile(callback){
    var file_data = $('#file').prop('files')[0];   
    var form_data = new FormData();                  
    form_data.append('file', file_data);
    
    $.ajax({
        url: Url(arguments), 
        dataType: 'text',  
        cache: false,
        contentType: false,
        processData: false,
        data: form_data,                         
        type: 'post',
        success: function(data){
            callback(data);
        }
    });
}

//Construit l'URL selon les derniers paramètre de la fonction Execute.
function Url(){
    var url = "";
    var parametre = arguments[0][1];
    
    for(var i = 1; i < parametre.length; i++){
        url += parametre[i];
        url = url.replace(/(?:\r\n|\r|\n)/g, '\\n');
    }
    
    return url;
}
 
//Affiche la page selon l'url demandé.
function AfficherPage(xhttp){
    var page = $.parseJSON(xhttp);
    $(".stagiaireContainer").empty();
    $(".stagiaireContainer").append(page);
    CacherDiv();
}

//Éxecute une page PHP sans l'afficher.
function ExecuteQuery(xhttp){
    $.parseJSON(xhttp);
}

//Selon le choix, éxecute la fonction demandé. C'est la fonction qui doit être appelée
//sur les OnClicks. Tous les paramètres qui se trouvent après "choix" sont utilisés pour
//construire l'url.
function Execute(choix){
    switch(choix){
        case 1: Requete(AfficherPage, arguments);
            break;
        case 2: Requete(ExecuteQuery, arguments);
            break;
        case 3: UploadFile(ExecuteQuery, arguments);
    }
}