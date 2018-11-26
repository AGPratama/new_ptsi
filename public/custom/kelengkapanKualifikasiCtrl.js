(function (angular) {
    'use strict';

    //// JavaScript Code ////
    function kelengkapanKualifikasiCtrl($log,JadwalSvc,$http,TenderSvc,$compile, $timeout, $scope,surveyor,$window,toastr,$loading,$sce) {
        $scope.getCurrentId = null;
        $scope.privilegeId = 0;
        $scope.getTenderData=(id)=>{
            $scope.getCurrentId = id;
             console.log(id)
            $scope.isLoading=true;
            $loading.start('save');
            $scope.getTreeData(id);
            console.log($scope.privilegeId,"privilegeid")
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
        var selectedstrorage = {}
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

        var newId = 1;
        $scope.ignoreChanges = false;
        $scope.newNode = {};
        $scope.getTreeData=(id)=>{
            $scope.isLoading=true;
            return TenderSvc.getList(id).then((res)=>{
                if(res.status==200){
                    var temp={
                        "id": "0",
                        "parent": "#",
                        "type": "book",
                        "text": "Syarat Kualifikasi",
                        "state": {
                            "opened": true
                        },
                        "a_attr": { "context-menu": "menuOptions", "data-custom": "1", "data-id": "0","class":"d-none" }
                    }
                    var temp2={
                        "id": "1",
                        "parent": "#",
                        "type": "book",
                        "text": "Syarat Kualifikasi",
                        "state": {
                            "opened": true
                        },
                        "a_attr": { "context-menu": "menuOptions", "data-custom": "1", "data-id": "1" }
                    }
                    $scope.data=angular.copy(res.data.data);
                    for (var i = 0; i < $scope.data.length; i++) {
                        $scope.data[i].text = $scope.data[i].nama + "<span class='jstree-sequence'>"+$scope.data[i].sequence+"</span>";
                        $scope.data[i].id = $scope.data[i].id.toString();
                        if($scope.data[i].parent_id != null){
                            $scope.data[i].parent = $scope.data[i].parent_id.toString();
                        }else{
                            $scope.data[i].parent = "0";
                        }
                        if($scope.data[i].active){
                            if(!$scope.data[i].complete){
                                $scope.data[i].a_attr = {
                                    "context-menu": "menuOptions",
                                    "data-custom": "0",
                                    "data-id": $scope.data[i].id.toString(),
                                    "class": $scope.data[i].verified ? 'text-incomplete verified' : 'text-incomplete unverified'
                                }
                            }else{
                                if($scope.data[i].completed) {
                                    $scope.data[i].a_attr = {
                                        "context-menu": "menuOptions",
                                        "data-custom": "0",
                                        "data-id": $scope.data[i].id.toString(),
                                        "class": $scope.data[i].verified ? 'text-complete verified' : 'text-complete unverified'
                                    }
                                }else{
                                    $scope.data[i].a_attr = {
                                        "context-menu": "menuOptions",
                                        "data-custom": "0",
                                        "data-id": $scope.data[i].id.toString(),
                                        "class":  $scope.data[i].verified ? 'text-yellow verified' : 'text-yellow unverified'
                                    }
                                }
                            }
                        }else{
                            if($scope.data[i].is_leaf){
                                $scope.data[i].a_attr = {
                                    "context-menu": "menuOptions",
                                    "data-custom": "0",
                                    "data-id": $scope.data[i].id.toString(),
                                    "class":"node-inactive"
                                }
                            }else{
                                $scope.data[i].a_attr = {
                                    "context-menu": "menuOptions",
                                    "data-custom": "0",
                                    "data-id": $scope.data[i].id.toString()
                                }
                            }
                            $scope.data[i].text = $scope.data[i].nama;
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
                    console.log($scope.treeData,'Ini Data tree');
                    $scope.isLoading=false;
                }
            }).catch((err)=>{
                $scope.isLoading=false;
                console.log(err,'Ini Errror');
            })
        }
        $scope.applyModelChanges = function() {
            return !$scope.ignoreChanges;
        };
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
                    "icon": "../../../img/book.png",
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
        }
        surveyor.jstree($scope);
        surveyor.behaviour($scope);
        surveyor.modal($scope);
        $scope.contextmenu = async function (id, show) {
            $scope.currentId = id;
            $scope.parent_id = $("a.jstree-clicked2").data('id');
            $scope.parent_cus = $("a.jstree-clicked2").data('custom');
            var index = $scope.treeData.findIndex(x => x.id == id);
            var induk = "";
            var html = "";
            if($scope.treeData[index].active==true && $scope.treeData[index].is_leaf==true){
                induk += '<ul id="menuOptions" class="dropdown-menu context-menu" style="min-width:130px !important;border-radius:0;cursor:pointer !important;">';
                html += '<li><a ng-click="showPopup();view_object();behaviour_edit();"><i class="fa fa-edit text-primary"></i>  Edit </a></li>';
                induk += '</ul>';
            }
            await $("#context").html(induk);
            await $("#menuOptions").html(html);
            await $compile($("#context").contents())($scope);
        };
        $scope.showPopup=()=>{
            $scope.open('../../../views/kelengkapanSyaratKualifikasi.html','lg');
            $scope.form={};
        }
        $scope.DetailsRow=1;
        $scope.addDetails=()=>{
            if($scope.form.details==undefined)$scope.form.details=[];
            for (let i = 0; i < $scope.DetailsRow; i++) {
                var sequence = (+$scope.sequence)+1;
                $scope.form.group_by[sequence]=[];
                console.log({as:sequence,as:$scope.form},'dorm');

                for(let x = 0;x<$scope.form.master_syarat_kualifikasi.details.length;x++){
                    $scope.form.details.push(
                        {
                            "master_syarat_kualifikasi_detail_id": $scope.form.master_syarat_kualifikasi.details[x].id,
                            "value": "",
                            "sequence": sequence
                        }
                    );
                }
            }
        }
        $scope.deleteRow=(sequence)=>{
            delete $scope.form.group_by[sequence];
            for (let i = 0; i < $scope.form.details.length; i++) {
                if($scope.form.details[i].sequence == parseInt(sequence)){
                    $scope.form.details.splice(i,1);
                    i=i-1;
                }
            }
        }
        $scope.doSend=(mode)=>{
            $loading.start('save');
            TenderSvc.SendNotification(mode,$scope.getCurrentId).then(async (res)=>{
                if(res.status == 200){
                    $loading.finish('save');
                    if(res.data.error_code == 0)
                        toastr.success(res.data.message);
                    else
                        toastr.error(res.data.message);
                }
            }).catch((err)=>{
                console.log(err,' Error');
                $loading.finish('save');
                toastr.error(err.data.message);
            })
        }
        $scope.view_object=async ()=>{
            $loading.start('save');
            TenderSvc.getById($scope.getCurrentId,$scope.currentId).then(async(res)=>{
                $scope.form=angular.copy(res.data.data);
                $scope.form.master_syarat_kualifikasi.details.sort(function(a, b) {
                    return parseFloat(a.sequence) - parseFloat(b.sequence);
                });
                $scope.form.details.sort(function(a, b) {
                    return parseFloat(a.sequence) - parseFloat(b.sequence);
                });
                $scope.form.group_by = _.groupBy($scope.form.details,'sequence');
                console.log($scope.form)
                $loading.finish('save');
            }).catch((err)=>{
                $loading.finish('save');
                console.log(err,'Error');
                toastr.error(res.data.message);
            })
        }
        $scope.sequence = 0;
        $scope.getDataDetails=()=>{
            var data='';
            if($scope.form != undefined){
                let no = 1;
                for (var key in $scope.form.group_by) {
                    $scope.sequence = key;
                    data +='<tr><td class="text-center v-middle">'+(no++)+'</td>';
                    for (let x = 0; x < $scope.form.master_syarat_kualifikasi.details.length; x++) {
                        var idDetail = $scope.form.master_syarat_kualifikasi.details[x].id;
                        var index = $scope.form.details.findIndex(x => x.master_syarat_kualifikasi_detail_id == idDetail && x.sequence == $scope.sequence);
                        data +='<td class="input-table"><input type="'+($scope.form.master_syarat_kualifikasi.details[x].field_type==26?"text":"number")+'" class="form-control free-text" ng-model="form.details['+index+'].value" ng-readonly="!control || form.master_syarat_kualifikasi.is_dokumen" required></td>';
                    }
                    data +='<td class="text-center v-middle" ng-class="{\'no-event\':!control || form.master_syarat_kualifikasi.is_dokumen}"> <i class="fa fa-trash color-red cursor-pointer" ng-click="deleteRow('+$scope.sequence+')"></i> </td></tr>';
                }
                console.log(data,' Thus');
                return $sce.trustAsHtml(data);
            }
        }
        var update=()=>{
            TenderSvc.update($scope.form).then((res)=>{
                if(res.status==200){
                    $scope.getTreeData($scope.getCurrentId);
                    $scope.view_object()
                    $loading.finish('save');
                    toastr.success("Successfully Updated Data")
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
        $scope.doEdit=()=>{
            $loading.start('save');
            if(!$scope.form.master_syarat_kualifikasi.is_dokumen){
                update();
            }else{
                if($scope.form.is_dokumen_exist){
                    update();
                }else{
                    var data=$scope.form;
                    console.log($scope.files.file,'ini');

                    $http({
                        method: 'POST',
                        url: $window.location.href.split('8000/')[0]+"8000/api/tender-syarat-kualifikasi",
                        headers: { 'Content-Type': undefined },
                        transformRequest: function (data) {
                            var formData = new FormData();
                            formData.append("model", angular.toJson(data.model));
                            formData.append("dokumen", $scope.files.file);
                            return formData;
                        },
                        data: { model: data, dokumen: $scope.files.file }
                    }).then(async (res)=>{
                        if(res.status == 200){
                            $timeout(()=>{
                                angular.element('#hideButton').triggerHandler('click');
                                $scope.getTreeData($scope.getCurrentId);
                                $scope.view_object();
                            })
                            $loading.finish('save');
                            toastr.success("Successfully Updated Data")
                        }
                    }) .catch((res)=>{
                        $loading.finish('save');
                        toastr.error(res.data.message)
                    })
                }
            }
        }
        $scope.files={};
        $scope.$on("seletedFile", function (event, args) {
            $scope.$apply(function () {
                $scope.files.file=args.file;
                $scope.form.is_dokumen_exist=false;
            });
            console.log($scope.files,'INI');
        });
        $scope.download_file=(value)=>{
            var url=$window.location.href.split('admin/')[0]+value;
            $window.open(url, '_blank');
        }
        $scope.change=()=>{
            $scope.form.is_dokumen_exist=false;
        }
    }
    //// Angular Code ////

    app.controller('kelengkapanKualifikasiCtrl', kelengkapanKualifikasiCtrl);

})(angular);
