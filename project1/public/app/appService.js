angular.module('notesApp')
	.service('peopleService', ['$http', function ($http, $scope) {
		// Array de personas que se inyectarán en la vista.
		var id = 3;
		//var people = [
		   // {id: 0, name: 'Antonio', surname: 'Contreras Román', age: 27, email: 'antoniocontrerasroman@gmail.com', password: 'admin1'},
		   // {id: 1, name: 'Santi', surname: 'Camargo Rodríguez', age: 26, email: 'santicamargorodriguez@gmail.com', password: 'admin2'},
		  //  {id: 2, name: 'Alejo', surname: 'Aguilar Espinosa', age: 27, email: 'alejoaguilarespinosa@gmail.com', password: 'admin3'},
		//];
		var self = this;
		self.getPeople = function () {
      return $http.get('/api/person/')
        .then(function (response) {
          //console.log(response.data);
          return response.data;
      });
    };

		self.updatePerson = function (person) {
		    var index = getPersonPosition(person.id);
		    // Sustituir en el array la persona editada con los nuevos datos de editingPerson
		    people.splice(index, 1, person);
		};

		self.addPerson = function (person) {
		    // Coger los datos del modelo (obtenidos por la directiva 'ng-model' de cada input del formulario
		    person.id = id++;
		    people.push(person);
		};

		self.deletePerson = function (id) {
		    var index = getPersonPosition(id);
		    people.splice(index, 1);
		}

		function getPersonPosition(id) {
		    for (var a = 0; a < people.length; a++) {
				if (id === people[a].id) {
			    	return a;
				}
		    }
		}
		
		self.getPerson = function (id) {
		    //return people[getPersonPosition(id)];
        return $http.get('/api/person/' + id)
          .then(function(response) {
            return response.date;
          })
		};
	}])