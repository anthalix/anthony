 <script>
   import { link } from "svelte-spa-router";

   const nav_link = [
      {
         label: "Page single",
         text: "",
         url: "/ficheAnimal/:id",
      },

   ];

const get_animals = async () => {
   
      const response = await fetch("http://127.0.0.1:8000/api/status");

      const result = await response.json();

      return result;
   };

</script>
 
 
 <h1 class ='title_home'> Nos adoptés</h1>


 <div class="trombinoscope-adopt">
    {#await get_animals()}
       <p>Chargement des adoptés...</p>
    {:then animals}
       {#each animals as animal}

 <div class="polaroid-images">
    <a href="/ficheAnimal/{animal.id}"
       
       title={animal.name}
       use:link
       

    >
       <!-- svelte-ignore a11y-img-redundant-alt -->
       <img 
       
          class="trombinoscope_profil-cat"
          src={animal.pictures}
          alt="image animals"
       />
    </a>
 </div>
 {/each}
 {:catch error}
 <p>Une erreur s'est produite : {error.message}</p>
{/await}
</div>