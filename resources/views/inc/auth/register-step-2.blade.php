<div class="" data-kt-stepper-element="content">
    <!--begin::Wrapper-->
    <div class="w-100">
        <!--begin::Heading-->
        <div class="pb-10 pb-lg-15">
            <!--begin::Title-->
            <h2 class="fw-bolder text-dark">Account Info</h2>
            <!--end::Title-->
            <!--begin::Notice-->
            <div class="text-muted fw-bold fs-6">If you need more info, please check out
                <a href="#" class="link-primary fw-bolder">Help Page</a>.
            </div>
            <!--end::Notice-->
        </div>
        <!--end::Heading-->
        {{-- name --}}
        <div id="federation-content">
            <!--begin::Input group-->
            <div class="mb-10 fv-row ">
                <!--begin::Label-->
                <label class="form-label mb-3 required">Federation Name</label>
                <!--end::Label-->
                <!--begin::Input-->
                <input type="text" class="form-control form-control-lg form-control-solid" name="account_name"
                    placeholder="" value="" />
                <!--end::Input-->
            </div>
            <!--end::Input group-->
            {{-- mobile --}}

            <!--begin::Input group-->
            <div class="mb-10 row">
                <div class="col-md-6">
                    <!--begin::Label-->
                    <label class="form-label mb-3 required">Federation Mobile</label>
                    <!--end::Label-->
                    <!--begin::Input-->
                    <input type="text" class="form-control form-control-lg form-control-solid" name="account_name"
                        placeholder="" value="" />
                    <!--end::Input-->
                </div>
                <div class="col-md-6">
                    <!--begin::Label-->
                    <label class="form-label mb-3 required" id="federation_credential">Federation Credential</label>
                    <!--end::Label-->
                    <!--begin::Input-->
                    <input type="file" class="form-control form-control-lg form-control-solid" name="account_name"
                        placeholder="" value="" />
                    <!--end::Input-->
                </div>
            </div>
            <!--end::Input group-->
            {{-- Logo --}}

            <!--begin::Input group-->
            <div class="fv-row mb-10 ">
                <!--end::Label-->
                <label class="form-label required">Federation Address</label>
                <!--end::Label-->
                <!--begin::Input-->
                <textarea name="business_description" class="form-control form-control-lg form-control-solid" rows="3"></textarea>
                <!--end::Input-->
            </div>
            <!--end::Input group-->
            {{-- type --}}

            <!--begin::Input group-->
            <div class="mb-0 fv-row">
                <!--begin::Label-->
                <label class="d-flex align-items-center form-label mb-5">Select Federation Plan
                    <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
                        title="Monthly billing will be based on your account plan"></i></label>
                <!--end::Label-->
                <!--begin::Options-->
                <div class="mb-0">
                    <!--begin:Option-->
                    <label class="federation_plan d-flex flex-stack mb-5 cursor-pointer" data-type="federation">
                        <!--begin:Label-->
                        <span class="d-flex align-items-center me-2">
                            <!--begin::Icon-->
                            <span class="symbol symbol-50px me-6">
                                <span class="symbol-label">
                                    <!--begin::Svg Icon | path: icons/duotune/finance/fin001.svg-->
                                    <span class="svg-icon svg-icon-1 svg-icon-gray-600">
                                        <i class="lab la-artstation fs-2x"></i>
                                    </span>
                                    <!--end::Svg Icon-->
                                </span>
                            </span>
                            <!--end::Icon-->
                            <!--begin::Description-->
                            <span class="d-flex flex-column">
                                <span class="fw-bolder text-gray-800 text-hover-primary fs-5">Federation Account</span>
                                <span class="fs-6 fw-bold text-muted">Use images to enhance your post flow</span>
                            </span>
                            <!--end:Description-->
                        </span>
                        <!--end:Label-->
                        <!--begin:Input-->
                        <span class="form-check form-check-custom form-check-solid">
                            <input class="form-check-input" type="radio" name="account_plan" value="1" />
                        </span>
                        <!--end:Input-->
                    </label>
                    <!--end::Option-->
                    <!--begin:Option-->
                    <label class="federation_plan d-flex flex-stack mb-5 cursor-pointer" data-type="committee">
                        <!--begin:Label-->
                        <span class="d-flex align-items-center me-2">
                            <!--begin::Icon-->
                            <span class="symbol symbol-50px me-6">
                                <span class="symbol-label">
                                    <!--begin::Svg Icon | path: icons/duotune/graphs/gra006.svg-->
                                    <span class="svg-icon svg-icon-1 svg-icon-gray-600">
                                        <i class="lab la-buffer fs-2x"></i>
                                    </span>
                                    <!--end::Svg Icon-->
                                </span>
                            </span>
                            <!--end::Icon-->
                            <!--begin::Description-->
                            <span class="d-flex flex-column">
                                <span class="fw-bolder text-gray-800 text-hover-primary fs-5">Committee Account</span>
                                <span class="fs-6 fw-bold text-muted">Use images to your post time</span>
                            </span>
                            <!--end:Description-->
                        </span>
                        <!--end:Label-->
                        <!--begin:Input-->
                        <span class="form-check form-check-custom form-check-solid">
                            <input class="form-check-input" type="radio" checked="checked" name="account_plan"
                                value="2" />
                        </span>
                        <!--end:Input-->
                    </label>
                    <!--end::Option-->
                    <!--begin:Option-->
                    <label class="federation_plan d-flex flex-stack mb-5 cursor-pointer" data-type="association">
                        <!--begin:Label-->
                        <span class="d-flex align-items-center me-2">
                            <!--begin::Icon-->
                            <span class="symbol symbol-50px me-6">
                                <span class="symbol-label">
                                    <!--begin::Svg Icon | path: icons/duotune/graphs/gra008.svg-->
                                    <span class="svg-icon svg-icon-1 svg-icon-gray-600">
                                        <i class="lab la-connectdevelop fs-2x"></i>
                                    </span>
                                    <!--end::Svg Icon-->
                                </span>
                            </span>
                            <!--end::Icon-->
                            <!--begin::Description-->
                            <span class="d-flex flex-column">
                                <span class="fw-bolder text-gray-800 text-hover-primary fs-5">Association Account</span>
                                <span class="fs-6 fw-bold text-muted">Use images to enhance time travel rivers</span>
                            </span>
                            <!--end:Description-->
                        </span>
                        <!--end:Label-->
                        <!--begin:Input-->
                        <span class="form-check form-check-custom form-check-solid">
                            <input class="form-check-input" type="radio" name="account_plan" value="3" />
                        </span>
                        <!--end:Input-->
                    </label>
                    <!--end::Option-->
                    <!--begin:Option-->
                    <label class="federation_plan d-flex flex-stack mb-5 cursor-pointer" data-type="club">
                        <!--begin:Label-->
                        <span class="d-flex align-items-center me-2">
                            <!--begin::Icon-->
                            <span class="symbol symbol-50px me-6">
                                <span class="symbol-label">
                                    <!--begin::Svg Icon | path: icons/duotune/graphs/gra008.svg-->
                                    <span class="svg-icon svg-icon-1 svg-icon-gray-600">
                                        <i class="lab la-readme fs-2x"></i>
                                    </span>
                                    <!--end::Svg Icon-->
                                </span>
                            </span>
                            <!--end::Icon-->
                            <!--begin::Description-->
                            <span class="d-flex flex-column">
                                <span class="fw-bolder text-gray-800 text-hover-primary fs-5">Club Account</span>
                                <span class="fs-6 fw-bold text-muted">Use images to enhance time travel rivers</span>
                            </span>
                            <!--end:Description-->
                        </span>
                        <!--end:Label-->
                        <!--begin:Input-->
                        <span class="form-check form-check-custom form-check-solid">
                            <input class="form-check-input" type="radio" name="account_plan" value="3" />
                        </span>
                        <!--end:Input-->
                    </label>
                    <!--end::Option-->
                    <!--begin:Option-->
                    <label class="federation_plan d-flex flex-stack mb-0 cursor-pointer" data-type="group">
                        <!--begin:Label-->
                        <span class="d-flex align-items-center me-2">
                            <!--begin::Icon-->
                            <span class="symbol symbol-50px me-6">
                                <span class="symbol-label">
                                    <!--begin::Svg Icon | path: icons/duotune/graphs/gra008.svg-->
                                    <span class="svg-icon svg-icon-1 svg-icon-gray-600">
                                        <i class="las la-calendar-alt fs-2x"></i>
                                    </span>
                                    <!--end::Svg Icon-->
                                </span>
                            </span>
                            <!--end::Icon-->
                            <!--begin::Description-->
                            <span class="d-flex flex-column">
                                <span class="fw-bolder text-gray-800 text-hover-primary fs-5">Group Account</span>
                                <span class="fs-6 fw-bold text-muted">Use images to enhance time travel rivers</span>
                            </span>
                            <!--end:Description-->
                        </span>
                        <!--end:Label-->
                        <!--begin:Input-->
                        <span class="form-check form-check-custom form-check-solid">
                            <input class="form-check-input" type="radio" name="account_plan" value="3" />
                        </span>
                        <!--end:Input-->
                    </label>
                    <!--end::Option-->
                </div>
                <!--end::Options-->
            </div>
            <!--end::Input group-->
        </div>
        <div id="player-content">
            <!--begin::Input group-->
            <div class="mb-10 fv-row ">
                <!--begin::Label-->
                <label class="form-label mb-3 required">Player Name</label>
                <!--end::Label-->
                <!--begin::Input-->
                <input type="text" class="form-control form-control-lg form-control-solid" name="account_name"
                    placeholder="" value="" />
                <!--end::Input-->
            </div>
            <!--end::Input group-->

            <!--begin::Input group-->
            <div class="mb-10 row">
                <div class="col-md-6">
                    <!--begin::Label-->
                    <label class="form-label mb-3 required">Mobile</label>
                    <!--end::Label-->
                    <!--begin::Input-->
                    <input type="text" class="form-control form-control-lg form-control-solid" name="account_name"
                        placeholder="" value="" />
                    <!--end::Input-->
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-bolder text-dark fs-6">Date of birth</label>
                    <input class="form-control form-control-lg form-control-solid" type="date" placeholder="" name="email" autocomplete="off" />
                </div>
            </div>
            <!--end::Input group-->

            <!--begin::Input group-->
            <div class="fv-row mb-10">
                <!--begin::Label-->
                <label class="form-label required">Player Nationality</label>
                <!--end::Label-->
                <!--begin::Input-->
                <select name="business_type" class="form-select form-select-lg form-select-solid" data-control="select2" data-placeholder="Select..." data-allow-clear="true" data-hide-search="true">
                    <option></option>
                    <option value="1">S Corporation</option>
                    <option value="1">C Corporation</option>
                    <option value="2">Sole Proprietorship</option>
                    <option value="3">Non-profit</option>
                    <option value="4">Limited Liability</option>
                    <option value="5">General Partnership</option>
                </select>
                <!--end::Input-->
            </div>
            <!--end::Input group-->
        </div>
    </div>
    <!--end::Wrapper-->
</div>
