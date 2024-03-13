@php
    $cid = g('parent_id');
    $modlz = DB::table('mod4stationz')
        ->join('stazions', 'stazions.id', '=', 'mod4stationz.stasionzmod')
        ->join('comunz', 'stazions.provinz', '=', 'comunz.id')
        ->join('modules', 'modules.id', '=', 'mod4stationz.mod4stat')
        ->where('mod4stationz.id', '=', $cid)
        ->select('stazions.code_stas', 'modules.title_mod', 'mod4stationz.nbr_grp', 'comunz.lat_name')
        ->first();
    $total = $result->total();
@endphp
<div class="row">
    <div class="col-sm-12">
        <div id="card" class="weater">
            <div class="bg-purple">
                <article>
                    <div class="info">
                        <div class="city">
                            <span>
                                <i class="fa-solid fa-qrcode"></i>
                                @if (in_array(App::getLocale(), ['ar', 'fa']))
                                    &nbsp;كود المحطة :
                                @else
                                    &nbsp;Code Station :
                                @endif
                            </span>
                            {{ $modlz->code_stas }}
                        </div>

                        <div class="city">
                            <span>
                                <i class="fas fa-map-marker-alt"></i>
                                @if (in_array(App::getLocale(), ['ar', 'fa']))
                                    &nbsp;عمالة-إقليم:
                                @else
                                    &nbsp;Province/Préfecture :
                                @endif
                            </span>

                            {{ $modlz->lat_name }}
                        </div>
                        <div class="city" style="max-width: 700px;">
                            <span>
                                <i class="fa-solid fa-cubes-stacked"></i>
                                @if (in_array(App::getLocale(), ['ar', 'fa']))
                                    &nbsp;وحدة :
                                @else
                                    &nbsp;Module :
                                @endif

                            </span>

                            {{ $modlz->title_mod }}
                        </div>
                    </div>
                    <div class="info">
                        <div class="city">
                            <span>
                                <i class="fa-solid fa-calendar-days fa-flip" style="color: #2ec27e;"></i>
                                @if (in_array(App::getLocale(), ['ar', 'fa']))
                                    &nbsp;تاريخ البدء :
                                @else
                                    &nbsp;Date Début :
                                @endif
                            </span>
                            {{ $modlz->code_stas }}
                        </div>

                        <div class="city">
                            <span>
                                <i class="fa-regular fa-calendar fa-shake" style="color: #e01b24;"></i>
                                @if (in_array(App::getLocale(), ['ar', 'fa']))
                                    &nbsp;تاريخ النهاية:
                                @else
                                    &nbsp;Date Fin :
                                @endif
                            </span>

                            {{ $modlz->lat_name }}
                        </div>
                        <div class="city">
                            <span>
                                <i class="fa-solid fa-list-ol" style="color: #ff7800;"></i>
                                @if (in_array(App::getLocale(), ['ar', 'fa']))
                                    &nbsp;عدد المجموعات :
                                @else
                                    &nbsp;Nombre Groupe :
                                @endif
                            </span>

                            {{ $total }}/{{ $modlz->nbr_grp }}
                        </div>
                    </div>

                    <div class="icon">
                        <i class="fa-solid fa-cubes-stacked  fa-5x"></i>
                    </div>

                </article>

            </div>

        </div>
    </div>
</div>
