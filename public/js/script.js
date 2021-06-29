console.log("Ca marche");
window.onload = () => {





    let category = document.querySelector('#category');
        category.addEventListener('change',() => {

            let dataId = category.querySelector(':checked').getAttribute('data-id');
            const APP_URL = 'http://localhost:8000/api';
            const options = {
              method : 'GET',
              mode : 'cors',
            };

            const projets = fetch(APP_URL+'/subcategories', options)
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

                      let select = document.querySelector('#subCategory');
                      var length = select.options.length;
                      for (i = length-1; i >= 0; i--) {
                          select.options[i] = null;
                      }

                      for (i = 0; i <= data.length - 1; i++) {
                        if(data[i].category_id == dataId){

                            let option = document.createElement('option');  //On crée un <li> dans la boucle
                            //option.setAttribute('style', 'display: block;');  //On lui donne des attributs
                            let a = document.createElement('a');    //On crée un <a> dans la boucle
                            a.setAttribute('href', '#LaRouteQuilFautEnvoyerVersLeControleurAvecLIDduUserPourExecuterUneFonctionPourAfficherLeUserCliqueEnDessous');             // --->  ICI IL FAUT FAIRE QQCHOSE AVEC LA ROUTE
                            a.setAttribute('style', 'text-decoration: none;');             //Juste enlever le fait que les links sont soulignés
                            select.appendChild(option);   //On dit que les <li> sont des enfants de <ul>
                            a.innerHTML = data[i].name;
                            option.appendChild(a);     //On dit que les <a> sont des enfants des <li>

                        }
                    }
                    //affichage.appendChild(select);  //On dit que le <ul> est un enfant de la <div> qui a l'id : affichage

                  });
                }
              )
              .catch(function(err) {
                console.log('Fetch Error :-S', err);
              });
        });

}
