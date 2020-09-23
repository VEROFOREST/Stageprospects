// animation titre
    document.querySelector('h1').classList.toggle('show');
    setTimeout(() => document.querySelector('h1').classList.toggle('show'), 200);
// animation input montant partiel preinscription
    function txtInput() {
        // Get the checkbox
        var checkBoxpartielfi = document.getElementById("exampleRadios4");
     
        // Get the output text
        var inputmontant = document.getElementById("montantpartiel");
 
        // If the checkbox is checked, display the output text
        if (checkBoxpartielfi.checked == true) {
            
             inputmontant.style.display = "block";
        } else {
         
             inputmontant.style.display = "none";
        }
    }
// animation input structure preinscription
    function txtstructure() {
        // Get the checkbox
        var checkBoxnomstructure = document.getElementById("exampleRadios5tri");
     
        // Get the output text
        var inputnomstructure = document.getElementById("nomstructure");
 
        // If the checkbox is checked, display the output text
        if (checkBoxnomstructure.checked == true) {
            
             inputnomstructure.style.display = "block";
        } else {
         
             inputnomstructure.style.display = "none";
        }
    }

