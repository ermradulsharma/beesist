<table>
    <thead>
    <tr>
        <th>ID</th>
        <th>USER ID</th>
        <th>FORM STEP</th>
        <th>#OWNERS</th>
        <th>#OWNER PRESENCE</th>
        <th>FIRST NAME</th>
        <th>LAST NAME</th>
        <th>EMAIL</th>
        <th>OWNER 2 EMAIL</th>
        <th>PHONE</th>
        <th>OWNER OFFICE ADDRESS</th>
        <th>OWNER RESIDENCE</th>
        <th>PROPERTY ADDRESS</th>
        <th>RESIDENT OF CANADA</th>
        <th>OWNER HOLDS PROPERTY ADDRESS</th>
        <th>FURNISHING FEE</th>
        <th>PRINTED OWNER NAME</th>
        <th>OWNER SIGN DATE</th>
        <th>PRINTED OWNER 2 NAME</th>
        <th>OWNER 2 SIGN DATE</th>
        <th>PRINTED AGENT NAME</th>
        <th>AGENT SIGN DATE</th>
        <th>EFFECTIVE PMA DATE</th>
        <th>BIGINING DATE</th>
        <th>AGREEMENT TYPE</th>
        <th>IP</th>
        <th>PMA STATUS</th>
        <th>CREATED DATE</th>
        <th>UPDATED DATE</th>
    </tr>
    </thead>
    <tbody>
    @foreach($pma_forms as $pma_form)
        <tr>
            <td>{{ $pma_form->id }}</td>
            <td>{{ $pma_form->user_id }}</td>
            <td>{{ $pma_form->form_step }}</td>
            <td>{{ $pma_form->number_owners }}</td>
            <td>{{ $pma_form->owner_presense }}</td>
            <td>{{ $pma_form->first_name }}</td>
            <td>{{ $pma_form->last_name }}</td>
            <td>{{ $pma_form->email }}</td>
            <td>{{ $pma_form->owner2_email }}</td>
            <td>{{ $pma_form->phone }}</td>
            <td>{{ $pma_form->owner_office_address }}</td>
            @php $own_res = json_decode($pma_form->owner_residence); @endphp
            <td>{{ 'Unit Number: '.$own_res->unit_no }} | {{ 'St. Address: '.$own_res->st }} | {{ 'City: '.$own_res->city }} | {{ 'State: '.$own_res->state }} | {{ 'Zip Code: '.$own_res->zip }} | {{ 'Country: '.$own_res->country }}</td>
            @php $prop_add = json_decode($pma_form->property_address); @endphp
            <td>{{ 'Unit Number: '.$prop_add->unit_no }} | {{ 'St. Address: '.$prop_add->st }} | {{ 'City: '.$prop_add->city }} | {{ 'State: '.$prop_add->state }} | {{ 'Zip Code: '.$prop_add->zip }} | {{ 'Country: '.$prop_add->country }}</td>
            <td>{{ $pma_form->residents_of_canada }}</td>
            <td>{{ $pma_form->owner_holds_property_address }}</td>
            <td>{{ $pma_form->furnishing_fee }}</td>
            <td>{{ $pma_form->printed_owner_name }}</td>
            <td>{{ $pma_form->owner_sign_date }}</td>
            <td>{{ $pma_form->printed_owner2_name }}</td>
            <td>{{ $pma_form->owner2_sign_date }}</td>
            <td>{{ $pma_form->printed_agent_name }}</td>
            <td>{{ $pma_form->agent_sign_date }}</td>
            <td>{{ $pma_form->effective_pma_date }}</td>
            <td>{{ $pma_form->bigining_date }}</td>
            <td>{{ $pma_form->agreement_type }}</td>
            <td>{{ $pma_form->ip }}</td>
            <td>{{ $pma_form->pma_status }}</td>
            <td>{{ $pma_form->created_at }}</td>
            <td>{{ $pma_form->updated_at }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
