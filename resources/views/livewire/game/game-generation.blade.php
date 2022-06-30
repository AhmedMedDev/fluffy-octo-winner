<div>
    <div class="card mb-6 ">
        <div class="card-body pt-9 reload overflow-hidden">
            <!--begin::Details-->
    
            <h3 class="text-dark fw-bolder mb-5">Player Name</h3>
            <div class="d-flex ">
                <div class="p-1">
                    <input wire:model.defer="player1" type="text" class="form-control form-control-solid" placeholder="Player 1"/>
                </div>
                <div class="p-1">
                    <input wire:model.defer="player2" type="text" class="form-control form-control-solid" placeholder="Player 2"/>
                </div>
                <div class="p-1 d-flex justify-content-center align-items-center">
                    <div class="form-check form-switch form-check-custom form-check-solid me-10">
                        <input wire:model.defer="unsaved" class="form-check-input h-30px w-50px" type="checkbox" value="" id="flexSwitch30x50"/>
                        <label class="form-check-label" for="flexSwitch30x50">
                            Unsaved This Game
                        </label>
                    </div>
                </div>
            </div>
            {{--  --}}
    
            <div class="separator my-10"></div>
    
            <div class="row">
                <div class="col-6">
                    <h3 class="text-dark fw-bolder mb-5">Start Score</h3>
    
                    <div class="d-flex ">
                        <div class="p-1">
                            <input wire:model.defer="start_score" type="number" class="form-control form-control-solid"/>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <h3 class="text-dark fw-bolder mb-5">Limits Rounds</h3>
    
                    <div class="form-check form-switch form-check-custom form-check-solid me-10">
                        <input onclick="toggleActivation($(this), '#limit_rounds')" class="form-check-input h-30px w-50px" type="checkbox" value="1" id="flexSwitch30x50"/>
                        <label class="form-check-label" for="flexSwitch30x50">
                            <input wire:model.defer="limit_rounds" id="limit_rounds" type="number" class="form-control form-control-solid"  disabled/>
                        </label>
                    </div>
                </div>
            </div>
            <div class="separator my-10"></div>
            {{--  --}}
            <h3 class="text-dark fw-bolder mb-5">Practice Mode</h3>
    
            <div class="row">
                <div class="col-6">
                    <div class="form-check form-switch form-check-custom form-check-solid me-10">
                        <input wire:model.defer="remaining_score" class="form-check-input h-30px w-50px" type="checkbox" value="" id="flexSwitch30x50"/>
                        <label class="form-check-label" for="flexSwitch30x50">
                            Input of remaining score
                        </label>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-check form-switch form-check-custom form-check-solid me-10">
                        <input wire:model.defer="com_score" class="form-check-input h-30px w-50px" type="checkbox" value="" id="flexSwitch30x50"/>
                        <label class="form-check-label" for="flexSwitch30x50">
                            Input of Com Score
                        </label>
                    </div>
                </div>
            </div>
            <div class="separator my-10"></div>
            {{--  --}}
            <h3 class="text-dark fw-bolder mb-5">Double Mode</h3>

            <div class="row">
                <div class="col-6">
                    <div class="form-check form-switch form-check-custom form-check-solid me-10">
                        <input wire:model.defer="double_in" class="form-check-input h-30px w-50px" type="checkbox" value="" id="flexSwitch30x50"/>
                        <label class="form-check-label" for="flexSwitch30x50">
                            Double in
                        </label>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-check form-switch form-check-custom form-check-solid me-10">
                        <input wire:model.defer="double_out" class="form-check-input h-30px w-50px" type="checkbox" value="" id="flexSwitch30x50"/>
                        <label class="form-check-label" for="flexSwitch30x50">
                            Double out
                        </label>
                    </div>
                </div>
            </div>
            <div class="separator my-10"></div>
            {{--  --}}
    
            <h3 class="text-dark fw-bolder mb-5">Handicap</h3>
            <div class="row">
                <div class="col-6">
                    <h6 class="text-gray-800">Player 1</h6>
    
                    <div class="form-check form-switch form-check-custom form-check-solid me-10">
                        <input onclick="toggleActivation($(this), '#handicap_1')" class="form-check-input h-30px w-50px" type="checkbox" value="1" id="flexSwitch30x50"/>
                        <label class="form-check-label" for="flexSwitch30x50">
                            <input wire:model.defer="handicap_1" id="handicap_1" type="number" class="form-control form-control-solid" value="501" disabled/>
                        </label>
                    </div>
                </div>
                <div class="col-6">
                    <h6 class="text-gray-800">Player 2</h6>
    
                    <div class="form-check form-switch form-check-custom form-check-solid me-10">
                        <input onclick="toggleActivation($(this), '#handicap_2')" class="form-check-input h-30px w-50px" type="checkbox" value="1" id="flexSwitch30x50"/>
                        <label class="form-check-label" for="flexSwitch30x50">
                            <input wire:model.defer="handicap_2" id="handicap_2" type="number" class="form-control form-control-solid" value="501" disabled/>
                        </label>
                    </div>
                </div>
            </div>
            {{--  --}}
    
            <!--end::Details-->
        </div>
    </div>
    <div class="d-flex justify-content-around mt-4" wire:click="generate">
        <button class="btn btn-flex btn-dark px-6" >
            <span class="svg-icon svg-icon-2x">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <path opacity="0.3" d="M22 5V19C22 19.6 21.6 20 21 20H19.5L11.9 12.4C11.5 12 10.9 12 10.5 12.4L3 20C2.5 20 2 19.5 2 19V5C2 4.4 2.4 4 3 4H21C21.6 4 22 4.4 22 5ZM7.5 7C6.7 7 6 7.7 6 8.5C6 9.3 6.7 10 7.5 10C8.3 10 9 9.3 9 8.5C9 7.7 8.3 7 7.5 7Z" fill="currentColor"></path>
                    <path d="M19.1 10C18.7 9.60001 18.1 9.60001 17.7 10L10.7 17H2V19C2 19.6 2.4 20 3 20H21C21.6 20 22 19.6 22 19V12.9L19.1 10Z" fill="currentColor"></path>
                </svg>
            </span>
            <span class="d-flex flex-column align-items-start ms-2">
                <span class="fs-3 fw-bolder">Game On</span>
                <span class="fs-7">Some description</span>
            </span>
        </button>
    </div>
</div>
@push('js')
    <script>
        const toggleActivation = (obj, elm_id) => {

            let elm = $(obj);
            let elm_val = +elm.val();

            $(elm_id).prop('disabled', !elm_val);

            elm.val( (elm_val) ? 0 : 1 );
        }
    </script>
@endpush