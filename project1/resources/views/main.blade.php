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
                        <li role="presentation" class="active"><a href="/main">Main</a></li>
                        <li role="presentation"><a href="api/newPerson">New Person</a></li>
                        <li role="presentation"><a href="api/logout">Log out</a></li>
                    </ul>
                    <table class="table table-striped">
                        <tr>
                            <td class="text-center">Name</td>
                            <td class="text-center">Surname</td>
                            <td class="text-center">Age</td>
                            <td class="text-center">Actions</td>
                        </tr>
                        <tr ng-repeat="person in ctrl.people| orderBy:'-age'">
                            <td class="text-center">@{{person.name}}</td>
                            <td class="text-center">@{{person.surname}}</td>
                            <td class="text-center">@{{person.age}}</td>
                            <td class="text-center">
                                <button class="btn btn-success" ng-click="ctrl.loadPerson(person.id)">Edit</button>
                                <button class="btn btn-danger" ng-click="ctrl.delete(person.id)">Delete</button>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="alert alert-danger divAlert" role="alert" ng-show="ctrl.personErrors.length" ng-cloak>
                <ul class="listErrors">
                    <li ng-repeat="error in ctrl.personErrors track by $index">@{{error}}</li>
                </ul>
            </div>
            <div id="modal" class="modal fade" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Editing @{{ctrl.personName}}</h4>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="form-group">
                                    <label for="exampleInputName2">Name</label>
                                    <input type="text" name="name" class="form-control" placeholder="John" 
                                           ng-model="ctrl.editingPerson.name" ng-keyup="ctrl.onKeyupEditingName()">
                                    <div class="alert alert-danger divAlert" role="alert" ng-show="ctrl.editingErrorsName.length" ng-cloak>
                                        <ul class="listErrors">
                                            <li ng-repeat="error in ctrl.editingErrorsName track by $index">@{{error}}</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail2">Surname</label>
                                    <input type="text" name="surname" class="form-control" placeholder="Doe" 
                                           ng-model="ctrl.editingPerson.surname" ng-keyup="ctrl.onKeyupEditingSurname()">
                                    <div class="alert alert-danger divAlert" role="alert" ng-show="ctrl.editingErrorsSurname.length" ng-cloak>
                                        <ul class="listErrors">
                                            <li ng-repeat="error in ctrl.editingErrorsSurname track by $index">@{{error}}</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail2">Age</label>
                                    <input type="text" name="age" class="form-control" placeholder="23" 
                                           ng-model="ctrl.editingPerson.age" ng-keyup="ctrl.onKeyupEditingAge()">
                                    <div class="alert alert-danger divAlert" role="alert" ng-show="ctrl.editingErrorsAge.length" ng-cloak>
                                        <ul class="listErrors">
                                            <li ng-repeat="error in ctrl.editingErrorsAge track by $index">@{{error}}</li>
                                        </ul>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="alert alert-danger divAlert" role="alert" ng-show="ctrl.editingPersonErrors.length" ng-cloak>
                            <ul class="listErrors">
                                <li ng-repeat="error in ctrl.editingPersonErrors track by $index">@{{error}}</li>
                            </ul>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal" >Close</button>
                            <button type="submit" class="btn btn-primary" ng-click="ctrl.update()">Update</button>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
        </div>
        <script src="/libs/jquery/jquery.min.js"></script>
        <script src="/libs/bootstrap/js/bootstrap.min.js"></script>
        <script src="/libs/angularjs/angular.min.js"></script>
        <script src="/app/app.js"></script>
        <script src="/app/appService.js"></script>
    </body>
</html>
