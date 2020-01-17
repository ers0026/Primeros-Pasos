pragma solidity ^0.4.24;

contract MostrarMensajePropietario {
    address private owner;
    string private message;
    constructor() public {
        owner = msg.sender;//persona que ejecuta la transaccion y owner quien requiere el contrato
    }
    function setMessage(string newMessage) public isOwner  {//indicas con payable el precio a pagar por inovar esa function
        message = newMessage;
    }
    function getMessage() public view returns (string){
        return message;
    }
    modifier isOwner(){
        require(owner == msg.sender);
        _;//se pone siempre despues de los requiere (colocas el metodo del codigo que quieres usar antes)
    }
}
//en este ejercicio solo dejara modificar el contenido inicial del programa al el propietario que creo el mensaje, siendo imposible por el resto de los usuarios.
