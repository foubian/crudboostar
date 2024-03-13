@php
      $convention = DB::table('abo_convention')
      ->join('abo_entreprise', 'abo_entreprise.id', '=', 'abo_convention.idcompany')
      ->select('abo_convention.*','abo_entreprise.dinomination')
      ->where('abo_convention.id',$value)->first();
@endphp
<div class="box box-primary">
    <div class="box-body box-profile">
        <h3 class="profile-username text-center"> 
            <span class="fa-stack fa-2x">
                <i class="fa fa-circle fa-stack-2x" style="color: LightGreen"></i>
                <i class="fa-regular fa-file-pdf fa-stack-1x"></i>
              </span>
        </h3>

        <h3 class="profile-username text-center"><i class="fa-solid fa-triangle-exclamation" style="color: {{ $form['msgcolor'] }}"></i></h3>
        <p class="text-muted text-center"  style="color: {{ $form['msgcolor'] }}">{{ $form['message'] }}</p>
        <ul class="list-group list-group-unbordered">
            <li class="list-group-item">
                <b>Entreprise</b> <a class="pull-right">{{  $convention->dinomination  }}</a>
            </li>
            <li class="list-group-item">
                <b>Représentée par</b> <a class="pull-right">{{  $convention->representant  }}</a>
            </li>
            <li class="list-group-item">
                <b>En qualité de</b> <a class="pull-right">{{  $convention->qualite_rep  }}</a>
            </li>
        </ul>
    </div>

</div>
