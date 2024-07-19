<script>
    import { link } from "svelte-spa-router";

    const nav_link = [
        {
            label: "Page des chiens",
            text: "Chien",
            url: "/chiens",
        },
        {
            label: "page des chats",
            text: "Chats",
            url: "/chats",
        },
        {
            label: "page test",
            text: "Chats",
            url: "/test",
        },
    ];
</script>

<h1 class="title_home">Refuge pour Chiens et Chats</h1>

<h2>Je souhaite adopter un</h2>
<div class="container">
    <div class="polaroid-images-home">
        <a href="/chiens" title="CHIENS " use:link>
            <!-- svelte-ignore a11y-img-redundant-alt -->
            <img
                class="photo_accueil"
                src="./src/assets/Sensei-dog.jpg"
                alt="image chien"
            />
        </a>
    </div>

    <div class="polaroid-images-home-cat">
        <a href="/chats" title="CHATS " use:link>
            <!-- svelte-ignore a11y-img-redundant-alt -->
            <img
                class="photo_accueil"
                src="./src/assets/Pyko-cat.jpg"
                alt="image chat"
            />
        </a>
    </div>
</div>
<div class="presentation">
    <p>
        O’refuge est une Association loi 1901 ayant pour mission le sauvetage et
        l’adoption d’animaux de chiens et de chats.<br /><br />

        Fondé en 2023, notre refuge est basé en Ille et Vilaine, en Bretagne, et
        comprend 4 bénévoles et de nombreuses familles d’accueil.<br /><br />
        Nous avons décidé, en créant ce refuge pour chiens et chats, de consacrer
        notre énergie à la protection des chiens et chats.
    </p>
</div>
