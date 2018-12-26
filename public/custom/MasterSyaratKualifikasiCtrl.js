(function (angular) {
    'use strict';
    app.controller('MasterSyaratKualifikasiCtrl', MasterSyaratKualifikasiCtrl)
    //// JavaScript Code ////
    function MasterSyaratKualifikasiCtrl($log,MasterSyaratKualifikasiSvc, $timeout, $scope,surveyor,$compile,$uibModal,$filter,toastr,$loading,$window) {
        var selectedstrorage = {};
        var baseurl = $window.location.href.split('//')[1];
        https = $window.location.href.split('//')[0];
        baseurl = baseurl.split('/')[0];
        $scope.baseurl = https + '//' + baseurl;

        selectedstrorage.state = { core: { selected: [] } }
        localStorage.setItem('jstree', JSON.stringify(selectedstrorage))
        $scope.treeEventsObj = {
            'ready': readyCB,
            'create_node': createNodeCB,
            'deselect_node': selectNodeCB,
            'select_node': selectNodeCB // on node selected callback
        }
        function readyCB() {
            $log.info('ready called');
        };

        function createNodeCB(e, item) {
            $log.info('create_node called');
        };

        function selectNodeCB(node, selected, event) {
            $log.info($scope.treeInstance.jstree(true).get_selected());
        };
        $scope.ignoreChanges = false;
        $scope.treeData=[];
        var getTreeData=()=>{
            $scope.isLoading=true;
            MasterSyaratKualifikasiSvc.getList().then((res)=>{
                console.log(res);                
                if(res.status==200){
                    var temp={
                        "id": "0",
                        "parent": "#",
                        "type": "book",
                        "text": "Master Syarat Kualifikasi",
                        "state": {
                            "opened": true
                        },
                        "a_attr": { "context-menu": "menuOptions", "data-custom": "1", "data-id": "0","class":"d-none" }
                    }
                    var temp2={
                        "id": "1",
                        "parent": "#",
                        "type": "book",
                        "text": "Master Syarat Kualifikasi",
                        "state": {
                            "opened": true
                        },
                        "a_attr": { "context-menu": "menuOptions", "data-custom": "1", "data-id": "1" }
                    }
                    $scope.data=angular.copy(res.data.data);
                    for (var i = 0; i < $scope.data.length; i++) {
                        $scope.data[i].text = $scope.data[i].nama;
                        $scope.data[i].id = $scope.data[i].id.toString();
                        if($scope.data[i].parent_id != null){
                            $scope.data[i].parent = $scope.data[i].parent_id.toString();
                        }else{
                            $scope.data[i].parent = "0";
                        }
                        $scope.data[i].a_attr = {
                            "context-menu": "menuOptions",
                            "data-custom": "0",
                            "data-id": $scope.data[i].id.toString(),
                        }
                        $scope.data[i].state = {
                            opened: true
                        }
                    }
                    if($scope.data.length==0){
                        $scope.data.push(temp2);
                    }
                    $scope.data.push(temp);
                    $scope.treeData=$scope.data;
                    $scope.treeConfig.version++;
                    $scope.isLoading=false;
                }
            }).catch((err)=>{
                $scope.isLoading=false;
            })
        }
        getTreeData();
        $scope.treeConfig = {
            "core": {
                "animation": 300,
                "check_callback": true,
                "multiple": true,
                error: function (error) {
                    $log.error('treeCtrl: error from js tree - ' + angular.toJson(error));
                },
            },
            "types": {
                "default": {
                    "icon": false
                },
                "book": {
                    "icon": "../img/book.png",
                }
            },
            "checkbox": {
                "keep_selected_style": false,
                "three_state": true,
            },
            "plugins": [
                "state", "types", "changed"
            ],
            "version": 1
        };
        $scope.treeConfig.version++;
        // surveyor.modal($scope);
        surveyor.jstree($scope);
        surveyor.behaviour($scope);
        surveyor.modal($scope);
        // COntext Menu
        $scope.contextmenu = function (id, show) {
            $scope.currentId = id;
            $scope.parent_id = $("a.jstree-clicked2").data('id');
            $scope.parent_cus = $("a.jstree-clicked2").data('custom');
            var index = $scope.treeData.findIndex(x => x.id == id);
            var induk = "";
            induk += '<ul id="menuOptions" class="dropdown-menu context-menu" style="min-width:130px !important;border-radius:0;cursor:pointer !important;">';
            var html = "";
            html += '<li><a ng-click="behaviour_add();showPopup()"><i class="fa fa-plus text-success"></i>  Add </a></li>';
            if($scope.treeData[index].is_leaf){
                html += '<li><a ng-click="showPopup();view_object();behaviour_edit();"><i class="fa fa-edit text-primary"></i>  Edit </a></li>';
            }
            html += '<li><a ng-click="doDelete()"><i class="fa fa-trash text-danger"></i>  Delete </a></li>';
            induk += '</ul>';
            $("#context").html(induk);
            $("#menuOptions").html(html);
            $compile($("#context").contents())($scope);
        };
        $scope.showPopup=()=>{
            $scope.open('../views/PopupMasterSyaratKualifikasi.html','lg');
            if($scope.add){
                $scope.form={};
            }
        }
        $scope.DetailsRow=1;
        $scope.addDetails=()=>{
            if($scope.form.details==undefined)$scope.form.details=[];
            for (let i = 0; i < $scope.DetailsRow; i++) {
                $scope.form.details.push({});
            }
        }
        $scope.deleteRow=(index)=>{
            $scope.form.details.splice(index,1);
        }   
        var convertToObject=(form)=>{
            for (let i = 0; i < form.details.length; i++) {
                $scope.form.details[i].InputType = $filter('filter')($scope.listInputType, {'id':form.details[i].field_type},true)[0] || undefined ;
            }
        }
        $scope.go_to_file=()=>{
            console.log($scope.form);
            window.open($scope.baseurl+'/'+$scope.form.file_upload, '_blank');
        };
        $scope.view_object=async ()=>{
            var index=$scope.data.findIndex(x => x.id == $scope.currentId);
            if(index !=-1){
                $scope.form=$scope.data[index];
                convertToObject($scope.form)
            }
        }
        var getInputType=()=>{
            MasterSyaratKualifikasiSvc.getInputType().then((res)=>{
                if(res.status == 200){
                    $scope.listInputType=res.data.data;
                }
            }).catch((err)=>{
                console.log(err,'Error');
                
            })
        }
        getInputType();

        $scope.doSave=()=>{
            $loading.start('save');
            $scope.form.parent_id=$scope.currentId==0?null:$scope.currentId;
            if($scope.form.details !== undefined){
                for (let i = 0; i < $scope.form.details.length; i++) {
                    $scope.form.details[i].field_type=$scope.form.details[i].InputType.id;
                }
            }
            $scope.form.file_upload = $scope.files.name;
            MasterSyaratKualifikasiSvc.create($scope.form, $scope.files).then(async (res)=>{
                if(res.status==200){
                    getTreeData();
                    $loading.finish('save');                    
                    $scope.form=res.data.data;
                    await convertToObject($scope.form);
                    toastr.success("Successfully Created Data")
                    $timeout(()=>{
                        $scope.add=false;
                        angular.element('#hideButton').triggerHandler('click');
                    })
                }
            }).catch((err)=>{
                $loading.finish('save');                    
                toastr.error(err.data.message)
                console.log(err,'Error');
            })
        }
        $scope.doEdit=()=>{
            $loading.start('save');
            for (let i = 0; i < $scope.form.details.length; i++) {
                $scope.form.details[i].field_type=$scope.form.details[i].InputType.id;
            }
            $scope.form.file_upload = $scope.files.file.name;
            MasterSyaratKualifikasiSvc.update($scope.form, $scope.files).then((res)=>{
                if(res.status==200){
                    getTreeData();
                    $loading.finish('save');                    
                    toastr.success("Successfully Updated Data")
                    $scope.form=res.data.data;
                    $timeout(()=>{
                        angular.element('#hideButton').triggerHandler('click');
                    })
                }
            }).catch((err)=>{
                $loading.finish('save');                    
                toastr.error(err.data.message)
                console.log(err,'Error');
            })
        }
        $scope.doDelete=()=>{
            $loading.start('save');
            MasterSyaratKualifikasiSvc.delete($scope.currentId).then((res)=>{
                if(res.status==200){
                    getTreeData();
                    $loading.finish('save')
                    toastr.success("Successfully Deleted Data");
                }
            }).catch((err)=>{
                $loading.finish('save')
                toastr.error(err.data.message)
            })
        }
        $scope.submit=()=>{
            if ($scope.add) {
                $scope.doSave();
            } else if (!$scope.add) {
                $scope.doEdit();
            }
        }
        $scope.files={};
        $scope.$on("seletedFile", function (event, args) {
            $scope.$apply(function () {
                $scope.files.file=args.file;
            });
            console.log($scope.files,'INI');
        });

    }   
    //// Angular Code ////
})(angular);
