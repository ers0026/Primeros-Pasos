pragma solidity ^0.4.24;

contract Ownable {
    
    address internal owner;
    
    constructor() public
    {
        owner =msg.sender;
    }
    modifier isOwner(){
        require(owner == msg.sender);
        _;//se pone siempre despues de los requiere (colocas el metodo del codigo que quieres usar antes)
    }
    
}