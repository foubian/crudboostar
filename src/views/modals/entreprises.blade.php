<div class="modal fade" id="entreprises" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">
                    Ajouter Entreprise
                </h4>
            </div>
            <!-- Modal Body -->
            <div class="modal-body">
                <form data-toggle="validator" id="newentreprise">
                    <div class="form-group  has-feedback">
                        <label for="inputName" class="control-label">Dinomination
                            <span class="text-danger" title="crudbooster::crudbooster. this_field_is_required">* </span>:
                        </label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-keyboard"></i></span>
                            <input type="text" data-error="champ obligatoire" pattern="^[_A-z0-9]{1,}$" class="form-control" name="dinomination" id="dinomination" placeholder="Nom Entreprise" required>
                        </div>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group  has-feedback">
                        <label for="inputName" class="control-label">Ville
                            <span class="text-danger" title="crudbooster::crudbooster. this_field_is_required">* </span>:
                        </label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-keyboard"></i></span>
                            <input type="text" data-error="champ obligatoire" pattern="^[_A-z0-9]{1,}$" class="form-control" name="ville" id="ville" placeholder="Agadir" required>
                        </div>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group  has-feedback">
                        <label for="inputName" class="control-label">Téléphone
                            <span class="text-danger" title="crudbooster::crudbooster. this_field_is_required">* </span>:
                        </label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-keyboard"></i></span>
                            <input type="text" data-error="champ obligatoire" pattern="^\(0\d{1}\)(?:\d{1}){4}-(?:\d{1}){4}$" class="form-control fone" name="phone" id="phone" placeholder="(06)4229-5748" required>
                        </div>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group  has-feedback">
                        <label for="inputName" class="control-label">Activité
                            <span class="text-danger" title="crudbooster::crudbooster. this_field_is_required">* </span>:
                        </label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-keyboard"></i></span>
                            <input type="text" data-error="champ obligatoire" pattern="^[_A-z0-9]{1,}$" class="form-control" name="activite" id="activite" placeholder="Informatique" required>
                        </div>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group">
                        <button type="submit" id="submitbtn" class="btn btn-primary">Ajouter</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
