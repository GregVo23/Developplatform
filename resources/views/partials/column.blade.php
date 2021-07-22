<script>

window.onload = function(){
  const APP_URL = '{{ env('APP_URL') }}'+'/api';
  const options = {
    method : 'GET',
    mode : 'cors',
  };

  const data = fetch(APP_URL+'/projets', options)
    .then(
      function(response) {
        if (response.status !== 200) {
          console.log('Error: ' +
            response.status);
          return;
        }

        // Examine the text in the response
        response.json().then(function(data) {
            console.log(data);
            return data;
        });
      }
    )
    .catch(function(err) {
      console.log('Fetch Error :-S', err);
    });


  let datas =
        [
            {"name":"greg", "email":"greg@aaa.com", "job":"artiste"},
            {"name":"sophie","email":"sophie@aaa.com", "job":"architecte"},
            {"name":"marc","email":"marc@aaa.com", "job":"pompier"},
            {"name":"jose","email":"jose@aaa.com", "job":"enseignant"},
            {"name":"myriam","email":"myriam@aaa.com", "job":"peintre"},
            {"name":"juliette","email":"juliette@aaa.com", "job":"vendeuse"},
        ];
  console.log(datas);

        //Les boutons
        let btEmail = document.querySelector('#email');
        let btName = document.querySelector('#name');
        let btJob = document.querySelector('#job');

        //L'input de recherche
        let rechercheInput = document.querySelector('#search');

        //Les variables
        let recherche;
        let response = [];
        let type = 'all';  //Ou email, job via les boutons

        //les evenements
        btEmail.addEventListener('click', () => {
            type = 'email';
            execution();
            rechercheInput.placeholder = "Rechercher par email";
        })
        btName.addEventListener('click', () => {
            type = 'name';
            execution();
            rechercheInput.placeholder = "Rechercher par nom";
        })
        btJob.addEventListener('click', () => {
            type = 'job';
            execution();
            rechercheInput.placeholder = "Rechercher par job";

        })
        rechercheInput.addEventListener('keyup', () => {
            execution()
        })

        // On recupere la div ou l'on veut afficher via le selecteur
        let affichage = document.querySelector("#affichage");



        /**
         * fonctions de triage
         * recherche = la donnée a rechercher (string, number ...)
         *
         * @param { String } recherche = la donnée a rechercher rentrer via l'input search
         * @param { Tab with Objects } data = les données
         * @return { Tab with Objects } response
         */

        function triage(recherche, data){

            let regex = new RegExp(recherche, 'g');

            data.filter(function(item){
                let choiceUserSearch = item.name;  //Si l'utilisateur a cliquer sur le bouton de recherche email, nom, job par défaut sur name ...
                if(type === 'email'){
                    choiceUserSearch = item.email;
                }else if(type === 'job'){
                    choiceUserSearch = item.job;
                }
                if(choiceUserSearch.match(regex))
                {
                    if((response.indexOf(item) != -1) === false){  //Si l'élément item n'est pas déjà dans le tableau alors ...
                        response.push(item);
                    }
                }
            });
            return response;
        }

        /**
         * fonction pour affichage des données
         *
         * @param { String } rep = Les données à afficher dans un <ul><li><a> -> J'imagine que 'il faudra créer une route avec une méthod (comme avant mais vers un autres controlleur qui renvois les données à affficher)'
         * @param { Tab with Objects } data = les données à rechercher choisie via les boutons (name, job, email)
         */

        function afficher(rep, type){

            let ul = document.createElement('ul');    //On crée le <ul>
            ul.setAttribute('style', 'padding: 0; margin: 0;');  //On lui donne des attributs
            ul.setAttribute('id', 'personnes');

            for (i = 0; i <= response.length - 1; i++) {

                let li = document.createElement('li');  //On crée un <li> dans la boucle
                li.setAttribute('style', 'display: block;');  //On lui donne des attributs
                let a = document.createElement('a');    //On crée un <a> dans la boucle
                a.setAttribute('href', '#LaRouteQuilFautEnvoyerVersLeControleurAvecLIDduUserPourExecuterUneFonctionPourAfficherLeUserCliqueEnDessous');             // --->  ICI IL FAUT FAIRE QQCHOSE AVEC LA ROUTE
                a.setAttribute('style', 'text-decoration: none;');             //Juste enlever le fait que les links sont soulignés
                ul.appendChild(li);   //On dit que les <li> sont des enfants de <ul>
                if(type === 'all'){
                    a.innerHTML = "<b>Nom:</b>"+response[i].name+"<br>   <b>Email:</b>"+response[i].email+"<br>   <b>Job:</b>"+response[i].job;
                }else if(type === 'name'){
                    a.innerHTML = "<b>Nom:</b>"+response[i].name;
                }else if(type === 'email'){
                    a.innerHTML = "<b>Email:</b>"+response[i].email;
                }else if(type === 'job'){
                    a.innerHTML = "<b>Job:</b>"+response[i].job;
                }
                li.appendChild(a);     //On dit que les <a> sont des enfants des <li>
            }
            affichage.appendChild(ul);  //On dit que le <ul> est un enfant de la <div> qui a l'id : affichage
        }

        /**
         * fonction pour traiter l'envois et nettoyer les variables et également éviter des répétitions de code
         *
         */

        function execution(){
            response = [];   //On vide la tableau si non les recherches sont répétées car restent dans le tableau ... Donc a chaque action on le vide
            affichage.innerHTML = "";   //On vide la div d'affichage si non les recherches sont répétées car restent visible sur la page ... Donc a chaque action on la vide
            recherche = rechercheInput.value;
            if(recherche != ''){
                let rep = triage(recherche, data);
                afficher(rep, type);
            }else{
                affichage.innerHTML = "";    //Si la recherche (car supprimée par exemple) est vide alors on efface l'affichage sur la page
            }
        }



  // 1. css in js
  /*
  let lastKnownScrollPosition = 0;
  let ticking = false;
  let footer = document.querySelector('#footer');

  function doSomething(scrollPos) {

    let position = window.pageYOffset;

    if(position === 0){
      document.querySelector('#sidebar').style.position = 'fixed';
      document.querySelector('#sidebar').style.width = '30%';
      document.querySelector('#sidebar').style.transition = 'background-color 0.3s ease';
      document.querySelector('#sidebar').style.backgroundColor = 'white';
      document.querySelector('#sidebar').style.display = 'flex';
    }
    if(position>10){

      document.querySelector('#sidebar').style.position = 'fixed';
      document.querySelector('#sidebar').style.width = '30%';
      document.querySelector('#sidebar').style.transition = 'background-color 0.3s ease';
      document.querySelector('#sidebar').style.backgroundColor = 'transparent';
      document.querySelector('#sidebar').style.display = 'flex';
    }
    if(position>30){

      document.querySelector('#sidebar').style.display = 'none';

    }
    if(position>300){

      document.querySelector('#sidebar').style.display = 'flex';
      document.querySelector('#sidebar').style.width = '30%';

    }
    if(position>350){
      document.querySelector('#sidebar').style.position = 'fixed';
      document.querySelector('#sidebar').style.width = '30%';
      document.querySelector('#sidebar').style.transition = 'background-color 0.4s ease';
      document.querySelector('#sidebar').style.backgroundColor = 'white';
    }
  }

  document.addEventListener('scroll', function(e) {
    lastKnownScrollPosition = window.scrollY;

    if (!ticking) {
      window.requestAnimationFrame(function() {
        doSomething(lastKnownScrollPosition);
        ticking = false;
      });

      ticking = true;
    }
  });
}
*/
</script>

<!-- This example requires Tailwind CSS v2.0+ -->


<nav class="space-y-1" aria-label="Sidebar" x-data="{categories: false}">
    <livewire:search/>


  <input id="search" class="border leading-none border-gray-500
  dark:border-gray-600 select-none block w-full bg-white bg-opacity-20 py-2 pl-10 pr-3 rounded-md mb-6 text-gray-900 placeholder-gray-500 focus:outline-none focus:bg-opacity-100 focus:border-transparent focus:placeholder-gray-700 focus:ring-0 sm:text-sm" placeholder="Recherche par mot clé" type="search" name="search">
  <button id="email">email</button>
  <button id="name">name</button>
  <button id="job">job</button>

  <div id="affichage"></div>

  <h3>Les catégories</h3>

  @if(session()->get('categories') !== NULL)

    @foreach (session()->get('categories') as $category)

    <a href="#" @click.prevent ="categories = !categories" class="bg-gray-100 text-gray-900 group flex items-center px-3 py-2 text-sm font-medium rounded-md" aria-current="page">
        <!--
        Heroicon name: outline/home

        Current: "text-gray-500", Default: "text-gray-400 group-hover:text-gray-500"
        -->
        <!-- Heroicon name: outline/folder -->
        <svg class="text-gray-400 group-hover:text-gray-500 flex-shrink-0 -ml-1 mr-3 h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
        </svg>
        <span class="truncate">
        {{ $category->name }}
        </span>
    </a>

        @foreach ($category->sub_category as $sub_category)

        <a x-show="categories" href="#" class="text-gray-600 hover:bg-gray-50 hover:text-gray-900 group flex items-center px-3 py-2 text-sm font-medium rounded-md">
        <!-- Heroicon name: outline/users -->
        <svg class="text-gray-400 group-hover:text-gray-500 flex-shrink-0 -ml-1 mr-3 h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z" />
        </svg>
        <span class="truncate">

            {{ $sub_category->name ? $sub_category->name : "Pas de sous-catégories" }}

        </span>
        </a>

        @endforeach

    @endforeach

  @endif

</nav>
