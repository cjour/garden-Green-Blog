class Ajax {

    constructor(url){
       this.url = url;
    }

    // Exécute un appel AJAX GET
    // Prend en paramètres la fonction callback appelée en cas de succès.

    ajaxGet(callback) {
        var xhr = new XMLHttpRequest();
        xhr.open("GET", this.url);
        xhr.addEventListener("load", function () {
            if (xhr.status >= 200 && xhr.status < 400) {
            var reponseAPI = JSON.parse(xhr.responseText);
            callback(reponseAPI);
            // Appelle la fonction callback en lui passant la réponse de la requête.
            } 
        });  

        xhr.send(null);   
    }         
};
