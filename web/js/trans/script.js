      angular.module('ionicApp', ['ionic'])

      .config(function($stateProvider, $urlRouterProvider) {

        $stateProvider
          .state('app', {
            url: "/app",
            abstract: true,
            templateUrl: "templates/menu.html"
          })
          .state('app.translate', {
            url: "/translate",
            views: {
              'menuContent' :{
                templateUrl: "templates/translate.html",
                controller: "TranslateCtrl"
              }
            }
          })
        
        $urlRouterProvider.otherwise("/app/translate");
      })

      .controller('MainCtrl', function($scope, $ionicSideMenuDelegate) {
        $scope.toggleLeft = function() {
          $ionicSideMenuDelegate.toggleLeft();
        };
      })

      .controller('TranslateCtrl', function($scope, $http, $ionicLoading) {
        
        $scope.source = 'Тут могла быть ваша реклама!';
        
        $scope.translate = function() {

            $ionicLoading.show({
              template: 'Translating . . .'
            });

            $http.get('https://statickidz.com/scripts/traductor/', {
                params: {
                    source: 'ru',
                    target: 'en',
                    q: $scope.source
                }
             })
             .success(function (data,status) {
                  $ionicLoading.hide();
                  $scope.targeten = data.translation;
             });

            $http.get('https://statickidz.com/scripts/traductor/', {
                params: {
                    source: 'ru',
                    target: 'fr',
                    q: $scope.source
                }
             })
             .success(function (data,status) {
                  $ionicLoading.hide();
                  $scope.targetfr = data.translation;
             });
          
            $http.get('https://statickidz.com/scripts/traductor/', {
                params: {
                    source: 'ru',
                    target: 'de',
                    q: $scope.source
                }
             })
             .success(function (data,status) {
                  $ionicLoading.hide();
                  $scope.targetde = data.translation;
             });
          
          }
        
      });
