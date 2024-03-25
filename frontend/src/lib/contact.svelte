<script>


  let lastname = "";
  let firstname = "";
  let email="";
  let phone ="";
  let adress="";
  let zipCode="";
  let city="";
  let message =""


  let consent = false;
function afficherPopup(){

alert('Vous devez donner votre consentement pour que nous puissions enregistrer vos données conformément au RGPD, Vos données seront supprimées au bout de 365 jours.');
}


  const handleSubmitForm = async (event) => {

    if (!consent) {
      event.preventDefault(); // Empêche la soumission du formulaire
      afficherPopup();


   }else{

        event.preventDefault();
        // Crée un nouveau commentaire
        const new_comment = await post_contact();
        // Vide le text area
            lastname="";
            firstname="";
            email="";
            phone="";
            adress="";
            zipCode="";
            city="";
            message="";
     
    }

  }
const post_contact = async()=>{

  const response = await fetch( "http://127.0.0.1:8000/api/form",{
    
  method:"POST",
  headers:{

    "content-type":"application/json",
  },
  body: JSON.stringify({

      lastname:lastname,
      firstname: firstname,
      email:email,
      phone : phone,
      adress: adress,
      zip_code: zipCode,
      city: city,
      message : message
})
})
const json = await response.json();
        return json.data;

} 




</script>

<h1 class="title_home">contact</h1>

<div class="presentation_page-contact">
  <img class="logo2" src="./src/assets/logo.png" alt="Logo de l'entreprise" />

  <form
    on:submit={handleSubmitForm}
    aria-label="form-contact"
    class="form_contact"
  >
    <div class="form">
      <label for="lastname">Nom : </label>
      <input
        class="form_input"
        type="text"
        name="name"
        pattern="^[a-zA-Z\- ]+$"
        id="lastname"
        bind:value={lastname}
      />
    </div>

    <br />
    <div class="form">
      <label for="name">Prénom : </label>
      <input
        class="form_input"
        type="text"
        name="name"
        pattern="^[a-zA-Z\- ]+$"
        id="name"
        bind:value={firstname}
      />
    </div>
    <br />
    <div class="form">
      <label for="email">Email : </label>
      <input
        class="form_input"
        type="email"
        name="email"
        id="email"
        pattern="^[\w\.-]+@[a-zA-Z\d\.-]+\.[a-zA-Z]$"
        bind:value={email}
      />
    </div>
    <br />
    <div class="form">
      <label for="telephone">Tel : </label>
      <input
        class="form_input"
        type="tel"
        name="phone"
        id="telephone"
        bind:value={phone}
      />
    </div>
    <br />
    <div class="form">
      <label for="adresse">Adresse : </label>
      <input
        class="form_input"
        aria-label="text"
        name="adresse"
        id="adresse"
        bind:value={adress}
      />
    </div>
    <div class="form">
      <label for="CP">CP :</label>
      <input
        class="form_input"
        aria-label="text"
        name="code-postal"
        id="CP"
        bind:value={zipCode}
      />
    </div>
    <div class="form">
      <label for="Ville">Ville :</label>
      <input
        class="form_input"
        aria-label="text"
        name="ville"
        id="Ville"
        bind:value={city}
      />
    </div>
    <br />
    <br />

    <h4>Ma demande :</h4>
    <tr>
      <textarea
        aria-label="demande"
        name="message"
        cols="30"
        rows="10"
        bind:value={message}
      />
    </tr>

    <div class="form-group">
      <input
        type="checkbox"
       
        bind:checked={consent}
      >
      <label for="consent"
        >J'accepte que mes données soient collectées conformément au RGPD.</label
      >
    </div>

    <input class="send_button" type="submit" value="Envoyer" />
  </form>
</div>
