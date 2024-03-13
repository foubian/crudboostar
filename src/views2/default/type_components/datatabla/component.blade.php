    @php
        $totalmember = DB::table('g4mod_details')
            ->select('id')
            ->where('g4mod_id', $id)
            ->get();
        
        $commune = DB::table('mod4stationz')
            ->join('stazions', 'stazions.id', '=', 'mod4stationz.stasionzmod')
            ->select('stazions.*', 'mod4stationz.mod4stat')
            ->where('mod4stationz.id', g('parent_id'))
            ->first();
        
        $participants = DB::table('cms_users')
            ->join('comunz', 'cms_users.jama3a', '=', 'comunz.id')
            ->join('cms_privileges', 'cms_users.id_cms_privileges', '=', 'cms_privileges.id')
            ->select('cms_users.id', 'cms_users.name', 'comunz.lat_name as comname', 'cms_privileges.name as titro')
            ->where('comunz.com_parent', $commune->provinz)
            ->whereNotIn('cms_users.id', function ($query2) use ($id) {
                $query2
                    ->select('g4mod_pers_id')
                    ->from('g4mod_details')
                    ->where('g4mod_details.g4mod_id', '!=', $id)
                    ->whereIn('g4mod_details.g4mod_id', function ($query) {
                        $query
                            ->select('g4modulze.id')
                            ->from('g4modulze')
                            ->where('mod_stat_id', g('parent_id'));
                    });
            })
            ->get();
    @endphp

    <div class="col-sm-12">

        <table id="datamembres" class="table table-striped table-bordered" style="width:100%">

            <tfoot>
                <tr class="btn-primary">
                    <th>Nom</th>
                    <th>Titre</th>
                    <th>Commune</th>
                    <th>Select</th>
                    <th>Select</th>
                </tr>
            </tfoot>
            <thead>
                <tr class="btn-primary">
                    <th>Nom</th>
                    <th>Titre</th>
                    <th>Commune</th>
                    <th>
                        All : <input type="checkbox" id="all" />
                        Checked : <input type="checkbox" id="xked" />
                    </th>
                    <th>
                        <h4><strong class="users">{{ $totalmember->count() }} </strong> <i class="fa-solid fa-user-check" style="color: #33d17a;"></i></h4>
                    </th>

                </tr>
            </thead>

            <tbody>

                @foreach ($participants as $participant)
                    @php
                        
                        $ismember = DB::table('g4mod_details')
                            ->select('id')
                            ->where('g4mod_id', $id)
                            ->where('g4mod_pers_id', $participant->id)
                            ->exists();
                        if ($ismember) {
                            $xeked = 'checked';
                            $memb = $memb . ',' . $participant->id;
                        } else {
                            $xeked = '';
                        }
                        
                    @endphp

                    <tr>
                        <td>{{ $participant->name }}</td>
                        <td>{{ $participant->titro }}</td>
                        <td>{{ $participant->comname }}</td>
                        <td>
                            <input name="table-{{ $name }}" value="{{ $participant->id }}" id="{{ $name }}{{ $loop->index }}" type="checkbox" {{ $xeked }} />
                        </td>
                        <td></td>
                    </tr>
                @endforeach

            </tbody>

        </table>
        <input id="{{ $name }}" name="{{ $name }}" type="text" readonly="readonly" value="{{ $memb . ',' }}">
    </div>
