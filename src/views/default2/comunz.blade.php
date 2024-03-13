@php
    $cid = g('parent_id');
    $comz = DB::table('comunz')
        ->where('id', '=', $cid)
        ->first();
    //dd($comz->categori_com);
    $elus = DB::table('cms_users')
        ->select('id', 'gender', 'name', 'tlfon', 'id_cms_privileges')
        ->where('jama3a', $comz->id)
        ->get();
    $elusformed = DB::table('g4mod_details')
        ->whereIn('g4mod_pers_id', $elus->pluck('id'))
        //->groupBy('g4mod_pers_id','is_abs')
        ->get();
    // dd( $elusformed);

    if (is_null($comz->categori_com)) {
        if ($comz->type_com == 3) {
            $cotype = 'prefecture';
        } elseif ($comz->type_com == 2) {
            $cotype = 'province';
        } elseif ($comz->type_com == 1) {
            $cotype = 'region';
        } else {
            $cotype = '';
        }
        $catikon = 'city';
        $catcolor = 'Indigo';
    } else {
        if ($comz->type_com == 4) {
            $cotype = 'khawi';
        }
        if ($comz->categori_com == 1) {
            $catikon = 'city';
            $catcom = 'Urbaine';
            $catcolor = 'Indigo';
        } elseif ($comz->categori_com == 0) {
            $catikon = 'mountain-city';
            $catcom = 'Rurale';
            $catcolor = 'DarkSalmon';
        }
    }
@endphp
<div class="row ">
    <div class="col-sm-12">
        <div class="box box-widget widget-user">

            <div class="widget-user-header bg-aqua-active">
                <div class="row">
                    <div class="col-sm-4 border-{{ Cblang('right') }}">
                        <div class="description-block">
                            <h5 class="description-header"> <i class="fa-solid fa-user-tie"></i>
                                {{ __('region.president') }} :
                                {{ $elus->where('id_cms_privileges', 101)[0]->name }}</h5>
                                
                            <span class="description-header" style = "direction:ltr;"><i class="fa-solid fa-phone"></i>
                                {{ __('region.phone') }} :
                                <div>{{ $elus->where('id_cms_privileges', 101)[0]->tlfon }}</div>
                            </span>
                        </div>


                    </div>

                    <div class="col-sm-4 ">
                        <div class="description-block" style="margin: 2px 0;">
                            <h5 class="description-header"> {{ Cblang($cotype) }} {{ $comz->lat_name }}</h5>
                            <span class="description-header isarab">{{ $comz->ar_smiya }} </span>
                        </div>

                    </div>

                    <div class="col-sm-4 border-{{ Cblang('left') }}">
                        <div class="description-block">
                            <span class="description-header">
                                <i class="fa-solid fa-venus" style="color: #bb2f8d;"></i> {{ __('region.femme') }} :
                                {{ $elus->where('gender', 1)->count() }}

                            </span>
                        </div>
                        <div class="description-block">
                            <span class="description-header">
                                <i class="fa-solid fa-mars" style="color: #1a5fb4;"></i> {{ __('region.homme') }} :
                                {{ $elus->where('gender', 0)->count() }}
                            </span>
                        </div>

                    </div>

                </div>
            </div>

            <div class="widget-user-image">
                <div class="hex" style="width: 88px;height: 94px;background:white;">
                    <div class="hex-background" style="width: 81px;height: 88px; ">

                            <img  src="{{ asset($comz->com_logo) }}"
                    alt="User Avatar">
                    </div>
                </div>
                
            </div>
            <div class="box-footer ">
                <div class="row ">
                    <div class="col-sm-4 border-{{ Cblang('right') }}">
                        <div class="description-block">
                            <h5 class="description-header ">
                                <span class="description-header ">
                                    <i class="fa-solid fa-user-slash" style="color: #e5a50a;"></i>
                                    {{ __('region.nnconvoque') }}:
                                    {{ $elusformed->where('is_abs', 10)->count() }}
                                </span>
                            </h5>
                        </div>

                    </div>
                    <div class="col-sm-4">
                        <div class="description-block">
                            <h5 class="description-header"> {{ $elus->count() }}</h5>
                            <span class="description-text">{{ __('region.elus') }}</span>
                        </div>

                    </div>

                    <div class="col-sm-4 border-{{ Cblang('left') }}">
                        <div class="description-block  ">
                            <h5 class="description-header ">
                                <i class="fa-solid fa-user-graduate" style="color: #26a269;"></i>
                                {{ __('region.present') }} :
                                {{ $elusformed->where('is_abs', 0)->count() }}
                                |
                                <span class="description-header ">
                                    <i class="fa-solid fa-user-xmark" style="color: #c01c28;"></i>
                                    {{ __('region.absent') }} :
                                    {{ $elusformed->where('is_abs', 1)->count() }}
                                </span>
                            </h5>

                        </div>

                    </div>

                </div>

            </div>
        </div>
    </div>
</div>
