<script>
  import { link } from "svelte-spa-router";
  import { Hamburger } from "svelte-hamburgers";
  import Menu from "./menu.svelte";

  let open;

  const nav_links = [
    {
      label: "Page d 'accueil",
      text: "Accueil",
      url: "/",
    },

    {
      label: "Page conditions",
      text: "Conditions d'adoption",
      url: "/conditions",
    },
    {
      label: "Page animaux adoptés",
      text: "Animaux adoptés",
      url: "/adoptés",
    },
    {
      label: "Page de contact",
      text: "Contact",
      url: "/contact",
    },
    {
      label: "page login",
      text: "login",
      url: "/login",
    },
  ];
</script>

<header>
  <div id="mainNav">
    <img class="logo" src="./src/assets/logo.png" alt="Logo de l'entreprise" />

    <ul id="navbar-nav">
      <li class="navbar-link">
        <a aria-label="page d'accueil" href="/" use:link>Accueil</a>
      </li>
      <li class="navbar-link">
        <a aria-label="page conditions" href="/conditions" use:link
          >Conditions d'adoption</a
        >
      </li>
      <li class="navbar-link">
        <a aria-label="page contact" href="/contact" use:link>Contact</a>
      </li>
      <li class="navbar-link">
        <a aria-label="page animaux adoptés" href="/adoptes" use:link
          >Animaux adoptés</a
        >
      </li>
    </ul>
    <div class="burger">
      <Hamburger bind:open />
    </div>
    <Menu bind:open />
  </div>
</header>
