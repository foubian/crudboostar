@php
    $cid = g('parent_id');
    $cedinfo = DB::table('cedules')
        ->where('cedules.id', '=', $cid)
        ->select('cedules.cod_ced', 'cedules.name_ced')
        ->first();
    $gropz = DB::table('modules')
        ->join('cedules', 'cedules.id', '=', 'modules.id_cedule')
        ->where('cedules.id', '=', $cid)
        ->select('modules.id')
        ->get();
@endphp
<div class="row">
    <div class="col-sm-12">
        <div id="card" class="weater">
            <div class="bg-green">
                <article>
                    <div class="info">
                        <div class="city">
                            <span>
                                <i class="fa-solid fa-qrcode"></i>
                                &nbsp;Code Cédule :
                            </span>
                            <label style="font-weight:300" class="text-right"> {{ $cedinfo->cod_ced }}</label>

                        </div>
                        <div class="city">
                            <span>
                                <i class="fa fa-layer-group"></i>
                                &nbsp;Nom Cédule:
                            </span>
                            <label style="font-weight:300" class="text-right"> {{ $cedinfo->name_ced }}</label>

                        </div>
                        <div class="city">
                            <span>
                                <i class="fa-solid fa-list-ol"></i>
                                &nbsp;Nombre Module :
                            </span>
                            <label style="font-weight:300" class="text-right"> {{ count($gropz) }}</label>

                        </div>

                    </div>

                    <div class="icon">
                        <i class="fas fa-layer-group  fa-5x"></i>
                    </div>

                </article>

            </div>

        </div>
    </div>
</div>
