@php
    $cid = g('parent_id');
    $station = DB::table('stazions')
        ->join('comunz', 'stazions.provinz', '=', 'comunz.id')
        ->where('stazions.id', '=', $cid)
        ->select('stazions.*', 'comunz.lat_name')
        ->first();
@endphp
<div class="row">
    <div class="col-sm-12">
        <div id="card" class="weater">
            <div class="bg-light-blue">
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
                            {{ $station->code_stas }}
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

                            {{ $station->lat_name }}
                        </div>
                        <div class="city" style="max-width: 700px;">
                            <span>
                                <i class="fas fa-map-marker-alt"></i>
                                @if (in_array(App::getLocale(), ['ar', 'fa']))
                                    &nbsp;المحطة :
                                @else
                                    &nbsp;Module :
                                @endif
                            </span>

                            {{ $station->staz_desc }}
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
                            {{ $station->started_at }}
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

                            {{ $station->ended_at }}
                        </div>
                        <div class="city">
                            <span>
                                <i class="fa-solid fa-list-ol" style="color: #ff7800;"></i>
                                @if (in_array(App::getLocale(), ['ar', 'fa']))
                                    &nbsp;عدد الوحدات :
                                @else
                                    &nbsp;Nombre Module :
                                @endif
                            </span>
                            @php
                                $nbrmod = DB::table('mod4stationz')
                                    ->where('stasionzmod', g('parent_id'))
                                    ->count();
                            @endphp

                            {{ $nbrmod }}
                            @if (in_array(App::getLocale(), ['ar', 'fa']))
                                <strong>وحدات</strong>
                            @else
                                <strong>Modules</strong>
                            @endif
                        </div>
                    </div>

                    <div class="icon">
                        <i class="fa-solid fa-chalkboard-user fa-5x"></i>
                    </div>

                </article>

            </div>

        </div>
    </div>
</div>
