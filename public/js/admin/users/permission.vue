
var vm = new Vue({
    el: '#appPermisos',
    created: function () {
        this.getPermisosAct();
        this.getPermisosDisp();
    },
    data: {
        permisosAct: [],
        permisosDisp: [],
        id: '0',
        errors2: []
    },
    methods: {
        getPermisosAct: function () {
            var url = '/users/' + laraveljs.id + '/permisos';
            axios.get(url).then(response => {
                this.id = response.data.valores.id;
                this.permisosAct = response.data.valores.permisos;
            });
        },
        getPermisosDisp: function () {
            var url = '/users/' + laraveljs.id + '/disponibles';
            axios.get(url).then(response => {
                this.permisosDisp = response.data;
            });
        },
        addPermiso: function (item) {
            console.log(item.id)
            var url = '/users/' + this.id + '/addpermiso/' + item.id
            axios.get(url).then(response => {
                if (response.data.codigo == '200') {
                    vm.getPermisosAct();
                    vm.getPermisosDisp();
                    toastr.success(response.data.mensaje, '¡Notificación!');
                } else {
                    toastr.error(response.data.error, '¡Notificación!');
                }
            });
        },
        deletePermiso: function (item) {
            var url = '/users/' + this.id + '/deletepermiso/' + item.id

            swal({
                title: "Eliminar Permiso",
                text: "¿Estás seguro que quieres eliminar este permiso ?",
                type: "warning",
                showCancelButton: true,
                closeOnConfirm: true,
                confirmButtonText: "Si, eliminarla!",
                confirmButtonColor: "#ec6c62"
            },
                function () {

                    axios.get(url).then(response => {
                        if (response.data.codigo == '200') {
                            vm.getPermisosAct();
                            vm.getPermisosDisp();
                            toastr.success(response.data.mensaje, '¡Notificación!');
                        } else {
                            toastr.error(response.data.error, '¡Notificación!');
                        }
                    });

                });

        }

    }

});