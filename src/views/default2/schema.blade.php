@php
    $cid = g('parent_id');
    $schemainfo = DB::table('schdirecteur')
        ->where('schdirecteur.id', '=', $cid)
        ->first();
    $modules = DB::table('modules')
        ->join('cedules', 'cedules.id', '=', 'modules.id_cedule')
        ->where('cedules.id', '=', $cid)
        ->select('modules.id')
        ->get();
        $groupes = DB::table('g4modulze')
        ->join('mod4stationz', 'mod4stationz.id', '=', 'g4modulze.mod_stat_id')
        ->whereIn('mod4stationz.mod4stat', $modules->pluck('id'))
        ->count();
@endphp
<div class="row ">
    <div class="col-sm-12">
        <div class="box box-widget widget-user">

            <div class="widget-user-header bg-green">
                <div class="row">
                    <div class="col-sm-4 border-{{ Cblang('right') }}">
                        <div class="description-block">
                            <span class="description-header">
                                <i class="fa fa-users-line"></i>
                                {{ __('region.nombre') }} {{ __('region.groupe') }}
                            </span>
                        </div>
                        <div class="description-block">
                            <span class="description-header">
                                {{ $groupes }}
                            </span>
                        </div>
                    </div>

                    <div class="col-sm-4 ">
                        <div class="description-block" style="margin: 2px 0;">
                            <h5 class="description-header"> 
                                Cédules du Schemas
                            </h5>
                        </div>

                    </div>

                    <div class="col-sm-4 border-{{ Cblang('left') }}">
                        <div class="description-block">
                            <span class="description-header">
                                <i class="fa-solid fa-cubes-stacked"></i>
                                {{ __('region.nombre') }} {{ __('region.modules') }}
                            </span>
                        </div>
                        <div class="description-block">
                            <span class="description-header">
                                {{ $modules->count() }}
                            </span>
                        </div>
                    </div>

                </div>
            </div>
            <div class="widget-user-image">
                <div class="hex" style="width: 88px;height: 94px;background:rgb(239, 239, 241);">
                    <div class="hex-background" style="width: 85px;height: 88px; ">
                        <a class="iconhex spin-icon">

                            <i class="fa fa-folder-tree  fa-3x" style="color: #00a65a;"></i>
                        </a>
                    </div>
                </div>
               
            </div>

            <div class="box-footer ">
                <div class="row ">
                    <div class="col-sm-4 border-{{ Cblang('right') }}">
                        <div class="description-block">
                            <h5 class="description-header ">
                                <span class="description-text ">
                                    {{ $schemainfo->description }}
                                </span>
                            </h5>
                        </div>

                    </div>
                    <div class="col-sm-4">
                        <div class="description-block">
                            <h5 class="description-header">
                                {{ $schemainfo->cod_ced }}
                            </h5>
                        </div>

                    </div>

                    <div class="col-sm-4 border-{{ Cblang('left') }}">
                        <div class="description-block  ">
                            <h5 class="description-text isarab">
                                {{ $schemainfo->description }}
                            </h5>

                        </div>

                    </div>

                </div>

            </div>
        </div>
    </div>
</div>