<script>
   // @ts-nocheck
   
      import { link } from "svelte-spa-router";
   
      let selectedRace = "Race";
      let selectedSexe = "Sexe";
      let selectedTaille = "Taille";
      let selectedAge = "Age";
   
      const nav_link = [
         {
            label: "Page single",
            text: "",
            url: "/ficheAnimal/:id",
         },
      ];
   
      const get_cats = async () => {
         const response = await fetch("http://127.0.0.1:8000/api/cats");
   
         const result = await response.json();
   
         return result;
      };
      const get_breeds = async () => {
         const response = await fetch("http://127.0.0.1:8000/api/breeds");
   
         const result = await response.json();
   
         return result;
      };
      
     let breeds=[];

   
   
   
   
   
     
   </script>
   
   <h1 class="pet">Nos Chats</h1>
   
   <div class="dog">
      <div class="critere">
         <h2 class="title-critere">Trier par :</h2>
   
         <div class="critere-form">
            <form class="form">
               <select bind:value="{selectedRace}"aria-label="tri par race" class="selectpicker">
                  <option> RACE</option>
   
                  {#await get_cats()}
                     <p>Chargement des races...</p>
                  {:then cats}
                     {#each cats as animal}
                  {#if !breeds.includes( animal.breed_name)}

                        <option>{animal.breed_name}</option>
                     {breeds.push(animal.breed_name)}
                     {/if}
                       
                     {/each}
                  {/await}
               </select>
               <select  bind:value="{selectedSexe}"aria-label="tri par sexe"  class="selectpicker">
                  <option>Sexe</option>
                  <option>Male</option>
                  <option>Femelle</option>
               </select>
               
                  <select bind:value="{selectedTaille}"aria-label="tri par taille" class="selectpicker">
                  <option>Taille</option>
                  <option>Petit</option>
                  <option>Moyen</option>
                  <option>Grand</option>
               </select>
               <select bind:value="{selectedAge}"aria-label="tri par age"class="selectpicker">
                  <option>Age</option>
                  <option value= '1'>1 ans et -</option>
                  <option value = '2'>2 à 5 ans</option>
                  <option value ='3'>6 ans et +</option>
                  
   
               </select>
   
            </form>
         </div>
      </div>
   
      
   <div class="trombinoscope">
            {#await get_cats()}
               <p>Chargement des chats...</p>
            {:then cats}
               {#each cats as animal}








               {#if selectedSexe !== "Sexe" || selectedTaille !== "Taille" || selectedAge !== "Age" || selectedRace !== "race" }
               {#if (selectedSexe === "Sexe" || animal.sex === selectedSexe)
                && (selectedTaille === "Taille" || animal.size === selectedTaille)
                 && (selectedAge === "Age" || (selectedAge === '1' && animal.age <= 1 ) ||(selectedAge ==='2' && animal.age >= 2 && animal.age <= 5) || (selectedAge === '3' && animal.age >= 6))
                  && (selectedRace === "Race" || animal.breed_name === selectedRace)}

         <div class="polaroid-images">
            <a href="/ficheAnimal/{animal.id}"title="{animal.name}"use:link>
               <!-- svelte-ignore a11y-img-redundant-alt -->
               <img class="trombinoscope_profil-cat" src={animal.pictures} alt="image chats à adopter"/>
            </a>
         </div>
        {/if}
        {:else}

        {#if selectedSexe === "Sexe" || selectedTaille === "Taille" || selectedAge === "Age" || selectedRace === "race" }

        <div class="polaroid-images">
           <a href="/ficheAnimal/{animal.id}"title="{animal.name}"use:link>
              <!-- svelte-ignore a11y-img-redundant-alt -->
              <img class="trombinoscope_profil-cat" src={animal.pictures} alt="image chats à adopter"/>
           </a>
        </div>
        {/if}
       
     {/if}



   {/each}
   
   {:catch error}
   <p>Une erreur s'est produite : {error.message}</p>
   {/await}
      </div>
   </div>
   