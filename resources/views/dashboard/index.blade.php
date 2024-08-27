@extends('layouts.app')
@section('title')
    {{ __('messages.dashboard') }}
@endsection
@section('content')
<div class="container-fluid">
    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
        <li class="nav-item" role="presentation">
          <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">SHORTCUTS</button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">OVERVIEW</button>
        </li>
      </ul>
      <hr class="hr_set">
      <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
            <div class="d-flex flex-column">
                <div class="row">
                    <div class="col-12">
                        @include('flash::message')
                        <div class="row">
                            {{-- Clients Widget --}}
                            <div class="col-xxl-3 col-xl-4 col-sm-6 widget">
                                <a href="{{ route('clients.index') }}"
                                   class="mb-xl-8 text-decoration-none">
                                    <div
                                            class="bg-primary shadow-md rounded-10 p-xxl-10 px-7 py-10 d-flex align-items-center justify-content-between my-3">
                                        <div
                                                class="bg-cyan-300 widget-icon rounded-10 d-flex align-items-center justify-content-center">
                                            <i class="fas fa-user display-4 card-icon text-white"></i>
                                        </div>
                                        <div class="text-end text-white">
                                            <h2 class="fs-1-xxl fw-bolder text-white">{{ formatTotalAmount($total_clients) }}</h2>
                                            <h3 class="mb-0 fs-4 fw-light"> {{ __('messages.admin_dashboard.total_clients') }}</h3>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            {{-- Total Invoices Amount Widget --}}
                            <div class="col-xxl-3 col-xl-4 col-sm-6 widget">
                                <a href="{{ route('invoices.index') }}"
                                   class="mb-xl-8 text-decoration-none">
                                    <div
                                            class="bg-success shadow-md rounded-10 p-xxl-10 px-7 py-10 d-flex align-items-center justify-content-between my-3">
                                        <div
                                                class="bg-green-300 widget-icon rounded-10 d-flex align-items-center justify-content-center">
                                            <i class="fa fa-money-check display-4 card-icon text-white"></i>
                                        </div>
                                        <div class="text-end text-white">
                                            <h2 class="fs-1-xxl fw-bolder text-white">
                                                <span>{{ getCurrencyAmount($invoice_amount) }}
                                            </h2>
                                            <h3 class="mb-0 fs-4 fw-light">{{ __('messages.admin_dashboard.total_amount') }}</h3>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            {{-- Recieved Amount Widget --}}
                            <div class="col-xxl-3 col-xl-4 col-sm-6 widget">
                                <a href="{{route('invoices.index',['status'=>2]) }}"
                                   class="mb-xl-8 text-decoration-none">
                                    <div
                                            class="bg-info shadow-md rounded-10 p-xxl-10 px-7 py-10 d-flex align-items-center justify-content-between my-3">
                                        <div
                                                class="bg-blue-300 widget-icon rounded-10 d-flex align-items-center justify-content-center">
                                            <i class="fas fa-money-bill-wave display-4 card-icon text-white"></i>

                                        </div>
                                        <div class="text-end text-white">
                                            <h2 class="fs-1-xxl fw-bolder text-white">{{getCurrencyAmount($paid_amount) }}</h2>
                                            <h3 class="mb-0 fs-4 fw-light">{{ __('messages.admin_dashboard.total_paid') }}</h3>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            {{--Partially Paid Widget --}}
                            <div class="col-xxl-3 col-xl-4 col-sm-6 widget">
                                <a href="{{ route('invoices.index',['status'=>3]) }}"
                                   class="mb-xl-8 text-decoration-none">
                                    <div
                                            class="bg-warning shadow-md rounded-10 p-xxl-10 px-7 py-10 d-flex align-items-center justify-content-between my-3">
                                        <div
                                                class="bg-yellow-300 widget-icon rounded-10 d-flex align-items-center justify-content-center">
                                            <i class="fas fa-credit-card display-4 card-icon text-white"></i>

                                        </div>
                                        <div class="text-end text-white">
                                            <h2 class="fs-1-xxl fw-bolder text-white">{{getCurrencyAmount($due_amount) }}</h2>
                                            <h3 class="mb-0 fs-4 fw-light">{{ __('messages.admin_dashboard.total_due') }}</h3>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            {{-- Products Widget --}}
                            <div class="col-xxl-3 col-xl-4 col-sm-6 widget">
                                <a href="{{ route('products.index') }}"
                                   class="mb-xl-8 text-decoration-none">
                                    <div
                                            class="bg-secondary shadow-md rounded-10 p-xxl-10 px-7 py-10 d-flex align-items-center justify-content-between my-3">
                                        <div
                                                class="bg-gray-300 widget-icon rounded-10 d-flex align-items-center justify-content-center">
                                            <i class="fas fa-cube display-4 card-icon text-dark"></i>

                                        </div>
                                        <div class="text-end text-dark">
                                            <h2 class="fs-1-xxl fw-bolder text-dark">{{ formatTotalAmount($total_products)  }}</h2>
                                            <h3 class="mb-0 fs-4 fw-light">{{ __('messages.admin_dashboard.total_products') }}</h3>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            {{-- Total Invoices Widget --}}
                            <div class="col-xxl-3 col-xl-4 col-sm-6 widget">
                                <a href="{{ route('invoices.index') }}"
                                   class="mb-xl-8 text-decoration-none">
                                    <div
                                            class="bg-danger shadow-md rounded-10 p-xxl-10 px-7 py-10 d-flex align-items-center justify-content-between my-3">
                                        <div
                                                class="bg-red-300 widget-icon rounded-10 d-flex align-items-center justify-content-center">
                                            <i class="fas fa-file-invoice display-4 card-icon text-white"></i>

                                        </div>
                                        <div class="text-end text-white">
                                            <h2 class="fs-1-xxl fw-bolder text-white">{{ formatTotalAmount($total_invoices) }}</h2>
                                            <h3 class="mb-0 fs-4 fw-light">{{ __('messages.admin_dashboard.total_invoices') }}</h3>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            {{--Paid Widget --}}
                            <div class="col-xxl-3 col-xl-4 col-sm-6 widget">
                                <a href="{{ route('invoices.index',['status'=>2]) }}"
                                   class="mb-xl-8 text-decoration-none">

                                    <div
                                            class="bg-dark shadow-md rounded-10 p-xxl-10 px-7 py-10 d-flex align-items-center justify-content-between my-3">
                                        <div
                                                class="bg-gray-300 widget-icon rounded-10 d-flex align-items-center justify-content-center">
                                            <i class="fas fa-clipboard-check display-4 card-icon {{\Illuminate\Support\Facades\Auth::user()->dark_mode ? 'text-black' : 'text-white'}}"></i>

                                        </div>
                                        <div
                                                class="text-end {{\Illuminate\Support\Facades\Auth::user()->dark_mode ? 'text-black' : 'text-white'}}">
                                            <h2 class="fs-1-xxl fw-bolder {{\Illuminate\Support\Facades\Auth::user()->dark_mode ? 'text-black' : 'text-white'}}">{{ formatTotalAmount($paid_invoices) }}</h2>
                                            <h3 class="mb-0 fs-4 fw-light">{{ __('messages.admin_dashboard.total_paid_invoices') }}</h3>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            {{--Unapid Widget --}}
                            <div class="col-xxl-3 col-xl-4 col-sm-6 widget">
                                <a href="{{ route('invoices.index',['status'=>1]) }}"
                                   class="mb-xl-8 text-decoration-none">

                                    <div
                                            class="bg-primary shadow-md rounded-10 p-xxl-10 px-7 py-10 d-flex align-items-center justify-content-between my-3">
                                        <div
                                                class="bg-cyan-300 widget-icon rounded-10 d-flex align-items-center justify-content-center">
                                            <i class="fas fa-exclamation-triangle display-4 card-icon text-white"></i>

                                        </div>
                                        <div class="text-end text-white">
                                            <h2 class="fs-1-xxl fw-bolder text-white">{{ formatTotalAmount($unpaid_invoices) }}</h2>
                                            <h3 class="mb-0 fs-4 fw-light">{{ __('messages.admin_dashboard.total_unpaid_invoices') }}</h3>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- 2nd --}}
        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
            <div class="col-12 mb-4">
                <div class="">
                    <div class="card mt-3">
                        <div class="card-body p-5">
                            <div class="card-header border-0 pt-5">
                                <h3 class="mb-0">{{  __('messages.admin_dashboard.income_overview') }}</h3>
                                <div class="ms-auto">
                                    <div id="rightData" class="date-picker-space">
                                        <input class="form-control " id="time_range">
                                    </div>
                                </div>
                            </div>
                            <div class="card-body p-lg-6 p-0">
                                <div class="">
                                    <div id="yearly_income_overview-container" class="pt-2">
                                        <canvas id="yearly_income_chart_canvas" height="200" width="905" ></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xxl-6 col-12">
                    <div class="card">
                        <div class="card-header pb-0 px-10">
                            <h3 class="mb-0">{{  __('messages.admin_dashboard.payment_overview') }}</h3>
                        </div>
                        <div class="card-body pt-7">
                            <div id="payment-overview-container" class="justify-align-center">
                                <canvas id="payment_overview"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-6 col-12 ">
                    <div class="card">
                        <div class="card-header pb-0 px-10">
                            <h3 class="mb-0">{{  __('messages.admin_dashboard.invoice_overview') }}</h3>
                        </div>
                        <div class="card-body pt-7">
                            <div id="invoice-overview-container" class="justify-align-center">
                                <canvas id="invoice_overview"></canvas>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

      </div>
  {{-- <div class="row mt-5 ">
    <div class="col-md-6">
        <div class="tileContent fadeIn ">
            <div class="clear" style="position: relative;">
                <div class="Layouts__LayoutWrapper-sc-1d09o10-0 Layouts__LayoutWrapperResponsive-sc-1d09o10-3 kSzjuz p-3">
                    <div class="Headers__HeaderSection-sc-3wvp2q-2 isyqJf">
                        <h3 class="Headers__WidgetHeaderTitle-sc-3wvp2q-1 bIoxlV">Shortcuts</h3></div><div class="ShortcutsBox__ShortcutsBoxContainer-sc-1rumlt5-0 gdXYPb">
                            <button class="Shortcut__ShortcutContainer-sc-1soyzsq-0 eAgFUN">
                                <div class="Shortcut__ShortcutIcon-sc-1soyzsq-1 gpLGZq"></div>
                                <div class="Shortcut__ShortcutText-sc-1soyzsq-2 irRQCP">Add customer</div>
                            </button>
                            <button class="Shortcut__ShortcutContainer-sc-1soyzsq-0 eAgFUN">
                                <div class="Shortcut__ShortcutIcon-sc-1soyzsq-1 gCmOnc"></div>
                                <div class="Shortcut__ShortcutText-sc-1soyzsq-2 irRQCP">Add estimate</div>
                            </button><button class="Shortcut__ShortcutContainer-sc-1soyzsq-0 eAgFUN">
                                <div class="Shortcut__ShortcutIcon-sc-1soyzsq-1 hJWukL"></div>
                                <div class="Shortcut__ShortcutText-sc-1soyzsq-2 irRQCP">Add invoice</div>
                            </button>
                            <button class="Shortcut__ShortcutContainer-sc-1soyzsq-0 eAgFUN">
                                <div class="Shortcut__ShortcutIcon-sc-1soyzsq-1 ipCFzW"></div>
                                <div class="Shortcut__ShortcutText-sc-1soyzsq-2 irRQCP">Receive payment</div>
                            </button>
                            <button class="Shortcut__ShortcutContainer-sc-1soyzsq-0 eAgFUN">
                                <div class="Shortcut__ShortcutIcon-sc-1soyzsq-1 ivAZuh"></div><div class="Shortcut__ShortcutText-sc-1soyzsq-2 irRQCP">Add receipt</div></button><button class="Shortcut__ShortcutContainer-sc-1soyzsq-0 eAgFUN"><div class="Shortcut__ShortcutIcon-sc-1soyzsq-1 eLSPNS"></div><div class="Shortcut__ShortcutText-sc-1soyzsq-2 irRQCP">Add bill</div></button><button class="Shortcut__ShortcutContainer-sc-1soyzsq-0 eAgFUN"><div class="Shortcut__ShortcutIcon-sc-1soyzsq-1 fFtcFb"></div><div class="Shortcut__ShortcutText-sc-1soyzsq-2 irRQCP">Pay bill</div></button><button class="Shortcut__ShortcutContainer-sc-1soyzsq-0 eAgFUN"><div class="Shortcut__ShortcutIcon-sc-1soyzsq-1 iMIPPj"></div><div class="Shortcut__ShortcutText-sc-1soyzsq-2 irRQCP">Track time</div></button></div></div><div class="erd_scroll_detection_container erd_scroll_detection_container_animation_active" style="visibility: hidden; display: inline; width: 0px; height: 0px; z-index: -1; overflow: hidden; margin: 0px; padding: 0px;"><div dir="ltr" class="erd_scroll_detection_container" style="position: absolute; flex: 0 0 auto; overflow: hidden; z-index: -1; visibility: hidden; width: 100%; height: 100%; left: 0px; top: 0px;"><div class="erd_scroll_detection_container" style="position: absolute; flex: 0 0 auto; overflow: hidden; z-index: -1; visibility: hidden; inset: -16px -15px -15px -16px;"><div style="position: absolute; flex: 0 0 auto; overflow: scroll; z-index: -1; visibility: hidden; width: 100%; height: 100%;"><div style="position: absolute; left: 0px; top: 0px; width: 701px; height: 415px;"></div></div><div style="position: absolute; flex: 0 0 auto; overflow: scroll; z-index: -1; visibility: hidden; width: 100%; height: 100%;"><div style="position: absolute; width: 200%; height: 200%;"></div></div></div></div></div></div></div>
    </div>
    <div class="col-md-6"></div>
</div> --}}
    {{-- =================================== --}}

</div>
{{ Form::hidden('currency',  getCurrencySymbol(),['id' => 'currency']) }}
@endsection
