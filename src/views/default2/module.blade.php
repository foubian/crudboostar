@php
    $mid = g('mid');
    $modz = DB::table('modules')
        ->where('id', $mid)
        ->first();
    $station = DB::table('mod4stationz')
        ->where('mod4stat', $modz->id)
        ->get();
    $grps = DB::table('g4modulze')
        ->whereIn('mod_stat_id', $station->pluck('id'))
        ->get();

    $elusformed = DB::table('g4mod_details')
        ->whereIn('modstat_id', $station->pluck('id'))
        //->groupBy('g4mod_pers_id','is_abs')
        ->get();
@endphp
<div class="row ">
    <div class="col-sm-12">
        <div class="box box-widget widget-user">

            <div class="widget-user-header bg-aqua-active">
                <div class="row">
                    <div class="col-sm-4 border-{{ Cblang('right') }}" >
                        <div class="description-block" style="height: 70px;">
                            <span class="description-header ">
                                {{ $modz->title_mod }}
                            </span>
                        </div>
                    </div>

                    <div class="col-sm-4 ">
                        <div class="description-block" style="margin: 2px 0;">
                            <h5 class="description-header">{{ $modz->cod_mod }}</h5>
                        </div>

                    </div>

                    <div class="col-sm-4 border-{{ Cblang('left') }}">
                        <div class="description-block" style="height: 70px;">
                            <span class="description-header isarab">
                                {{ $modz->title_mod_ar }}
                            </span>
                            <br />
                        </div>

                    </div>

                </div>
            </div>

            <div class="widget-user-image">
                <div class="hex" style="width: 88px;height: 94px;background:white;">
                    <div class="hex-background" style="width: 81px;height: 88px; ">
                        <a class="iconhex spin-icon">
                        <i class="fa fa-users-rectangle  fa-3x" style="color: #3c8dbc;"></i>
                        </a>
                    </div>
                </div>
                
            </div>
            <div class="box-footer ">
                <div class="row ">
                    <div class="col-sm-4 border-{{ Cblang('right') }}">
                        <div class="description-block">
                            <h5 class="description-header">
                                <i class="fa fa-chalkboard-user" style="color:#3c8dbc;"></i> Nbr Station:
                                {{ $station->count() }}
                            </h5>
                        </div>
                        <div class="description-block">
                            <h5 class="description-header">
                                <i class="fa fa-users-line" style="color:#605ca8;"></i> Nbr Groupes:
                                {{ $grps->count() }}
                            </h5>
                        </div>

                    </div>
                    <div class="col-sm-4">
                        <div class="description-block">
                            <h5 class="description-header"> {{ $elusformed->count() }}</h5>
                            <span class="description-text">Élus</span>
                        </div>

                    </div>

                    <div class="col-sm-4 border-{{ Cblang('left') }}">
                        <div class="description-block  ">
                            <h5 class="description-header ">
                                <i class="fa-solid fa-user-graduate" style="color: #26a269;"></i>
                                Présence :
                                {{ $elusformed->where('is_abs', 0)->count() }}
                                <span class="description-header ">
                                    <i class="fa-solid fa-user-xmark" style="color: #c01c28;"></i>
                                    Absence :
                                    {{ $elusformed->where('is_abs', 1)->count() }}
                                </span>
                            </h5>

                        </div>
                        <div class="description-block  ">

                            <h5 class="description-header ">
                                <span class="description-header ">
                                    <i class="fa-solid fa-user-slash" style="color: #e5a50a;"></i>
                                    Non Convocation :
                                    {{ $elusformed->where('is_abs', 10)->count() }}
                                </span>
                            </h5>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>
