@if (session()->has('success'))
    @php
        $get = Session::get('success');
        if (!is_array($get)) {
            $get[] = $get;
        }
    @endphp
    @foreach ($get as $message)
        <div class="alert alert-success alert-block">
            <strong>{{ $message }}</strong>
        </div>
    @endforeach
@endif
