swal({ 
title: "¿Deseas unirte al lado oscuro?",
text: "Este paso marcará el resto de tu vida...",
type: "warning",
showCancelButton: true,
confirmButtonColor: "#DD6B55",
confirmButtonText: "¡Claro!",
cancelButtonText: "No, jamás", 
closeOnConfirm: false,
closeOnCancel: false },

function(isConfirm){ 
if (isConfirm) {
swal("¡Hecho!",
"Ahora eres uno de los nuestros",
"success"); 
} else { 
swal("¡Gallina!", 
"Tu te lo pierdes...", 
"error"); 
} 
});