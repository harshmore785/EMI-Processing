<x-layout>
<div class="container">
    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show w-100" role="alert">
        <strong>{{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    @if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show w-100" role="alert">
        <strong>{{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif


    <h1>EMI Details</h1>
    <form method="POST" action="{{ route('emi-details.process') }}">
        @csrf
        <button type="submit" class="btn btn-primary">Process Data</button>
    </form>

    @if(count($emiDetails) > 0)
    <div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th>Sr. No.</th>
                <th>Client ID</th>
                @foreach($emiDetails[0] as $key=> $column)
                    @if($key != 'clientid')
                    <th>{{ $key }}</th>
                    @endif
                @endforeach
            </tr>
        </thead>
        <tbody>
            @foreach($emiDetails as $emiDetail)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $emiDetail->clientid }}</td>
                @foreach($emiDetail as $key=> $column)
                    @if($key != 'clientid')
                    <td>{{ $emiDetail->$key }}</td>
                    @endif
                @endforeach
            </tr>
            @endforeach
        </tbody>
    </table>
    </div>
    @endif
</div>
</x-layout>
