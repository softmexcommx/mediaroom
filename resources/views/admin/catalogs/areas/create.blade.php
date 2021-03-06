<form method="POST" v-on:submit.prevent="CreateArea">
    <div class="modal inmodal fade" id="createArea" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header inmodal modal-header-primary">
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
                    </button>
                    <h3>Nueva Area</h3>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">

                                <label class="control-label">Nombre Area</label>
                                <input type="text" v-validate="'required'" data-vv-delay="500"
                                    :class="{'input': true, 'is-danger': errors.has('nameArea') }" class="form-control"
                                    name="nameArea" v-model="nameArea" placeholder="Nombre">
                                <span v-show="errors.has('nameArea')"
                                    class="help is-danger">@{{ errors.first('nameArea') }}</span>
                            </div>

                        </div>
                    </div>
                   

                    <span v-for="error in errors2" class="text-danger">@{{ error }}</span>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-white" data-dismiss="modal">Cerrar</button>
                    <input type="submit" data-style="expand-left" class="ladda-button btn btn-success pull-right"
                        value="Guardar">
                </div>
            </div>
        </div>
    </div>


</form>