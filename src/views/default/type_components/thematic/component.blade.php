@php
    $convention = DB::table('abo_convention')->join('abo_entreprise', 'abo_entreprise.id', '=', 'abo_convention.idcompany')->select('abo_convention.*', 'abo_entreprise.*')->where('abo_convention.id', $id)->first();

@endphp

<div class='form-group {{ $header_group_class }}' id='form-group-{{ $name }}' style="{{ @$form['style'] }}">
    <label class='control-label col-sm-2'>
        {{ $form['label'] }} :
    </label>
    <div class="{{ $col_width ?: 'col-sm-10' }}">
        <ul class="list-group list-group-unbordered">
            <li class="list-group-item">
                <strong><i class="fa-solid fa-keyboard" style="color: SteelBlue;"></i> Sujet :</strong>
                @if ($convention->thematic == '')
                    <a class="pull-right btn btn-xs spin-icon btn-danger outline">
                        <span>Non saisie</span>
                    </a>
                @else
                    <a class="pull-right btn btn-xs spin-icon btn-primary outline">
                        <span> {{ $convention->thematic }} </span>
                    </a>
                @endif

            </li>
            <li class="list-group-item">
                <strong><i class="fa-solid fa-city" style="color: MediumSeaGreen;"></i> Nom Tuteur :</strong>
                @if ($convention->nomtuteur == '')
                    <a class="pull-right btn btn-xs spin-icon btn-danger outline">
                        <span>Non saisie</span>
                    </a>
                @else
                    <a class="pull-right btn btn-xs spin-icon btn-primary outline">
                        <span> {{ $convention->nomtuteur }} </span>
                    </a>
                @endif

            </li>
            <li class="list-group-item">
                <strong><i class="fa-solid fa-phone" style="color: OrangeRed;"></i> Téléphone Tuteur:</strong>
                @if ($convention->phonetuteur == '')
                    <a class="pull-right btn btn-xs spin-icon btn-danger outline">
                        <span>Non saisie</span>
                    </a>
                @else
                    <a class="pull-right btn btn-xs spin-icon btn-success outline">
                        <span id="cp_phone">{{ $convention->phonetuteur }}</span>
                        <button onclick="copyMe('cp_phone','Phone')" type="button"><i class="fa-solid fa-copy" style="color: #5e5c64;"></i></button>
                    </a>
                @endif

            </li>
            <li class="list-group-item">
                <strong><i class="fa-solid fa-gears" style="color: MediumOrchid;"></i> E-mail Tuteur:</strong>
                @if ($convention->mailtuteur == '')
                    <a class="pull-right btn btn-xs spin-icon btn-danger outline">
                        <span>Non saisie</span>
                    </a>
                @else
                    <a class="pull-right btn btn-xs spin-icon btn-success outline">
                        <span>{{ $convention->mailtuteur }}</span>
                        <button onclick="copyMe('cp_phone','Phone')" type="button"><i class="fa-solid fa-copy" style="color: #5e5c64;"></i></button>
                    </a>
                @endif

            </li>

        </ul>
    </div>
</div>
