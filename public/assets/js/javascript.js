/*************
 * MENU
 *
 *************/

/**
 * Fonction de filtre
 */
function filtrer(caracteristique) {
    var cartes, i;
    cartes = document.getElementsByClassName("carte");

    // itération sur les cartes
    for (i = 0; i < cartes.length; i++) {

        //cartes.forEach.call(carte => console.log(carte.className));
        if (cartes[i].classList.contains(caracteristique)){
            ajouterClasse(cartes[i], "show");
        }
        supprimerClasse(cartes[i], "show");

        // Si la carte possède la caracteristique
        if (cartes[i].className.indexOf(caracteristique) > -1) {
            ajouterClasse(cartes[i], "show");
        }
    }
}

// /**
//  * Ajoute la classe 'nom' a l'élément 'element' si celle-ci n'est pas présente
//  */
// function ajouterClasse(element, nom) {
//     var i, classes
//     classes = element.className.split(" ");
//     if (classes.indexOf(nom) == -1) {
//         element.className += " " + nom;
//     }
// }
//
// /**
//  * Supprime la classe 'nom' de l'élément 'element' si celle-ci est présente
//  */
// function supprimerClasse(element, nom) {
//     var i, arr1;
//     arr1 = element.className.split(" ");
//     while (arr1.indexOf(nom) > -1) {
//         arr1.splice(arr1.indexOf(nom), 1);
//     }
//     element.className = arr1.join(" ");
// }

// Ajout de la classe 'active' au bouton sélectionné
//var menu = document.getElementById("menu");

// var btns = menu.getElementsByClassName("btn");
// for (var i = 0; i < btns.length; i++) {
// 	btns[i].addEventListener("click", function () {
// 		var current = document.getElementsByClassName("active");
// 		current[0].className = current[0].className.replace(" active", "");
// 		this.className += " active";
// 	});
// }

//filtrer("");


/*************
 * MODALE
 *
 *************/
// document.getElementById("modale").style.display="none";

function openModal(animalTab) {
    console.log(animalTab);

    createModal(animalTab);
    var modal = document.getElementById("modale");
    modal.style.display = "block";
}

function closeModal() {
    var modal = document.getElementById("modale");
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function (event) {
    if (event.target !== modal) {
        modal.style.display = "none";
    }
}

function createModal(animal) {
    // animal = getDetails(nomAnimal);

    var modale = document.getElementById("modale");
    var modaleContent = document.getElementById("content-modal");

    modaleContent.innerHTML = "<h2>" + animal[0] + "</h2>" +
        "<ul>" +
        "<li>Nom scientifique : " + animal[1] + "</li>" +
        "<li>Lieu de vie : " + animal[2] + "</li>" +
        "<li>Famille : " + animal[3] + "</li>" +
        "<li>Régime alimentaire : " + animal[4] + "</li>" +
        "</ul>";
    modale.style.display="block";
    modaleContent.style.display="block";
    console.log(modaleContent);
}

// Recherche des details de l animal en fonction de son nom
// function getDetails(nomAnimal) {
//     console.log('RECHERCHE : ' + nomAnimal);
//
//     for (let i = 0; i < animaux.length; i++) {
//         console.log(animaux[i]);
//         if (nomAnimal === animaux[i].nom) {
//             console.log("Trouvé !!!!");
//             return animaux[i];
//         }
//     }
// }

//
// var animaux = [
//     {
//         nom: 'LION',
//         nomScientifique: 'Panthera leo',
//         lieu: 'Savane africaine',
//         famille: 'Félidé',
//         regime: 'Carnivore',
//         image: ''
//     },
//     {
//         nom: 'ELEPHANT',
//         nomScientifique: 'Loxodonta',
//         lieu: 'dans les flaques d\'eau',
//         famille: 'Eléphantidé',
//         regime: 'Herbivore',
//         image: ''
//     },
//     {
//         nom: 'HYENE',
//         nomScientifique: 'Crocuta crocuta',
//         lieu: 'Afrique subsaharienne',
//         famille: 'Hyénidé',
//         regime: 'Carnivore',
//         image: ''
//     },
//     {
//         nom: 'CHIMPANZE',
//         nomScientifique: 'Pan Troglodyte',
//         lieu: 'dans les arbres',
//         famille: 'Hominidé',
//         regime: 'Omnivore',
//         image: ''
//     },
//     {
//         nom: 'GIRAFE', nomScientifique: 'Girafus', lieu: '', famille: '', regime: '', image: ''
//     },
//     {
//         nom: 'SURICATE', nomScientifique: 'Suricatoume', lieu: '', famille: '', regime: '', image: ''
//     },
//
// ]
//

