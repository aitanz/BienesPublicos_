//Funcion para bloquear numeros
        function soloLetras(event) {
            var keyCode = ('which' in event) ? event.which : event.keyCode;

            isNumeric = (keyCode >= 48 /* KeyboardEvent.DOM_VK_0 */ && keyCode <= 57 /* KeyboardEvent.DOM_VK_9 */) ||
                        (keyCode >= 96 /* KeyboardEvent.DOM_VK_NUMPAD0 */ && keyCode <= 105  /* KeyboardEvent.DOM_VK_NUMPAD9 */);
            modifiers = (event.altKey || event.ctrlKey || event.shiftKey);
            return !isNumeric || modifiers;
        }

    //Funcion para bloquear letras

function soloNumeros(event){
var key = event.keyCode ? event.keyCode : event.which ;

return (key <= 40 || (key >= 48 && key <= 57) || (key >=44 && key<=46));
}
 