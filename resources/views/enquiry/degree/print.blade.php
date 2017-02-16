@extends('layouts.app')
@section('styles')
    <style type="text/css">
        body {
            font-size: 16px;
            color: #000;
        }

        #printable-enquiry {
            font-family: Tahoma, sans-serif;
        }

        table, tr, th, td {
            border-color: #000 !important;
        }
    </style>
@stop

@section('scripts')
    <script type="text/javascript">
        <!--
        window.onload = function () {
            window.print();
        }
        //-->
    </script>
@stop

@section('content')
    <div class="container" id="printable-enquiry">
        <table class="table table-bordered ">
            <tr>
                <th class="text-center" colspan="3">
                    <h4>Theem College of Engineering, Boisar</h4>
                </th>
            </tr>
            <tr>
                <td class="text-center" colspan="3">Personal Details</td>
            </tr>
            <tr>
                <td>Enquiry Date: {{ $enquiry->createdAt->toDateString() }}</td>
                <td> Status: {{ ucfirst($enquiry->status) }} </td>
                <td></td>
            </tr>
            <tr>
                <td colspan="2">Full Name: {{ $enquiry->name }}</td>
                <td> Residential Area: {{ ucwords($enquiry->residentialArea) }}</td>
            </tr>
            <tr>
                <td colspan="3">
                    Applied for {{ ucwords($enquiry->yearString) }} Year in {{ $enquiry->courses->implode('name',', ') }}
                </td>
            </tr>
            <tr>
                <td>Contact No: {{ $enquiry->contact_no }}</td>
                <td>Mobile No: {{ $enquiry->mobile_no }}</td>
                <td></td>
            </tr>
            <tr>
                <td class="text-center" colspan="3">Academic Details</td>
            </tr>
            <tr>
                <td>SSC Percentage: {{ number_format($enquiry->sscPercentage, 2) }}%</td>
                @if($enquiry->appliedForYear == 1)
                    <td>HSC Percentage: {{ number_format($enquiry->hscPercentage, 2) }}%</td>
                @endif
                @if($enquiry->appliedForYear == 2)
                    <td>Diploma Percentage: {{ number_format($enquiry->diplomaPercentage, 2) }}%</td>
                @endif
                <td></td>
            </tr>
            @if($enquiry->appliedForYear == 1)
                <tr>
                    <td> Physics: {{ $enquiry->cetPhysics }}</td>
                    <td> Chemistry: {{ $enquiry->cetChemistry }}</td>
                    <td>Mathematics: {{ $enquiry->cetMaths }}</td>
                </tr>
                <tr>
                    <td>JEE Main Score: {{ $enquiry->jee_score }}</td>
                    <td colspan="2"></td>
                </tr>
            @endif
            <tr>
                <td colspan="3">
                    <p style="font-size:0.9em;">
                        Disclaimer: I hereby declare that the above given information is correct to best of my
                        knowledge.
                        I understand that if the above mentioned information is found incorrect, My enquiry registration
                        will be rejected by the college authorities.
                    </p>
                </td>
            </tr>
            <tr>
                <td><br/><br>Student Signature</td>
                <td><br/><br/>Parent/Guardian Signature</td>
                <td><br/><br/>Authority Signature</td>
            </tr>
        </table>
    </div>
@stop

