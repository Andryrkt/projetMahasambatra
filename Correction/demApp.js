// alert("Bonjour");

const agenceInput = document.querySelector("#agence");
const serviceDebiteurInput = document.querySelector("#service");

agenceInput.addEventListener("change", () => {
  let agenceId = agenceInput.value;
  console.log(agenceId);
  const url = `/Myproj/Correction/servicejson.php?agence=${agenceId}`;
  fetch(url)
    .then((response) => {
      if (!response.ok) {
        throw new Error("Network response was not ok " + response.statusText);
      }
      return response.json();
    })
    .then((services) => {
      console.log(services);

      // Supprimer toutes les options existantes
      while (serviceDebiteurInput.options.length > 0) {
        serviceDebiteurInput.remove(0);
      }

      // Ajouter les nouvelles options à partir du tableau services
      for (var i = 0; i < services.length; i++) {
        var option = document.createElement("option");
        option.value = services[i];
        option.text = services[i];
        serviceDebiteurInput.add(option);
      }
    })
    .catch((error) => console.error("Error:", error));
});
