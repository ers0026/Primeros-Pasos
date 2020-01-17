pragma solidity ^0.4.24;

contract pruebaBasica
{
    struct producto
    {
        uint256 codigo;
        string  nombre;
    }
    //===PRIMERA FORMA DE HACERLO (SENCILLO)======================================================================================================//
    mapping(address => producto) Producto;

    function registroProducto(uint256 code, string name) public
    {
        Producto[msg.sender].codigo = code;
        Producto[msg.sender].nombre = name;
    }
    //===SEGUNDA FORMA DE HACERLO (CON ESTRUCTURA)======================================================================================================//
    struct Registro
    {
        producto produc;
    }

    mapping(address => Registro) registers;
}