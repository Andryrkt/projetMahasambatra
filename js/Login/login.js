document.addEventListener("DOMContentLoaded",  function() {

   // js pour mettre la première lettre de chaque mot en majuscule
   function capitalizeWords(text) {
    return text.replace(/\b\w/g, char => char.toUpperCase());
  }
  
  document.getElementById('nomInput').addEventListener('input', function() {
    this.value = capitalizeWords(this.value);
  });
});


