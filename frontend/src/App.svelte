<script>

import Router from 'svelte-spa-router'

  import Footer from './lib/footer.svelte'
  import Header from './lib/header.svelte'
  import Home from './lib/home.svelte'
  import Presentation from './lib/qui_sommes_nous.svelte'
  import Mentions from './lib/mentions_legales.svelte'
  import Contact from './lib/contact.svelte'
  import Conditions from './lib/conditions_adoption.svelte'
  import Cats from './lib/cats.svelte'
  import Dogs from './lib/dogs.svelte'
  import Adopt from './lib/adopt.svelte'
  import SingleAnimal from './lib/single-animal.svelte'

const routes = {

    '/' :Home,
    '/chiens' : Dogs,
    '/chats' : Cats,
    '/conditions': Conditions,
    '/contact': Contact,
    '/adoptes': Adopt,
    '/mentions':Mentions,
    '/presentation':Presentation,
    '/ficheAnimal/:id':SingleAnimal,


}
</script>

<main>

<Header/>
<Router {routes}/>
<Footer/>

</main>




 

