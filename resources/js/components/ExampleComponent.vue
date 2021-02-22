<template>
    <div class="container container-task">
        <div class="row">
            <div class="col-md-6">
                <h2>Prueba en Vue.js Con laravel</h2>
                <table class="table text-center">
                        <thead>
                            <tr>
                                <th scope="col">Nombre</th>
                                <th scope="col">Descripción</th>
                                <th scope="col">Contenido</th>
                                <th scope="col">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="prueba in arrayPrueba" :key="prueba.id">
                                <td v-text="prueba.nombre"></td>
                                <td v-text="prueba.descripcion"></td>
                                <td v-text="prueba.contenido"></td>
                                <td>
                                    <button class="btn btn-primary" @click="loadUpdate(prueba)">Modificar</button>
                                    <button class="btn btn-danger" @click="deletePrueba(prueba)">Eliminar</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Nombre</label>
                    <input v-model="nombre" type="text" class="form-control">
                    <label>Descripción</label>
                    <input v-model="descripcion" type="text" class="form-control">
                    <label>Contenido</label>
                    <input v-model="contenido" type="text" class="form-control">
                </div>
                <div class="container-buttons">
                    <button v-if="update == 0" @click="savePrueba()" class="btn btn-success">Agregar</button>
                    <button v-if="update != 0" @click="updatePrueba()" class="btn btn-warning">Actualizar</button>
                    <button v-if="update != 0" @click="clear()" class="btn">Atrás</button>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        data(){
            return{
                nombre:"", 
                descripcion:"", 
                contenido:"", 
                update:0, 
                arrayPrueba:[], 
            }
        },
        methods:{
            getPrueba(){
                let me =this;
                let url = '/prueba' 
                axios.get(url).then(function (response) {
                    me.arrayPrueba = response.data;
                })
                .catch(function (error) {
                    console.log(error);
                });
            },
            savePrueba(){
                let me =this;
                let url = '/prueba/guardar'
                axios.post(url,{ 
                    'nombre':this.nombre,
                    'descripcion':this.descripcion,
                    'contenido':this.contenido,
                }).then(function (response) {
                    me.getPrueba();
                    me.clear();
                })
                .catch(function (error) {
                    console.log(error);
                });   

            },
            updatePrueba(){
                let me = this;
                axios.put('/prueba/actualizar',{
                    'id':this.update,
                    'nombre':this.nombre,
                    'descripcion':this.descripcion,
                    'contenido':this.contenido,
                }).then(function (response) {
                   me.getPrueba();
                   me.clear();
                })
                .catch(function (error) {
                    console.log(error);
                });
            },
            loadUpdate(data){ 
                this.update = data.id
                let me =this;
                let url = '/prueba/buscar?id='+this.update;
                axios.get(url).then(function (response) {
                    me.nombre= response.data.nombre;
                    me.descripcion= response.data.descripcion;
                    me.contenido= response.data.contenido;
                })
                .catch(function (error) {
                    console.log(error);
                }); 
            },
            deletePrueba(data){
                let me =this;
                let prueba_id = data.id
                if (confirm('¿Seguro que deseas borrar esta Prueba?')) {
                    axios.delete('/prueba/borrar/'+prueba_id
                    ).then(function (response) {
                        me.getPrueba();
                    })
                    .catch(function (error) {
                        console.log(error);
                    }); 
                }
            },
            clear(){
                this.nombre = "";
                this.descripcion = "";
                this.contenido = "";
                this.update = 0;
            }
        },
        mounted() {
           this.getPrueba();
        }
    }
</script>