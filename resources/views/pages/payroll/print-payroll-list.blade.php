@extends('../../layouts.print')

@section('title')
Payroll List
@endsection

@section('breadcrumbs')
Payroll
@endsection

@section('content')
<div class="overflow-x-auto">
        <table class="table">
            <thead>
                <tr>
                    <th class="border-b-2 dark:border-dark-5 whitespace-no-wrap">#</th>
                    <th class="border-b-2 dark:border-dark-5 whitespace-no-wrap">Employee Name</th>
                    <th class="border-b-2 dark:border-dark-5 whitespace-no-wrap">Gross</th>
                    <th class="border-b-2 dark:border-dark-5 whitespace-no-wrap">Deduction</th>
                    <th class="border-b-2 dark:border-dark-5 whitespace-no-wrap">Net Pay</th>
                </tr>
            </thead>
            <tbody>

                <tr>
                    <td class="border-b dark:border-dark-5">1</td>
                    <td class="border-b dark:border-dark-5">Brad Feet</td>
                    <td class="border-b dark:border-dark-5">1500</td>
                    <td class="border-b dark:border-dark-5">600</td>
                    <td class="border-b dark:border-dark-5">900</td>
                </tr>

                <tr>
                    <td class="border-b dark:border-dark-5">2</td>
                    <td class="border-b dark:border-dark-5">Brad Feet</td>
                    <td class="border-b dark:border-dark-5">1500</td>
                    <td class="border-b dark:border-dark-5">600</td>
                    <td class="border-b dark:border-dark-5">900</td>
                </tr>

            </tbody>
        </table>
    </div>
@endsection