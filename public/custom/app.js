var app = angular.module('app', ['ui.bootstrap', 'ngJsTree', 'ui.select', 'toastr', 'darthwade.dwLoading', 'ngSanitize'], function ($interpolateProvider) {
    $interpolateProvider.startSymbol('<%');
    $interpolateProvider.endSymbol('%>');
});
// Component
app.factory("surveyor", function ($timeout, $compile, $uibModal) {
    var self = {};
    self.jstree = function ($scope) {
        var refreshJs = function () {
            $compile($("#js-tree").contents())($scope);
            // angular.element(document).injector().invoke(function ($compile) {
            //     });
        };
        $scope.$watch(
            function () {
                return {
                    w: $("#js-tree").width(),
                    h: $("#js-tree").height()
                };
            },
            function (newValue, oldValue) {
                if (newValue.w != oldValue.w || newValue.h != oldValue.h) {
                    // Do something ...
                    $timeout(function () {
                        refreshJs();
                    });
                }
            },
            true
        );
    };
    self.modal = function ($scope) {
        $scope.open = function (page, size) {
            var modal = $uibModal.open({
                animation: true,
                templateUrl: page,
                size: size,
                scope: $scope,
                controller: function ($scope, $uibModalInstance, $rootScope) {
                    $rootScope.closemodal = function () {
                        $uibModalInstance.dismiss("cancel");
                    };
                }
            });
        };
    };
    self.behaviour = function ($scope) {
        $scope.saveId = function (newId) {
            $scope.getId = newId.toString();
        };
        var full_control = function () {
            $scope.control = true;
            $scope.add = false;
            $scope.edit = false;
            $scope.edits = false;
            $scope.view = false;
        };
        $scope.behaviour_add = function () {
            $scope.form = {};
            $scope.forms = {};
            full_control();
            $scope.add = true;
            $scope.form.Year = new Date().getFullYear();
        };
        $scope.behaviour_view = function () {
            full_control();
            $scope.control = false;
            $scope.view = true;
        };
        $scope.behaviour_edit = function () {
            full_control();
            $scope.edit = true;
        };
    };
    return self;
})
// COntextMenu DIrective
app.directive("contextMenu", function ($timeout) {
    return {
        restrict: "A",
        scope: "@&",
        compile: function compile(tElement, tAttrs, transclude) {
            return {
                post: function postLink(scope, iElement, iAttrs, controller) {
                    var ul;
                    var last = null;
                    // ul.css({ 'display': 'none' });
                    $(iElement).on("contextmenu", function (event) {
                        event.preventDefault();
                        // $("a.jstree-anchor").removeClass('jstree-clicked');
                        var newId = $(iElement).data("id");
                        // scope.saveId(newId);

                        if (typeof iAttrs.custom === "undefined" || typeof iAttrs.contexcustom === "customContext") {
                            var newValue = $(iElement)
                                .find("input")
                                .prop("checked");
                            var selected = scope.selected.length;

                            if (newValue == false) {
                                if (selected == 1) {
                                    $timeout(function () {
                                        $(".custom-table")
                                            .find(".s-row-select")
                                            .each(function () {
                                                var prop = $(this).prop("checked");
                                                if (prop == true) {
                                                    $(this)
                                                        .parent()
                                                        .triggerHandler("click");
                                                }
                                            });
                                    });
                                }
                            }
                            if (newValue === false) {
                                $timeout(function () {
                                    $(iElement)
                                        .find(".row-select")
                                        .triggerHandler("click");
                                });
                            }
                            if (typeof iAttrs.contexcustom === "undefined") {
                                ul = $("#" + iAttrs.contextMenu);
                            } else {
                                $timeout(function () {
                                    scope.contextmenu(iAttrs.custom, setShow);
                                    ul = $("#" + iAttrs.contextMenu);
                                });
                            }
                        } else {
                            if ($(this).is(".jstree-clicked")) {
                                var setShow = true;
                            } else {
                                var setShow = false;
                            }
                            $timeout(function () {
                                scope.contextmenu(iAttrs.id, setShow);
                                ul = $("#" + iAttrs.contextMenu);
                            });
                            $(this).addClass("jstree-clicked2");
                        }
                        $timeout(function () {
                            var X = event.clientX;
                            var Y = event.clientY;
                            ul.css({
                                display: "block",
                                position: "fixed",
                                top: Y + "px",
                                left: X + "px"
                            });
                            last = event.timeStamp;
                        });
                    });
                    $(document).on("click", function (event) {
                        ul = $("#" + iAttrs.contextMenu);
                        var target = $(event.target);
                        if (!target.is(".popover") &&
                            !target.parents().is(".popover")
                        ) {
                            if (last === event.timeStamp) return;
                            ul.css({
                                display: "none"
                            });
                            $(iElement).removeClass("jstree-clicked2");
                        }
                    });
                }
            };
        }
    };
})
// Module APi Master Get
app.factory('MasterSyaratKualifikasiSvc', function ($http, $window) {
    var baseurl = $window.location.href.split('//')[1];
    https = $window.location.href.split('//')[0];
    baseurl = baseurl.split('/')[0];
    baseurl = https + '//' + baseurl + "/api/";
    return {
        getList: function () {
            var url = baseurl + 'master-syarat-kualifikasi';
            return $http.get(url);
        },
        getById: function (id) {
            var url = baseurl + 'master-syarat-kualifikasi/' + id;
            return $http.get(url);
        },
        create: function (data,files) {
            var url = baseurl + 'master-syarat-kualifikasi'
            var files=files;
            return $http({
                method: 'POST',
                url: url, 
                headers: { 'Content-Type': undefined },
                transformRequest: function (data) {
                    var formData = new FormData();
                    formData.append("model", angular.toJson(data.model));
    
                    for (const [id, file] of Object.entries(files)){
                        formData.append("file_detail["+id+"]", file);
                    } 
                    return formData;                               
                },
                data: { model: data, file_detail: files }
            })
        },
        update: function (data, files) {
            var url = baseurl + 'master-syarat-kualifikasi/' + data.id;
            return $http({
                method: 'POST',
                url: url, 
                headers: { 'Content-Type': undefined },
                transformRequest: function (data) {
                    var formData = new FormData();
                    formData.append('_method','PUT');
                    formData.append("model", angular.toJson(data.model));
                    console.log(data);
                    for (const [id, file] of Object.entries(data.file_detail)){
                        formData.append("file_detail["+id+"]", file);
                    } 
                    return formData;                               
                },
                data: { model: data, file_detail: files }
            })
        },
        delete: function (id) {
            var url = baseurl + 'master-syarat-kualifikasi/' + id;
            return $http.delete(url)
        },
        getInputType: function () {
            var url = baseurl + 'enumeration?key=typefield'
            return $http.get(url);
        }
    }
})
// Module APi Master Get
app.factory('PeralatanSvc', function ($http, $window) {
    var baseurl = $window.location.href.split('//')[1];
    https = $window.location.href.split('//')[0];
    baseurl = baseurl.split('/')[0];
    baseurl = https + '//' + baseurl + "/api/";
    return {
        getList: function () {
            var url = baseurl + 'peralatans';
            return $http.get(url);
        },
        getById: function (id) {
            var url = baseurl + 'peralatan/' + id;
            return $http.get(url);
        },
        create: function (data) {
            var url = baseurl + 'peralatan'
            return $http.post(url, data)
        },
        update: function (data) {
            var url = baseurl + 'peralatan/' + data.id;
            return $http.put(url, data)
        },
        delete: function (id) {
            var url = baseurl + 'peralatan/' + id;
            return $http.delete(url)
        }
    }
})
app.factory('TenderSvc', function ($http, $window) {
    var baseurl = $window.location.href.split('//')[1];
    https = $window.location.href.split('//')[0];
    baseurl = baseurl.split('/')[0];
    baseurl = https + '//' + baseurl + "/api/";
    return {
        getList: function (id) {
            var url = baseurl + 'tender-syarat-kualifikasi?tender_id=' + id;
            return $http.get(url);
        },
        getById: function (tenderid, masterid) {
            var url = baseurl + 'tender-syarat-kualifikasi/show?tender_id=' + tenderid + '&master_syarat_kualifikasi_id=' + masterid;
            return $http.get(url);
        },
        update: function (data) {
            var url = baseurl + 'tender-syarat-kualifikasi';
            return $http.post(url, data)
        },
        UpdateMode: (mode, data) => {
            var url = baseurl + 'tender-syarat-kualifikasi?mode=' + mode;
            return $http.post(url, data);
        },
        SendNotification: (mode, id) => {
            var url;
            if (mode == "tender") {
                url = baseurl + 'tender/send-notif-by-tender/' + id;
            } else {
                url = baseurl + 'tender/send-notif-by-verifikator/' + id;
            }
            return $http.get(url);
        }

    }
})
app.factory('KelengkapanSvc', function ($http, $window) {
    var baseurl = $window.location.href.split('//')[1];
    https = $window.location.href.split('//')[0];
    baseurl = baseurl.split('/')[0];
    baseurl = https + '//' + baseurl + "/api/";
    return {
        getList: function (id) {
            var url = baseurl + 'kelengkapan-syarat-kualifikasi?tender_id=' + id;
            return $http.get(url);
        },
        getById: function (tenderid, masterid) {
            var url = baseurl + 'kelengkapan-syarat-kualifikasi/show?tender_id=' + tenderid + '&master_syarat_kualifikasi_id=' + masterid;
            return $http.get(url);
        },
        update: function (data) {
            var url = baseurl + 'kelengkapan-syarat-kualifikasi';
            return $http.post(url, data)
        },
        UpdateMode: (mode, data) => {
            var url = baseurl + 'kelengkapan-syarat-kualifikasi?mode=' + mode;
            return $http.post(url, data);
        },
        SendNotification: (mode, id) => {
            var url;
            if (mode == "tender") {
                url = baseurl + 'tender/send-notif-by-tender/' + id;
            } else {
                url = baseurl + 'tender/send-notif-by-verifikator/' + id;
            }
            return $http.get(url);
        }

    }
})
app.factory('JadwalSvc', function ($http, $window) {
    var baseurl = $window.location.href.split('//')[1];
    https = $window.location.href.split('//')[0];
    baseurl = baseurl.split('/')[0];
    baseurl = https + '//' + baseurl + "/api/";
    return {
        getById: function (id) {
            var url = baseurl + 'tender/' + id;
            return $http.get(url);
        },
        update: function (data) {
            var url = baseurl + 'tender/' + data.id;
            return $http.put(url, data)
        }
    }
})
app.factory('DashboardSvc', function ($http, $window) {
    var baseurl = $window.location.href.split('//')[1];
    https = $window.location.href.split('//')[0];
    baseurl = baseurl.split('/')[0];
    baseurl = https + '//' + baseurl + "/api/";
    return {
        getById: function (id) {
            var url = baseurl + 'tender/' + id;
            return $http.get(url);
        },
        update: function (data) {
            var url = baseurl + 'tender/' + data.id;
            return $http.put(url, data)
        }
    }
})
app.directive('compileTemplate', function ($compile, $parse) {
    return {
        link: function (scope, element, attrs) {
            var parsed = $parse(attrs.ngBindHtml);

            function getStringValue() {
                return (parsed(scope) || '').toString();
            }

            // Recompile if the template changes
            var compileScope = scope;
            if (attrs.bindHtmlScope) {
                compileScope = scope.$eval(attrs.bindHtmlScope);
            }
            $compile(element.contents())(compileScope);
            scope.$watch(getStringValue, function () {
                $compile(element, null, -9999)(scope);  // The -9999 makes it skip directives so that we do not recompile ourselves
            });
        }
    }
})
app.directive('uploadFiles', function () {
    return {
        scope: true,        //create a new scope  
        link: function (scope, el, attrs) {
            el.bind('change', function (event) {
                var files = event.target.files;
                var event = event.target;
                //iterate files since 'multiple' may be specified on the element  
                for (var i = 0; i < files.length; i++) {
                    //emit event upward  
                    scope.$emit("seletedFile", {file: files[i], event: event});
                }
            });
        }
    };
})

app.directive('uploadManyFiles', function () {
    return {
        scope: true,        //create a new scope  
        link: function (scope, el, attrs) {
            el.bind('change', function (event) {
                var files = event.target.files;
                var event = event.target;
                //iterate files since 'multiple' may be specified on the element  
                for (var i = 0; i < files.length; i++) {
                    //emit event upward  
                    scope.$emit("seletedFiles", {file: files[i], event: event});
                }
            });
        }
    };
})