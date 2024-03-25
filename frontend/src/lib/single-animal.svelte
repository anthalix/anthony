<script>
import {link} from 'svelte-spa-router'


const nav_link=[
    {
    "label" : "Page de contact",
    "text"  :"",
    "url"  :"/contact"

},
]

export let params ={};

const animals_id = params.id;

const get_animal = async (id) => {
    
  console.log(animals_id) 

    const response = await fetch( "http://127.0.0.1:8000/api/animals/" + id);
    
    const result = await response.json();

    return result;
}
function rtn() {
   window.history.back();
}




</script>






<div class = "container_single">

  

  {#await get_animal(animals_id)}
  <p> Récupération des données de l'espace </p>

  {:then data}


    <div class ="photos">

  


      <div class="slider-container">
        <div class="menu">
          <label for="slide-dot-1"></label>
          <label for="slide-dot-2"></label>
          <label for="slide-dot-3"></label>
        </div>
      
        <input id="slide-dot-1" type="radio" name="slides" checked />
        <div class="slide">
          <img class="slide-image" src="{data[0].pictures}" alt="Slide 1">
        </div>
      
        <input id="slide-dot-2" type="radio" name="slides" />
        <div class="slide">
          <!-- svelte-ignore a11y-missing-attribute -->
          <img class="slide-image" src="./src/assets/Animaux.jpg" alt="Slide 2">
        </div>
      
        <input id="slide-dot-3" type="radio" name="slides" />
        <div class="slide">
          <!-- svelte-ignore a11y-missing-attribute -->
          <img class="slide-image" src="./src/assets/refuge.jpg" alt="Slide 3">
        </div>
      </div>
      

              <button on:click= {rtn} class ="return_button" > <strong>Retour</strong></button>
            

              
           
    </div>



    <div class="presentation-single">


     <ul class="icons">

        <h3 class="title_icons">Affinités :</h3>

        {#if data[0].ok_dog == (1)}
        <li><img class="icons_img"src="./src/assets/icons/chien.png" alt="chien"></li>
        {/if}
        {#if data[0].ok_cat == (1)}
        <li><img class="icons_img"src="./src/assets/icons/chat.png" alt="chat"></li>
        {/if}
        {#if data[0].ok_kid == (1)}
        <li><img class="icons_img"src="./src/assets/icons/enfant.png" alt="enfant"></li>
        {/if}
      </ul>
     

        <h1 class="single">{data[0].name}</h1>
        
        <div class="single_infos">
        <h5> Age  :  {data[0].age} ans</h5>
        <h5> Race : {data[0].breed_name} </h5>
        <h5> Sexe : {data[0].sex}</h5>
        <h5> Taille : {data[0].size}</h5>
        <h5> Description :</h5>

          <p>{data[0].description}</p>
        </div>
        <div class="button">
        <a class='btn' aria-label="page de contact" href='/contact' use:link>Je veux l'adopter !</a>
        </div>

        


    </div>
   

{/await}
</div>


















    
