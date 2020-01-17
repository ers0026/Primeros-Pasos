App = {
  web3Provider: null,
  contracts: {},

  init: async function() {
    // Load pets.
    $.getJSON('../pets.json', function(data) {
      var petsRow = $('#petsRow');
      var petTemplate = $('#petTemplate');

      for (i = 0; i < data.length; i ++) {
        petTemplate.find('.panel-title').text(data[i].name);
        petTemplate.find('img').attr('src', data[i].picture);
        petTemplate.find('.pet-breed').text(data[i].breed);
        petTemplate.find('.pet-age').text(data[i].age);
        petTemplate.find('.pet-location').text(data[i].location);
        petTemplate.find('.btn-adopt').attr('data-id', data[i].id);

        petsRow.append(petTemplate.html());
      }
    });

    return await App.initWeb3();
  },

  initWeb3: async function() {
    // Navegadores dapp...
    //verificamos si esta usando Metamask, y si no existe el ethereum (metamask) esta usando un navegador antiguo y si no hay isntancia
    //de web3 entonces tendremos que esta usando el proveedor local.
    if (window.ethereum) {
      App.web3Provider = window.ethereum;
      try {
        //Solicitar acceso a la cuenta
        await window.ethereum.enable();
      } catch (error) {
        //Usuario denegado el acceso a la cuenta 
        console.error("User denied account access")
      }
    }
    //Los navegadores dapp heredados
    else if (window.web3) {
      App.web3Provider = window.web3.currentProvider;
    }
    //Si no se detecta una instancia web3 inyectada, vuelva a Ganache
    else {
      App.web3Provider = new Web3.providers.HttpProvider('http://localhost:7545');
    }
    web3 = new Web3(App.web3Provider);

    return App.initContract();
  },

  initContract: function() {
    $.getJSON('Adoption.json', function(data) {
      //Obtenga el archivo del contrato necesario y cree una instancia con truffle-contract
      //los AdoptionArtifact que se recuperan son el ABI(interfaz binaria de la aplicacion) ABI: objeto de JS que dice como actuar con 
      //el contrato incluye las variables funciones y parametros.
      var AdoptionArtifact = data;
      //Aqui creamos una instancia del contrato con el que podemos interactuar.
      App.contracts.Adoption = TruffleContract(AdoptionArtifact);
      //Establecer el proveedor para el contrato. Esto crea una instancia del contrato con el que podemos interactuar.
      App.contracts.Adoption.setProvider(App.web3Provider);
      //Utilice el contrato para recuperar y indicar las mascotas adoptadas
      return App.markAdopted();
    });

    return App.bindEvents();
  },

  bindEvents: function() {
    $(document).on('click', '.btn-adopt', App.handleAdopt);
  },

  markAdopted: function(adopters, account) {
    //accedemos a la instancia despues de recuperar inicialmente el valor
    var adoptionInstance;

    App.contracts.Adoption.deployed().then(function(instance) {
      adoptionInstance = instance;
      //call: permite leer datos de la cadena de bloques sin tener que hacer una transaccion completa
      return adoptionInstance.getAdopters.call();
    }).then(function(adopters) {
      for (i = 0; i < adopters.length; i++) {
        if (adopters[i] !== '0x0000000000000000000000000000000000000000') {
          $('.panel-pet').eq(i).find('button').text('Adoptado correctamente').attr('disabled', true);
        }
      }
    }).catch(function(err) {
      console.log(err.message);
    });
  },

  handleAdopt: function(event) {
    event.preventDefault();

    var petId = parseInt($(event.target).data('id'));
    //almacen de la isntancia
    var adoptionInstance;
    //para obtener las cuentas del usuario
    web3.eth.getAccounts(function(error, accounts) {
      if (error) {
        console.log(error);
      }
    
      var account = accounts[0];
    
      App.contracts.Adoption.deployed().then(function(instance) {
        adoptionInstance = instance;
    
        //Ejecutar adoptar como una transacción mediante el envío de la cuenta
        return adoptionInstance.adopt(petId, {from: account});
      }).then(function(result) {
        return App.markAdopted();
      }).catch(function(err) {
        console.log(err.message);
      });
    });
  }

};

$(function() {
  $(window).load(function() {
    App.init();
  });
});
