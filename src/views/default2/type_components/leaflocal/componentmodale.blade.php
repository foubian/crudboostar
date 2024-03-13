<div class='form-group {{ $header_group_class }} {{ $errors->first($name) ? 'has-error' : '' }}'
    id='form-group-{{ $name }}' style="{{ @$form['style'] }}">
    <label class='control-label col-sm-2'>{{ $form['label'] }}
        @if ($required)
            <span class='text-danger' title='{!! cbLang('this_field_is_required') !!}'>*</span>
        @endif
    </label>

    <div class="{{ $col_width ?: 'col-sm-10' }}">
        <a href="#" data-toggle="modal" data-target="#localmodal" class="btn btn-block btn-social btn-linkedin">
            <i class="fa fa-location-crosshairs" style="font-size: 1em;"></i> Localiser
        </a>
        <div id="map"  style="height:360px;width:100%;"></div>
        <!-- Modal -->
        <div class="modal fade" id="localmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">Close</span></button>
                    </div>
                    <div class="modal-body">
                        

                    </div>
                </div>
            </div>
        </div>
        <div class="text-danger">{!! $errors->first($name) ? "<i class='fa fa-info-circle'></i> " . $errors->first($name) : '' !!}</div>
        <p class='help-block'>{{ @$form['help'] }}</p>
    </div>
</div>
