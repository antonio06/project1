angular.module('notesApp', [])
  // Un controlador se encarga de la lógica de una parte de la aplicación.
  .controller('MainCtrl', ['peopleService', function (peopleService) {
    var self = this;
    self.personErrors = [];
    self.editingPersonErrors = [];
    // Plantilla de datos de persona
    var personModel = {
      id: null,
      name: null,
      surname: null,
      age: null,
      email: null,
      password: null
    };

    //self.people = peopleService.getPeople();
    self.people = [];
    self.getPeople = function () {
      peopleService.getPeople().then(function (people) {
        self.people = people;
      });
    };

    self.getPeople();

    // Objeto persona (modelo) inicializado con la plantilla personModel
    self.person = angular.copy(personModel);
    self.editingPerson = angular.copy(personModel);
    self.personName = null;

    var modal = $('#modal');

    modal.on('hide.bs.modal', function () {
      self.editingPersonErrors = [];
    });

    // Función privada para inicializar el modelo que será utilizado para guardar los datos del formulario

    // Función para el submit del formulario
    self.insert = function () {
      self.personErrors = validateForm(self.person, false);
      if (!self.personErrors.length) {

        // Coger los datos del modelo (obtenidos por la directiva 'ng-model' de cada input del formulario
        peopleService.addPerson(self.person).then(function() {
          self.getPeople();
        })

        // Limpiar el modelo (que limpiará automáticamente los controles del formulario)
        self.person = angular.copy(personModel);
      }

    };

    function getPreparedPerson(person) {
      person.age = parseInt(person.age);
      return person;
    }

    self.update = function () {
      self.editingPersonErrors = validateForm(self.editingPerson, true);
      if (!self.editingPersonErrors.length) {

        // IMPORTANTE: Preparar el objeto de editingPerson para ser actualizado en el array people
        var person = getPreparedPerson(self.editingPerson);

        // Sustituir en el array la persona editada con los nuevos datos de editingPerson
        peopleService.updatePerson(person).then(function() {
          modal.modal('hide');
          self.getPeople();
        });
      }
    };

    // Función para cargar los datos de una persona cuando se le de al botón Edit
    self.loadPerson = function (id) {
      self.editingPerson = {};
      peopleService.getPerson(id).then(function (person) {
        self.editingPerson = person;
        console.log(person);
        // Copiar los datos de la persona en editingPerson para que los datos del formulario de edición cambien
        self.personName = self.editingPerson.name;
        modal.modal('show');
      });
    };

    // Función para borrar una persona pasándo su id como parámetro.
    self.delete = function (id) {
      peopleService.deletePerson(id)
        .then(function() {
          self.getPeople();
        });
    };

    function validateForm(person, isEditing) {
      var arrayErrors = [];
      if (person.name === null || person.name === '') {
        arrayErrors.push('The field name is required');
      }

      if (person.surname === null || person.surname === '') {
        arrayErrors.push('The field surname is required');
      }

      if (!parseInt(person.age)) {
        arrayErrors.push('The field age must be a number not a string');
      }

      if (person.age <= 18) {
        arrayErrors.push('The field age must be more tham 18 years');
      }
      
      if (!isEditing && person.password.length <= 5) {
        arrayErrors.push('The password must be more than 5 character');
      }
      return arrayErrors;
    }
  }]);