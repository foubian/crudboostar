<div class='form-group {{ $header_group_class }} {{ $errors->first($name) ? 'has-error' : '' }}'
    id='form-group-{{ $name }}' style="{{ @$form['style'] }}">
    <label class='col-sm-2 control-label'>
        @if (in_array(App::getLocale(), ['ar', 'fa']))
            {{ $form['label_ar'] }}
        @elseif (in_array(App::getLocale(), ['en', 'fr']))
            {{ $form['label'] }}
        @endif

        @if ($required)
            <span class='text-danger' title='{!! cbLang(' this_field_is_required') !!}'>*</span>
        @endif
    </label>

    <div class="{{ $col_width ?: 'col-sm-10' }}">
        @if ($value)
            <div class="imgup">
                <?php
            if(Storage::exists($value) || file_exists($value)):
            $url = asset($value);
            $fileurl = asset('uploads/fileupload.jpg');
            $ext = pathinfo($url, PATHINFO_EXTENSION);
            $images_type = array('jpg', 'png', 'gif', 'jpeg', 'bmp', 'tiff');
            if(in_array(strtolower($ext), $images_type)):
            ?>
                <img style='max-width:160px' class="main-profile-img" title="Image For {{ $form['label'] }}"
                    src='{{ $url }}' />
                <?php else:?>
                <p><a href='{{ $url }}'> <img style='max-width:160px' class="main-profile-img" title="Image For {{ $form['label'] }}"
                    src='{{ $fileurl }}' /></a></p>
                <?php endif;
            echo "<input type='hidden' name='_$name' value='$value'/>";
            else:
                echo "<p class='text-danger'><i class='fa fa-exclamation-triangle'></i> ".cbLang("file_broken")."</p>";
            endif;
            ?>
                @if (!$readonly || !$disabled)
                    <a onclick="if(!confirm('{{ cbLang('delete_title_confirm') }}')) return false"
                        href='{{ url(CRUDBooster::mainpath('delete-image?image=' . $value . '&id=' . $row->id . '&column=' . $name)) }}'><i
                            class="fa-solid fa-trash-can"></i> </a>
                @endif
        @endif
    </div>
    @if (!$value)
        <input type='file' id="{{ $name }}" title="{{ $form['label'] }}" {{ $required }}
            {{ $readonly }} {{ $disabled }} name="{{ $name }}" />
        <p class='help-block'>{{ @$form['help'] }}</p>
    @else
    @endif
    <div class="text-danger">{!! $errors->first($name) ? "<i class='fa fa-info-circle'></i> " . $errors->first($name) : '' !!}</div>

</div>

</div>
