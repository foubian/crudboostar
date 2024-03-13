@php
    $cid = g('parent_id');
    $titre = DB::table('tabtitre')
        ->where('id', '=', $cid)
        ->first();
    //dd($comz->categori_com);
    $elus = DB::table('cms_users')
        ->select('id', 'gender')
        ->where('id_cms_privileges', $titre->id)
        ->get();
    $elusformed = DB::table('g4mod_details')
        ->whereIn('g4mod_pers_id', $elus->pluck('id'))
        ->get();
@endphp
<div class="row ">
    <div class="col-sm-12">
        <div class="box box-widget widget-user">
            <div class="widget-user-header bg-aqua-active">
                <div class="row">
                    <div class="col-sm-4 border-{{  Cblang('right')}}">
                        <div class="description-block">
                            <span class="description-header isarab">
                                <i class="fa-solid fa-user-tie"></i>  {{ __('region.total') }}  :
                            </span>
                        </div>
                        <div class="description-block">
                            <span class="description-header">
                                {{ $elus->count() }}
                            </span>
                        </div>
                    </div>
                    <div class="col-sm-4 ">
                        <div class="description-block" style="margin: 2px 0;">
                            <h5 class="description-header"> Titre: {{ $titre->name_titre }}</h5>
                            <span class="description-header isarab"> فئة : {{ $titre->name_ar_titre }}</span>
                        </div>
                    </div>
                    <div class="col-sm-4 border-{{  Cblang('left')}}">
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
                <div class="hex" style="width: 85px;height: 94px;background:white;">
                    <div class="hex-background" style="width: 81px;height: 90px; ">

                        <img src="{{ asset($titre->logotitre) }}"
                        alt="User Avatar">
                    </div>
                </div>
               
            </div>
            <div class="box-footer ">
                <div class="row ">
                    <div class="col-sm-4 border-{{  Cblang('right')}}">
                        <div class="description-block  ">
                        </div>
                    </div>
                    <div class="col-sm-4 border-{{  Cblang('left')}}">
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
                            <h5 class="description-header">
                                <i class="fa-solid fa-user-slash" style="color: #e5a50a;"></i>
                                {{ __('region.nnconvoque') }}:
                                {{ $elusformed->where('is_abs', 10)->count() }}
                            </h5>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="description-block">
                            <h5 class="description-header"></h5>
                            <span class="description-text"></span>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>