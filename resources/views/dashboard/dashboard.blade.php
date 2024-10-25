<x-layout>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Loan Details</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordred">
                            <thead>
                                <tr>
                                    <th>Sr No.</th>
                                    <th>Clientid</th>
                                    <th>Num of Payment</th>
                                    <th>First Payment Date</th>
                                    <th>Last Payment Date</th>
                                    <th>Loan Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($loanDetails as $loanDetail)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $loanDetail->clientid }}</td>
                                        <td>{{ $loanDetail->num_of_payment }}</td>
                                        <td>{{ $loanDetail->first_payment_date }}</td>
                                        <td>{{ $loanDetail->last_payment_date }}</td>
                                        <td>{{ $loanDetail->loan_amount }}</td>
                                    </tr>
                                @empty
                                    <tr align="center">
                                        <td colspan="6">No Data Found</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</x-layout>