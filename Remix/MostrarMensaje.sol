pragma solidity ^0.4.24;

contract MostrarMensaje {
    address private owner;
    string private message;
    constructor() public {
        owner = msg.sender;//persona que ejecuta la transaccion y owner quien requiere el contrato
    }
    function setMessage(string newMessage) public  {//indicas con payable el precio a pagar por inovar esa function
        message = newMessage;
    }
    function getMessage() public view returns (string){
        return message;
    }
}
//En remix se ejecuta de la siguiente manera: compilamos vamos a run y luego pulsamos en deploy (veremos que el ether inicial bajo al realizar la transaccion),
//si pulsamos en vm veremos el hash de la transaccion (unico), la direccion del contrato generado, from es de donde se envio la transaccion, gas inidica la cantidad de gas maximo que se puede usar
//si la transaccion que queremos realizar es mayor al que tenemos dara error.
//Para ejecutar esto pulsamos deploy y despues en deployedContracts se nos abrirar un despleable.
//meteremos algo en setMessage= "" y si pulsamos en getMessage nos saldra el mensaje que deseabamos.