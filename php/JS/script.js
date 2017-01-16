// Fonction qui se lance au chargement de la page

function onLoad(){

    // On récupère les éléments html suivant grâce au DOM
    var table = document.getElementById('tableau')
    var back = document.getElementById('retour');
    var equal = document.getElementById('egal');
    var signe = document.getElementById('multiplier');
    var chiffreTable = document.getElementsByClassName('chiffre');

    // Création d'une div qui contiendra la calcul
    var divCalcul = document.createElement("div");
    divCalcul.classList.add("resultat");
    document.body.appendChild(divCalcul);

    /*Création d'une boucle car getElementsByClassName retourne un tableau de valeur donc
    cela permet de pouvoir les sélectionner un par un afin de les rendre cliquable à souhait*/

    for(i = 0; i < 11; i++){
        chiffreTable[i].addEventListener('click', function(event){
            var valeur = event.target.value;
            // Si il y a plus de 3 valeur dans la div, on bloque les boutons * et =
            if(divCalcul.innerHTML.length > 3){
                valeur = '';
                equal.disabled = true;
                signe.disabled = true;
                // On fait une boucle pour bloquer tous les chiffres aussi
                for(i = 0; i < 10; i++){
                    chiffreTable[i].disabled = true;
                }

            // Sinon si l'utilisateur rentre plus de 3 caractères
            }else if(divCalcul.innerHTML.length >= 3){
                // le signe égal ne fonctionne plus(opération = à x*x et pas xx*x)
                equal.disabled = true;

                // Création d'un boutton qui indiquera que le calcul est impossible et qu'il faut recommencer
                var resetCalcul = document.createElement("input");
                resetCalcul.setAttribute('type', 'button');
                resetCalcul.setAttribute('id', 'resetCalcul')
                resetCalcul.value = 'Calcul impossible. Recommencez.'
                document.body.appendChild(resetCalcul);
                console.log('bouton resetOnce', resetCalcul);

                // Le clic rechargera la page et un nouveau calcul sera disponible
                resetCalcul.addEventListener('click', function(event){
                    window.location.reload();
                });
            }
            // On ajoute les chiffres et le signe * à la suite dans la div lorsque l'on clique dessus
            if(valeur < 10 || valeur == '*'){
                divCalcul.innerHTML += valeur;
            }
        })
    }

    // Lorsque l'on clique sur le bouton égal
    equal.addEventListener('click', function(event){

        // Création d'une div résultat qui affichera la réponse avec un effet fadeIn
        var divResultat = document.createElement("div");
        divResultat.classList.add("afficherResultat");
        var calcul = document.querySelector('.resultat').innerText;
        var finalResult = eval(calcul);
        document.body.appendChild(divResultat);
        divResultat.innerHTML = finalResult;

        // Si le résultat final vaut true
        if(finalResult){

            // On bloque le signe égal
            event.target.disabled = true;

            // On bloque le signe multiplier
            signe.disabled = true;

            // Boucle pour bloquer les boutons également
            for(i = 0; i < 10; i++){
                var chiffreTable = document.getElementsByClassName('chiffre');
                chiffreTable[i].disabled = true;
            }

            // On crée un bouton qui permet d'effectuer un nouveau calcul
            var reset = document.createElement("input");
            reset.classList.add("resetAll");
            reset.setAttribute('type', 'button');
            reset.value = 'Nouveau calcul'
            document.body.appendChild(reset);
            console.log('bouton reset', reset);

            // Au moment du clique, rechargement de la page qui permet un nouveau calcul
            reset.addEventListener('click', function(event){
                window.location.reload();
            })
        }
    })
}
