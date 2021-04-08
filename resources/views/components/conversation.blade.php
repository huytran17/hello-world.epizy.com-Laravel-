
<div class="{{ $attributes['class'] }}">
    <div class="">
        <div class="">
            <div class="card-hover-shadow-2x mb-3 card">
                <div class="card-header-tab card-header">
                    <div class="card-header-title font-size-lg text-capitalize font-weight-normal">
                        <i class="header-icon lnr-printer icon-gradient bg-ripe-malin"> </i>{{ $header }}
                    </div>
                    <div class="btn-actions-pane-right text-capitalize actions-icon-btn">
                        <div class="btn-group dropdown">
                            <button type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="btn-icon btn-icon-only btn btn-link">
                                <i class="pe-7s-menu btn-icon-wrapper"></i>
                            </button>
                            <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu-right rm-pointers dropdown-menu-shadow dropdown-menu-hover-link dropdown-menu">
                                <h6 tabindex="-1" class="dropdown-header">{{ __('Header') }}</h6>
                                <button type="button" tabindex="0" class="dropdown-item">
                                    <i class="dropdown-icon lnr-inbox"> </i><span>{{ __('Menus') }}</span>
                                </button>
                                <button type="button" tabindex="0" class="dropdown-item">
                                    <i class="dropdown-icon lnr-file-empty"> </i><span>{{ __('Settings') }}</span>
                                </button>
                                <button type="button" tabindex="0" class="dropdown-item">
                                    <i class="dropdown-icon lnr-book"> </i><span>{{ __('Actions') }}</span>
                                </button>
                                <div tabindex="-1" class="dropdown-divider"></div>
                                <div class="p-3 text-right">
                                    <button class="mr-2 btn-shadow btn-sm btn btn-link">{{ __('View Details') }}</button>
                                    <button class="mr-2 btn-shadow btn-sm btn btn-primary">{{ __('Action') }}</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="scroll-area-lg">
                    <div class="scrollbar-container ps ps--active-y">
                        <div class="wrapper">
                            {{ $slot }}
                        </div>
                        <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
                            <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
                        </div>
                        <div class="ps__rail-y" style="top: 0px; height: 400px; right: 0px;">
                            <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 264px;"></div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    {{ $input }}
                </div>
            </div>
        </div>
    </div>
</div>
