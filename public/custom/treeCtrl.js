(function (angular) {
    'use strict';

    //// JavaScript Code ////
    function treeCtrl($log,TenderSvc, $timeout, $scope,surveyor,$compile,$window,$http,toastr,$loading,$sce) {
        var selectedstrorage = {};
        var baseurl = $window.location.href.split('//')[1];
        https = $window.location.href.split('//')[0];
        baseurl = baseurl.split('/')[0];
        baseurl = https + '//' + baseurl;
        var baseurlapi = baseurl + "/api/";

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
        var getTreeData=(id)=>{
            $scope.isLoading=true;
            return TenderSvc.getList(id).then((res)=>{
                if(res.status==200){
                    var temp={
                        "id": "0",
                        "parent": "#",
                        "type": "book",
                        "text": "Syarat Kualifikasi / "+res.data.tender,
                        "state": {
                            "opened": true
                        },
                        "a_attr": { "context-menu": "menuOptions", "data-custom": "1", "data-id": "0","class":"d-none" }
                    }
                    var temp2={
                        "id": "1",
                        "parent": "#",
                        "type": "book",
                        "text": "Syarat Kualifikasi / "+res.data.tender,
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
                                    "class":"text-incomplete"
                                }
                            }else{
                                $scope.data[i].a_attr = {
                                    "context-menu": "menuOptions",
                                    "data-custom": "0",
                                    "data-id": $scope.data[i].id.toString(),
                                    "class":"text-complete"
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
        var getId=$window.location.href.split('?id=')[1];
        getTreeData(getId);
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
                    "icon": "../../img/book.png",
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
                html += '<li><a ng-click="doUpdateMode(\'deactive\')"><i class="fa fa-close text-danger"></i>  Deactive</a></li>';
                induk += '</ul>';
            }
            else if($scope.treeData[index].active==false && $scope.treeData[index].is_leaf==true){
                induk += '<ul id="menuOptions" class="dropdown-menu context-menu" style="min-width:130px !important;border-radius:0;cursor:pointer !important;">';
                html += '<li><a ng-click="doUpdateMode(\'active\')"><i class="fa fa-check text-success"></i>  Active </a></li>';
                induk += '</ul>';
            }
            await $("#context").html(induk);
            await $("#menuOptions").html(html);
            await $compile($("#context").contents())($scope);
        };
        $scope.showPopup=()=>{
            $scope.open('../../../views/tenderSyaratKualifikasi.html','lg');
            $scope.form={};
        }
        $scope.DetailsRow=1;
        $scope.addDetails=async()=>{
            if($scope.form.details==undefined)$scope.form.details=[];
            for (let i = 0; i < $scope.DetailsRow; i++) {
                var sequence = (+$scope.sequence)+1;
                $scope.form.group_by[sequence]=[];
                
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
            
            await getDataDetails().then(res=>{
                $scope.dataDetails = $sce.trustAsHtml(res);
            });
        }
        $scope.deleteRow=async(sequence)=>{
            delete $scope.form.group_by[sequence];
            for (let i = 0; i < $scope.form.details.length; i++) {
                if($scope.form.details[i].sequence == parseInt(sequence)){
                    $scope.form.details.splice(i,1);
                    i=i-1;
                }
            }
            await getDataDetails().then(res=>{
                $scope.dataDetails = $sce.trustAsHtml(res);
            })
        }   
        $scope.doUpdateMode=(mode)=>{
            $loading.start('save');
            var data={
                id:$scope.currentId,
                tender_id:getId
            };
            TenderSvc.UpdateMode(mode,data).then(async (res)=>{
                if(res.status == 200){
                    await getTreeData(getId);
                    $loading.finish('save');
                    if(mode=='active')
                        toastr.success("Successfully Activated Data");
                    else
                        toastr.success("Successfully Deactivated Data");
                }
            }).catch((err)=>{
                console.log(err,' Error');
                $loading.finish('save');
                toastr.error(err.data.message);
            })
        }
        $scope.view_object=async ()=>{
            $loading.start('save');
            TenderSvc.getById(getId,$scope.currentId).then(async(res)=>{
                $scope.form=angular.copy(res.data.data);
                $scope.form.master_syarat_kualifikasi.details.sort(function(a, b) {
                    return parseFloat(a.sequence) - parseFloat(b.sequence);
                });
                $scope.form.details.sort(function(a, b) {
                    return parseFloat(a.sequence) - parseFloat(b.sequence);
                });
                                
                $scope.form.group_by = _.groupBy($scope.form.details,'sequence');
                await getDataDetails().then(res=>{
                    $scope.dataDetails = $sce.trustAsHtml(res);
                });
                $loading.finish('save');
            }).catch((err)=>{
                $loading.finish('save');
                toastr.error(err.data.message);
            });
        }
        $scope.sequence = 0;
        var getDataDetails=async()=>{
            $loading.start('save');
            var data='';
            if($scope.form != undefined){
                let no = 1;
                
                for (var key in $scope.form.group_by) {
                    $scope.sequence = key;
                    data +='<tr><td class="text-center v-middle">'+(no++)+'</td>';
                    for (let x = 0; x < $scope.form.master_syarat_kualifikasi.details.length; x++) {
                        var idDetail = $scope.form.master_syarat_kualifikasi.details[x].id;
                        var index = $scope.form.details.findIndex(x => x.master_syarat_kualifikasi_detail_id == idDetail && x.sequence == $scope.sequence);
                        if($scope.form.master_syarat_kualifikasi.details[x].field_type==26){
                            data += '<td><input type="text" class="form-control free-text" ng-model="form.details['+index+'].value" ng-readonly="!control || form.master_syarat_kualifikasi.is_dokumen" required></td>';
                        } else if($scope.form.master_syarat_kualifikasi.details[x].field_type==27){
                            data += '<td><input type="number" class="form-control free-text" ng-model="form.details['+index+'].value" ng-readonly="!control || form.master_syarat_kualifikasi.is_dokumen" required></td>';
                        } else if($scope.form.master_syarat_kualifikasi.details[x].field_type==64){
                            data += "<td>";
                            let required = "required";
                            if($scope.form.details[index].value!=""){
                                data += '<a href="'+ baseurl + "/uploads/tender/details/" + $scope.form.details[index].value + '" target="_blank">Download</a>';
                                required = ""
                            }
                            data += '<input type="file" class="form-control free-text" upload-many-files id="'+$scope.form.details[index].master_syarat_kualifikasi_detail_id+'-'+index+'" ng-readonly="!control || form.master_syarat_kualifikasi.is_dokumen" '+required+'></td>';
                        } else if($scope.form.master_syarat_kualifikasi.details[x].field_type==66){
                            const datatable = $scope.form.master_syarat_kualifikasi.details[x].datatable.split(",");
                            data += '<td><select class="form-control" ng-model="form.details['+index+'].value">';
                            await $http.get(baseurlapi+datatable[0])
                                .then(async(res)=>{
                                    res.data.data.forEach((v,i)=>{
                                        data += '<option value="'+v.id+'">'+v.nama+'</option>';
                                    })
                                    $loading.finish('save');
                                }).catch((err)=>{
                                    $loading.finish('save');                    
                                    toastr.error(err.data.message)                        
                                });
                            data += '</select></td>';
                        }
                    }
                    data +='<td class="text-center v-middle" ng-class="{\'no-event\':!control || form.master_syarat_kualifikasi.is_dokumen}"> <i class="fa fa-trash color-red cursor-pointer" ng-click="deleteRow('+$scope.sequence+')"></i> </td></tr>';
                }
            }
            $loading.finish('save');
            return data;
        }
        
        var update=()=>{
            TenderSvc.update($scope.form).then((res)=>{
                if(res.status==200){
                    getTreeData(getId);
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
            var baseurl = $window.location.href.split('//')[1];
            https = $window.location.href.split('//')[0];
            baseurl = baseurl.split('/')[0];
            baseurl = https + '//' + baseurl;
            baseurlapi = baseurl + "/api/";

            $loading.start('save');
            if(!$scope.form.master_syarat_kualifikasi.is_dokumen && !$scope.files){
                update();
            }else{
                if($scope.form.is_dokumen_exist){
                    update();
                }else{
                    var data=$scope.form;
                    $http({
                        method: 'POST',  
                        url: baseurlapi+"tender-syarat-kualifikasi",
                        headers: { 'Content-Type': undefined },
                        transformRequest: function (data) {
                            var formData = new FormData();
                            formData.append("model", angular.toJson(data.model));

                            for (const [id, files] of Object.entries($scope.files)){
                                formData.append("file_detail["+id+"]", files);
                            } 
                            return formData;                               
                        },
                        data: { model: data, file_detail: $scope.files }
                    }).then(async (res)=>{
                        if(res.status == 200){
                            $timeout(()=>{
                                angular.element('#hideButton').triggerHandler('click');
                                getTreeData(getId);
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
        });

        $scope.$on("seletedFiles", function (event, args) {  
            $scope.$apply(function () {  
                var id = args.event.id.split("-");
                $scope.files[args.event.id]=args.file;  
                $scope.form.details[id[1]].value=args.event.id+'.'+args.file.name.split(".")[args.file.name.split(".").length-1];
            });
        });

        $scope.$on("onFileChange", function (event, args) {  
            console.log(event,'INI');
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

    app.controller('treeCtrl', treeCtrl);

})(angular);
