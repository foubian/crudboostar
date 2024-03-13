@php
    $cid = g('parent_id');
    $provinz = DB::table('comunz')
        ->where('id', '=', $cid)
        ->first();
    $communs = DB::table('comunz')
        ->where('com_parent', '=', $cid)
        ->get();
    // dd($communs->pluck('id')->toArray());

    $elus = DB::table('cms_users')
        ->whereIn('jama3a', $communs->pluck('id'))
        ->get();
    $elusformed = DB::table('g4mod_details')
        ->whereIn('g4mod_pers_id', $elus->pluck('id'))
        ->get();
    if ($provinz->type_com == 2) {
        $prolabel = 'Province';
    } elseif ($provinz->type_com == 3) {
        $prolabel = 'Préfecture';
    }

@endphp
<div class="row ">
    <div class="col-sm-12">
        <div class="box box-widget widget-user">

            <div class="widget-user-header bg-aqua-active">
                <div class="row">
                    <div class="col-sm-4 border-right">
                        <div class="description-block">
                            <h5 class="description-header">
                                <i class="fa-solid fa-landmark"></i>
                            </h5>
                            <span class="description-header">{{ $communs->count() }}  {{ __('region.commun') }}</span>
                        </div>
                    </div>

                    <div class="col-sm-4 ">
                        <div class="description-block" style="margin: 2px 0;">
                            <h5 class="description-header">{{ $prolabel }} {{ $provinz->lat_name }}</h5>
                            <span class="description-header isarab">{{ $provinz->ar_smiya }}</span>
                        </div>

                    </div>

                    <div class="col-sm-4 border-{{ Cblang('left') }}">
                        <div class="description-block">
                            <span class="description-header">
                                <i class="fa-solid fa-venus" style="color: #bb2f8d;"></i> {{ __('region.femme') }} :
                                {{ $elus->where('gender', 0)->count() }}
                            </span>
                        </div>
                        <div class="description-block">
                            <span class="description-header">
                                <i class="fa-solid fa-mars" style="color: #1a5fb4;"></i> {{ __('region.homme') }} :
                                {{ $elus->where('gender', 1)->count() }}
                            </span>
                        </div>

                    </div>

                </div>
            </div>

            <div class="widget-user-image">
                <div class="hex" style="width: 88px;height: 94px;background:white;">
                    <div class="hex-background" style="width: 81px;height: 88px; ">

                        <img  src="{{ asset($provinz->com_logo) }}"
                        alt="User Avatar">
                    </div>
                </div>
               
            </div>
            <div class="box-footer ">
                <div class="row ">
                    <div class="col-sm-4 border-right">
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

                    <div class="col-sm-4 border-left">
                        <div class="description-block  ">
                            <h5 class="description-header ">
                                <i class="fa-solid fa-user-graduate" style="color: #26a269;"></i>
                                {{ __('region.present') }} :
                                {{ $elusformed->where('is_abs', 0)->count() }}
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
