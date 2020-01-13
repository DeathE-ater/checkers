@extends('layouts.app')

@section('content')
    @include('sidebar')
    <div class="w3-main" style="margin-left:300px;margin-top:43px;">
        <div class="w3-panel payments-tab w3-white w3-card-4" style="padding: 45px 40px; margin: 20px 15px;">
            <div class="w3-row-padding" style="margin:0 -16px">
                <table id="table_id" class="w3-table w3-striped w3-bordered w3-border w3-hoverable w3-card-4 w3-white">
                    <thead>
                    <tr>
                        <th>Payment ID</th>
                        <th>Payment Method</th>
                        <th>Amount</th>
                        <th>Time</th>
                        <th>Date</th>
                        <th>Status</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($payments as $payment)
                            <tr>
                                <td>{{ $payment->payment_id }}</td>
                                <td>{{ $payment->payment_method }}</td>
                                <td>{{ $payment->amount }}</td>
                                <td>{{ date("g:i a", strtotime($payment->payment_time)) }}</td>
                                <td>{{ $payment->payment_date }}</td>
                                <td class="{{$payment->status == 'A' ? 'amount-processed' : ''}}">{{ $payment->status == 'L' ? 'Logged': ($payment->status == 'A' ? 'Approved' : '')}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <hr>
        <!-- Footer -->
        @include('footer')
        <!-- End page content -->
    </div>
@endsection
