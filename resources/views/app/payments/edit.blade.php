@extends('layouts.panel')

@section('breadcrumbs')
    {{ Breadcrumbs::render('payments', $invoice) }}
@endsection

@section('content')

    <div id="page-wrapper">
        @include('partials.page-header', [
            'title' => trans('payments.title'),
            'url' => route('payments.index', [
                'invoice' => Hashids::encode($invoice->id)
            ]),
            'options' => [
                [
                    'option' => trans('common.back'),
                    'url' => route('payments.index', [
                        'invoice' => Hashids::encode($invoice->id)
                    ]),
                ],
            ]
        ])

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <h2 class="text-center">@lang('common.editionOf') @lang('payments.title')</h2>
                <form action="{{ route('payments.update', ['invoice' => Hashids::encode($invoice->id), 'id' => Hashids::encode($payment->id)]) }}" method="POST" enctype="multipart/form-data">
                    @csrf()
                    @method('PUT')

                    <div class="form-group{{ $errors->has('date') ? ' has-error' : '' }}">
                        <label for="date">@lang('common.date'):</label>
                        <input type="text" class="form-control datepicker" name="date" id="date" value="{{ $payment->date }}" required maxlength="191" placeholder="{{ trans('common.required') }}">

                        @if ($errors->has('date'))
                            <span class="help-block">
                                <strong>{{ $errors->first('date') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('commentary') ? ' has-error' : '' }}">
                        <label for="commentary">@lang('common.commentary'):</label>
                        <input type="text" class="form-control" name="commentary" id="commentary" value="{{ $payment->commentary }}" required maxlength="191" placeholder="{{ trans('common.required') }}">

                        @if ($errors->has('commentary'))
                            <span class="help-block">
                                <strong>{{ $errors->first('commentary') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('method') ? ' has-error' : '' }}">
                        <label for="method">@lang('payments.method'):</label>
                        <select class="form-control selectpicker" name="method" id="method" required>
                            <option value="{{ $payment->payment_method }}" selected>{{ trans('payments.' . $payment->payment_method) }}</option>

                            @foreach (array_diff(['cash', 'transfer', 'courtesy'], [$payment->payment_method]) as $item)
                                <option value="{{ $item }}">{{ trans('payments.' . $item) }}</option>
                            @endforeach
                        </select>

                        @if ($errors->has('method'))
                            <span class="help-block">
                                <strong>{{ $errors->first('method') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('value') ? ' has-error' : '' }}">
                        <label for="value">@lang('common.value'):</label>
                        <input type="number" class="form-control" name="value" id="value" value="{{ round($payment->value, 0) }}" required min="0.01" max="999999999" step="0.01" placeholder="{{ trans('common.required') }}">

                        @if ($errors->has('value'))
                            <span class="help-block">
                                <strong>{{ $errors->first('value') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('invoice') ? ' has-error' : '' }}">
                        <label for="invoice">@lang('invoices.invoice'): <small>@lang('common.optional')</small></label>
                        <input type="file" class="form-control" name="invoice" id="invoice" accept="image/png, image/jpeg, application/pdf">

                        @if ($errors->has('invoice'))
                            <span class="help-block">
                                <strong>{{ $errors->first('invoice') }}</strong>
                            </span>
                        @endif
                    </div>

                    <button type="submit" class="btn btn-primary">@lang('common.update')</button>
                    <a href="{{ route('payments.index', ['invoice' => Hashids::encode($invoice->id)]) }}" class="btn btn-link">
                        @lang('common.back')
                    </a>
                </form>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="spacer-md"></div>
            </div>
        </div>
    </div>

@endsection