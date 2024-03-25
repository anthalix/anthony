<script>
    import { fly, scale } from 'svelte/transition';
    import { quadOut } from 'svelte/easing';
  import { link } from "svelte-spa-router";


    export let open;
</script>

{#if open}
  
    <div class="menu_navbar">
    <li class="menu_navbar-link">
      <a aria-label="page d'accueil" href="/" use:link>Accueil</a>
    </li>
    <li class="menu_navbar-link">
      <a aria-label="page conditions" href="/conditions" use:link
        >Conditions d'adoption</a
      >
    </li>
    <li class="menu_navbar-link">
      <a aria-label="page contact" href="/contact" use:link>Contact</a>
    </li>
    <li class="menu_navbar-link">
      <a aria-label="page animaux adoptés" href="/adoptes" use:link
        >Animaux adoptés</a
      >
    </li>
</div>
  

    <div class="bar" transition:scale={{ duration: 750, easing: quadOut, opacity: 1 }} />
{/if}



