angular.module('notesApp')
	.service('peopleService', ['$http', function ($http, $scope) {
		var self = this;
		self.getPeople = function () {
      return $http.get('/api/person')
        .then(function (response) {
          //console.log(response.data);
          return response.data;
      });
    };

		self.updatePerson = function (person) {
      return $http.put('/api/person/' + person.id, {person: person})
        .then(function(response) {
          console.log(response);
        })
		};

		self.addPerson = function (person) {
		    // Coger los datos del modelo (obtenidos por la directiva 'ng-model' de cada input del formulario
        return $http.post('/api/person', {person: person})
          .then(function(response) {
            // return response.data;
            console.log(response);
          });
		};

		self.deletePerson = function (id) {
        return $http.delete('/api/person/' + id);
		}
		
		self.getPerson = function (id) {
        return $http.get('/api/person/' + id)
          .then(function(response) {
            return response.data;
          });
    };
        

	}])