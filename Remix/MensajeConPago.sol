pragma solidity ^0.4.24;

contract MensajeConPago
{
    address private owner;
    string private message;
    constructor() public {
        owner = msg.sender;//persona que ejecuta la transaccion y owner quien requiere el contrato
    }
    
    function setMessage(string newMessage) public payable {//indicas con payable el precio a pagar por inovar esa function
        require(msg.value == 3 ether);
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
//daremos a deploy y despues indicaremos en el value el precio del ether que deseamos pagar (indicado anteiromente en el codigo nuestro caso 3)
//si indicamos mas ether del indicado en el codigo nos saltara error tiene que ser exacto 3 ether (si fuera mayor igual no daria problema alguno)
//una vez pongamos el mensaje el precio del ether bajara los 3 ether y en getMessage indicara la cantidda que queda -el dinero que tiene
//cada vez que ponemos un mensaje tenemos que indicar el valor de los ether