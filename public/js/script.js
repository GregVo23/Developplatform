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

                            let option = document.createElement('option');
                            option.setAttribute('value', data[i].id);
                            option.innerHTML = data[i].name;
                            select.appendChild(option);

                        }
                    }
                    
                  });
                }
              )
              .catch(function(err) {
                console.log('Fetch Error :-S', err);
              });
        });

}
