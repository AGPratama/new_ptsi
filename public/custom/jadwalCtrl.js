(function (angular) {
    'use strict';

    //// JavaScript Code ////
    function jadwalCtrl($log,JadwalSvc, $timeout, $scope,surveyor,$window,toastr,$loading) {
        var getTenderData=(id)=>{
            $scope.isLoading=true;
            $loading.start('save');
            return JadwalSvc.getById(id).then((res)=>{
                if(res.status==200){
                    console.log(res.data);
                    $scope.data=angular.copy(res.data.data);
                    $scope.isLoading=false;
                    $loading.finish('save');                    
                }
            }).catch((err)=>{
                $scope.isLoading=false;
                $loading.finish('save');
                console.log(err,'Ini Errror');
            })
        }
        var getId=$window.location.href.split('?id=')[1];
        getTenderData(getId);
        $scope.doEdit=()=>{
            $loading.start('save');
            return JadwalSvc.update($scope.data).then((res)=>{
                if(res.status==200){
                    console.log(res.data);
                    toastr.success('Successfully Updated Data')
                    $scope.isLoading=false;
                    $loading.finish('save');
                    let url = $window.location.href;
                    url=url.replace('step2','step3');
                    $window.location.href=url;
                }
            }).catch((err)=>{
                $scope.isLoading=false;
                toastr.error(err.data.message)
                $loading.finish('save');
                console.log(err,'Ini Errror');
            })
        }
    }
    //// Angular Code ////

    app.controller('jadwalCtrl', jadwalCtrl);

})(angular);
