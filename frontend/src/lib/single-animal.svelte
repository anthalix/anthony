<script>
import {link} from 'svelte-spa-router'
import Carousel from 'svelte-carousel';



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

        <Carousel let:loaded>
          {#each data as animal, imageIndex (animal)}
            <div class="img-container">
              {#if loaded.includes(imageIndex)}
                <img src={`http://localhost:8000/${animal.pictures}`} alt="animal" />
              {/if}
            </div>
          {/each}
        </Carousel>
      




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


















    
