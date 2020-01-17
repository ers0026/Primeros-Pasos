pragma solidity ^0.4.24;
contract Autobus {
    address public owner; //cualquiera puede comprobar quien es el owner de nuestro SmartContract
    //tiene que tener buses disponibles
    struct Cliente{//define a nuestro cliente
        uint puntosActuales;
        uint viajesTotales;
    }
    struct Viaje{//estructura de un viaje 
        string nombreViaje;
        uint   precio;
    }
    //definiremos cuanto vale el precio que se le da al cliente por cada viaje
    uint puntosCadaViaje = 0.5 ether;
    //coleccion de viajes que sean comprobables de manera publica array de viajes
    Viaje[] public viajes;
    
    //creamos un mapping sera publico y de tipo address para los usuarios
    mapping (address => Cliente) public clientes;
    //saber los viajes que tiene cada usuario array de viajes del cusuario 
    mapping (address => Viaje[]) public viajesCliente;
    //para saber los viajes totales de cada cliente
    mapping (address => uint) public totalViajesCliente;
    //evento para que cada cliente que compre un viaje el
    event viajesComprado(address indexed cliente, uint precio);

    constructor() {
        owner = msg.sender; //el owner es el que esta desplegando el smartContract
        //creamos los viajes y cada uno es un indice mas 0 1 2 
        viajes.push(Viaje('Madrid', 4 ether));  
        viajes.push(Viaje('Santander', 3 ether));
        viajes.push(Viaje('Sevilla', 2 ether));

    }
    //funcion para comprar viajes y viajeIndice para saber que viaje es cada uno
    //sera public y payable (porque habra que pagar el precio del viaje)
    function comprarViaje(uint viajeIndice) public payable{
        //identificamos el viaje que queremos comprar
        Viaje viaje = viajes[viajeIndice];
        //requerimos que nos de el dinero segun el viaje que deseemos
        require(msg.value == viaje.precio);
        //informacion del clinete que esta operando en ese momento
        Cliente storage cliente = clientes[msg.sender];
        //puntos acumulados por comprar viaje
        cliente.puntosActuales += 5;
        //viajes totales se añade el que acabas de comprar
        cliente.viajesTotales +=1;
        //añadimos el viaje que acaba de comprar 
        viajesCliente[msg.sender].push(viaje);
        //identificamos al cliente y le sumamos uno al sus viajes totales
        totalViajesCliente[msg.sender]++;

        viajesComprado(msg.sender, viaje.precio);
    }
    //recuperar los viajes que tiene la compañia
    function totalViajes() public view returns (uint){
        return viajes.length;
    }
    //funcion de recibir dinero por comprar viajes (fidelizacion al cliente)
    function recibirDineroPorCompra() public {
        //identificamos al cliente
        Cliente storage cliente = clientes[msg.sender];
        //calculamos cuanto le tenemos que sumar por cada viaje y se lo sumamos al total que tenga
        uint etherAdevolver = puntosCadaViaje * cliente.puntosActuales;
        //al cliente le hacemos la transeferencia del ether ganados
        msg.sender.transfer(etherAdevolver);
        //reiniciamos a cero el dinero gandado por los viajes comprados antes
        cliente.puntosActuales = 0;
    }
    //recuperar el balance total de la compañia, solo el propietario puede ver el balance de la compañia
    function getCompanyBalance() public isOwner view returns(uint) {
        address companyAddress = address(this);//la propia instancia del contrato la igualamos a ello
        return  companyAddress.balance;
    }
    //funcion que solo permite al propietario pueda controlar la funcion de arriba (getCompantyBalance)
    modifier isOwner() {
        require (msg.sender == owner);
        _;
    }
    //funcion para que el cliente pueda saber el ether que dispone en cada momento
    function etherTotal() public view returns (uint) {
        return (puntosCadaViaje * clientes[msg.sender].puntosActuales);
    }

}