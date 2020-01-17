pragma solidity ^0.4.24;

contract CreaccionUsuarios {

    struct User{
        string name;
        string apellido;
    }
    //mapping para crear usuarios de 0
    mapping (address => User) private users;
    //creamos un mapping nuevo para saber los usuarios creados
    mapping (address => bool) private joinedUsers;
    //creamos un array para saber cuantos usarios llevamos introducidos en la aplicacion
    address[]totalUsuarios;
    //crear eventos 
    //cada vez que un usario se registre lanzar evento con lo que sucede los que se unen o dan fallo
//event userJoinedEvent(address,string);
    //ejeccion para añadir usuarios
    function join (string name, string apellido) public {
        //comprobamos si la persona no esta registrada ya, si no esta se puede registrar
        require(!userJoined(msg.sender));
        //declarada en el mapping
        //si ponemos memory entre user user no se almacena los datos
        //con storage si se almacenan los datos
        User storage user = users[msg.sender]; //msg.sender == usuario del struct
        user.name = name;
        user.apellido = apellido;
        //decimos que el usuario esta añadido correctamente y con ello podemos hacer los require para saber si el
        //usuario a unir se puede añadir o ya existe
        joinedUsers[msg.sender] = true;
        //cada vez que se meta un usuario
        totalUsuarios.push(msg.sender);
        //una vez acabado la funcion llamamos al evento y notificamos los elementos que queremos pasar (nombre y apellido)
        //con abi.encodePacked(args ); recibe los paquetes que se desean concatenar
    //userJoinedEvent(msg.sender,string(abi.encodePacked(name, " ",apellido)));

    }
    function getUser(address addr) public view returns (string, string){
        //si esta añadido el usario se sigue trabajando
        require(userJoined(msg.sender));
        //memory ya que solo consultas no almacenamos
        User memory user = users[addr];
        return (user.name, user.apellido);
    }
    function userJoined(address addr) private view returns (bool){
        return joinedUsers[addr];
    }
    //creamos la funcion para llevar la cuenta de usuarios
    function totalUsu() public view returns(uint){
        return totalUsuarios.length;
    }
    
    //en este programa: tendremos la creaccion de usuarios nuevo, mediante un join (indicar nombre y apellido ("",""), y nos contara el numero de usarios totales y si 
    //le pasas el numero de cuenta te indicara quien eres. No pudiendo modificar el nombre del usuario ya metido con anterioridad.

}