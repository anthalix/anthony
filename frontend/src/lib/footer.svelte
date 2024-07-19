<script>
  // @ts-nocheck

  import { link } from "svelte-spa-router";

  const nav_link = [
    {
      label: " Qui sommes nous",
      text: "",
      url: "/presentation",
    },
    {
      label: "Mentions légales",
      text: "",
      url: "/mentions",
    },
    {
      label: " Page  admin",
      text: "admin",
      url: "/admin",
    },
  ];

  const weekOpeningHours = [
    { id: 1, label: "Lundi", hours: "9h - 19h" },

    {
      id: 2,

      label: "Mardi",
      hours: "9h - 19h",
    },

    {
      id: 3,

      label: "Mercredi",
      hours: "9h - 19h",
    },

    {
      id: 4,

      label: "Jeudi",
      hours: "9h - 19h",
    },

    {
      id: 5,

      label: "Vendredi",
      hours: "9h - 19h",
    },

    {
      id: 6,

      label: "Samedi",
      hours: "9h - 19h",
    },
    { id: 0, label: "Dimanche", hours: "9h - 19h" },
  ];
  const date = new Date();
  const now = date.getDay();


function topFunction() {
  window.scrollTo({
    top: 200,
  });
}




</script>

<footer>
  
  <div class="coordonnées">
    <p>
      <strong>Notre adresse :</strong>
      <br />39 allée des petits chiens<br />35350 La Campagne
    </p>
    <p>
      <strong> Tel :</strong>
      <br />05-05-05-05-05 <br />
      <strong> Email : </strong>
      <br />orefuge@gmail.com
    </p>
    <ul>
      
        
       <li class="link">
      <a aria-label="Mentions légales"
        href="/mentions"
        use:link on:click={topFunction}><strong>Mentions légales</strong></a></li>
        <br />

      <li class="link">
        <a aria-label="Qui sommes nous" href="/presentation" use:link on:click={topFunction}
        >
        <strong>Qui sommes-nous</strong></a>
      </li>
    </ul>
  </div>

  <div class="cta">
    <div class="cta-title"><strong> HORAIRES :</strong></div>

    <ul class="list-hours">
      {#each weekOpeningHours as day}
        {#if day.id == now}
          <li class="list-hours-item-day">
            <strong>{day.label}</strong> : {day.hours}
          </li>
        {:else}
          <li class="list-hours-item">
            <strong>{day.label}</strong> : {day.hours}
          </li>
        {/if}
      {/each}
    </ul>

  </div>

</footer>


