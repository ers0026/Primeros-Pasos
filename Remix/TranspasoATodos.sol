pragma solidity ^0.4.24;

import "./Ownable.sol";

contract TranspasoATodos  is Ownable
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
    function tranferTo (uint amount, address to) public isOwner {
        require(address(this).balance >= amount);//comprobar que es mayor el balance de lo que queremos refereir
        require(to != address (0));//comprobar que no pasen una cuenta vacia
        to.transfer(amount);//transferir la cantidad a 
    }
    
}
//daremos a star y deploy, indicaremos en el value la cantidad de ether que indicamos en el codigo.
//indicamos el mensaje y enviamos, daremos a getMessage(para ver si el mensaje se envio de forma correcta), luego getBalance (para ver si la cantidad de ether es correcta (nos lo dara en wei)
// y en getBalanceInEther nos indicara el dinero que hay en ether
//una vez comprobado seleccionamos otra cuenta veremos que el balance subio y el mensaje sera el mensaje nuevo.
//si usamos el metodo transfer que esta creado con el isOwner, indica que el balance sea mayor que lo que se requiere
//ahora meteremos el eth y introduciremos el mensaje  y veremos que el getBalance aumento.
//una vez comprobemos eso, copiaremos la cuenta de otro usuario que no sea el uno y nos colocamos en tranferTo, una vez copiada nos colocaremos sobre la cuenta 1 de nuevo.
//introduciremos la cantidad de wei que queremos tranferir y y la cuenta que deseamos hacer la tranferencia indicado "numeroCuenta"


