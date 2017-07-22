<!DOCTYPE html>
<!--
Frist proyect with html and framework Angularjs and bootstrap. 
-->
<html ng-app="notesApp">
    <head>
        <title>Proyect 1</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="/libs/bootstrap/css/bootstrap.min.css">
    </head>
    <body ng-controller="MainCtrl as ctrl">
        <div class="container">
            <div class="panel panel-info">
                <div class="panel-heading text-center">
                    <h1>First proyect with angular js</h1>
                </div>
                <div class="table-responsive">
                    <ul class="nav nav-tabs">
                        <li role="presentation"><a href="/">Main</a></li>
                        <li role="presentation" class="active"><a href="api/newPerson">New Person</a></li>
                        <li role="presentation"><a href="api/logout">Log out</a></li>
                    </ul>
                    <form ng-submit="ctrl.insert()" class="form-inline text-center">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input id="name" type="text" name="name" class="form-control" placeholder="John"
                                   ng-model="ctrl.person.name" ng-keyup="ctrl.onKeyupName()">
                            <div class="alert alert-danger divAlert" role="alert" ng-show="ctrl.errorsName.length" ng-cloak>
                                <ul class="listErrors">
                                    <li ng-repeat="error in ctrl.errorsName track by $index">@{{error}}</li>
                                </ul>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="surname">Surname</label>
                            <input id="surname" type="text" name="surname" class="form-control" placeholder="Doe" 
                                   ng-model="ctrl.person.surname" ng-keyup="ctrl.onKeyupSurname()">
                        </div>
                        <div class="form-group">
                            <label for="age">Age</label>
                            <input id="age" type="text" name="age" class="form-control" placeholder="23" 
                                   ng-model="ctrl.person.age" ng-keyup="ctrl.onKeyupAge()">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email address</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email" name="email"
                            ng-model="ctrl.person.email">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password"
                            ng-model="ctrl.person.password">
                        </div>
                        <div>
                            <button type="submit" class="btn btn-primary">Insert</button>
                        </div>
                        
                    </form>
                </div>
                <div class="alert alert-danger divAlert" role="alert" ng-show="ctrl.personErrors.length" ng-cloak>
                  <ul class="listErrors">
                    <li ng-repeat="error in ctrl.personErrors track by $index">@{{error}}</li>
                  </ul>
                </div>
            </div>
        </div>
        <script src="/libs/jquery/jquery.min.js"></script>
        <script src="/libs/bootstrap/js/bootstrap.min.js"></script>
        <script src="/libs/angularjs/angular.min.js"></script>
        <script src="/app/app.js"></script>
        <script src="/app/appService.js"></script>
    </body>
</html>