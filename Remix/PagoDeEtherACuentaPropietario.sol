pragma solidity ^0.4.24;

import "./Ownable.sol";

contract PagoDeEtherACuentaPropietario is Ownable
{
   
    string private message;
    //lo comentado es porque lo usamos en Ownable
    //address private owner; 
    //no se necesita ya que 
    //constructor() public {
        // = msg.sender;//persona que ejecuta la transaccion y owner quien requiere el contrato
    //}
    
    function setMessage(string newMessage) public payable {//indicas con payable el precio a pagar por inovar esa function
        require(msg.value == 3 ether);
        message = newMessage;
    }
    function getMessage() public view returns (string){
        return message;
    }
    function getBalance() public view returns (uint){//balance de contrato en wei
        return address (this).balance;
    }
    function getBalanceInEther() public view returns(uint){//balance de contrato en ether
        return getBalance()/1e18;
    }
    //realizamos la transferencia al propietario, esto significa que si se lo das a otro usuario no lo podra coger
    //en transfer tendremos que indicar lo que tendremos que transfereir
    function transfer (uint amount) public isOwner{
        require(address(this).balance >= amount);
        owner.transfer(amount);
    }
}
//daremos a star y deploy, indicaremos en el value la cantidad de ether que indicamos en el codigo.
//indicamos el mensaje y enviamos, daremos a getMessage(para ver si el mensaje se envio de forma correcta), luego getBalance (para ver si la cantidad de ether es correcta (nos lo dara en wei)
// y en getBalanceInEther nos indicara el dinero que hay en ether
//una vez comprobado seleccionamos otra cuenta veremos que el balance subio y el mensaje sera el mensaje nuevo.
//si usamos el metodo transfer que esta creado con el isOwner, indica que el balance sea mayor que lo que se requiere
//cuando tenemos el tranfer con el isOwner entonces realizaremos la cantidad de 3 ether con la cuenta y haremos la tranferencia al Owner (le tranferimos la cantidad en wei), solo el Owner puede tranfereir balance de la cuenta a su propia cuenta.
//una ez dado a tranferir la cuenta del Owner se aumentara y y clicando en getBalance la cantidad sera 0 disminuira segun la cantidad que hayamos dado.
//nunca podremos dar dinero a una cuenta que no sea el Owner
