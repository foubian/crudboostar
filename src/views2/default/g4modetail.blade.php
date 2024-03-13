@php
    $cid = g('parent_id');
    $gropz = DB::table('g4modulze')
        ->join('mod4stationz', 'mod4stationz.id', '=', 'g4modulze.mod_stat_id')
        ->join('stazions', 'stazions.id', '=', 'mod4stationz.stasionzmod')
        ->join('comunz', 'stazions.provinz', '=', 'comunz.id')
        ->join('modules', 'modules.id', '=', 'mod4stationz.mod4stat')
        ->where('g4modulze.id', '=', $cid)
        ->select('g4modulze.groub_code', 'stazions.code_stas', 'modules.title_mod', 'comunz.lat_name')
        ->first();
    $countabs = DB::table('g4mod_details')
        ->where('g4mod_id', '=', $cid)
        ->get();
@endphp
<div class="row">
    <div class="col-sm-12">
        <div id="card" class="weater">
            <div class="bg-navy">
                <article>
                    <div class="info">
                        <div class="city">
                            <span>
                                <i class="fa-solid fa-qrcode"></i>
                                @if (in_array(App::getLocale(), ['ar', 'fa']))
                                    &nbsp;كود المجموعة :
                                @else
                                    &nbsp;Code Groupe :
                                @endif
                            </span>
                            {{ $gropz->groub_code }}
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

                            {{ $gropz->title_mod }}
                        </div>
                        <div class="city">
                            <span>
                                <i class="fa-solid fa-qrcode"></i>
                                @if (in_array(App::getLocale(), ['ar', 'fa']))
                                    &nbsp;كود المحطة :
                                @else
                                    &nbsp;Code Station :
                                @endif
                            </span>
                            {{ $gropz->code_stas }}
                        </div>

                    </div>
                    <div class="info">
                        <div class="city">
                            <span>
                                <i class="fas fa-map-marker-alt"></i>
                                @if (in_array(App::getLocale(), ['ar', 'fa']))
                                    &nbsp;عمالة-إقليم:
                                @else
                                    &nbsp;Province/Préfecture :
                                @endif
                            </span>

                            {{ $gropz->lat_name }} {{ $countabs->where('is_abs', 0)->count() }}
                        </div>
                        <div class="city">
                            <span>
                                <i class="fa-solid fa-user-check" style="color: #33d17a;"></i>
                                @if (in_array(App::getLocale(), ['ar', 'fa']))
                                    &nbsp;الحاضرون:
                                @else
                                    &nbsp;Présents:
                                @endif
                            </span>

                            {{ $countabs->where('is_abs', 0)->count() }}
                        </div>

                        <div class="city">
                            <span>
                                <i class="fa-solid fa-user-slash" style="color: #c01c28;"></i>
                                @if (in_array(App::getLocale(), ['ar', 'fa']))
                                    &nbsp;الغائبون:
                                @else
                                    &nbsp;Absents :
                                @endif
                            </span>

                            {{ $countabs->where('is_abs', 1)->count() }}
                        </div>

                    </div>

                    <div class="icon">
                        <i class="fas fa-people-group fa-5x"></i>
                    </div>

                </article>

            </div>

        </div>
    </div>
</div>
