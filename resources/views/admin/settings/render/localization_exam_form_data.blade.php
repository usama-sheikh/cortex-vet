<div class="accordion-item mt-2 remove-exam-info-{{ $examAddInfo->id ?? 0 }}">
    <p class="accordion-header" id="localizationExamFormData{{ $examAddInfo->id ?? 0 }}">
        <button class="accordion-button py-3 px-2 border-bottom font-weight-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseLocalizationExamFormData{{ $examAddInfo->id ?? 0 }}"
                aria-expanded="false"
                aria-controls="collapseLocalizationExamFormData{{ $examAddInfo->id ?? 0 }}" style="background-color: #E1DAF1; border-radius: 10px; color: #6647B1;">
            {{ $examAddInfo->step_name ?? '' }}
            <i class="collapse-close fa fa-sort-desc text-xs pt-1 position-absolute end-0 me-3" aria-hidden="true"></i>
            <i class="collapse-open fa fa-caret-up text-xs pt-1 position-absolute end-0 me-3" aria-hidden="true"></i>
        </button>
    </p>
    <div id="collapseLocalizationExamFormData{{ $examAddInfo->id ?? 0 }}" class="accordion-collapse collapse" aria-labelledby="localizationExamFormData{{ $examAddInfo->id ?? 0 }}"
         data-bs-parent="#accordionRental">
        <div id="examVideoData{{ $examAddInfo->id ?? 0 }}" class="exam-video-data accordion-body d-none p-3">
            <div class="card p-4 pt-2">
                <h6 class="mb-4">Upload Instruction Video</h6>
                <div class="col-md-12 mt-2">
                    <label class="form-label font-weight-bold">Video Url</label>
                    <div class="input-group input-group-outline mb-3">
                        <input type="copy" name="url" class="form-control" placeholder="Link">
                        <span class="input-group-text bg-transparent"
                              data-bs-toggle="tooltip"
                              data-bs-placement="top"
                              title="Referral code expires in 24 hours">
                            <i class="material-symbols-outlined text-sm me-2"> content_copy </i>
                        </span>
                    </div>
                </div>
                <h6 class="text-center">OR</h6>
                <div class="col-md-12 mt-2">
                    <label class="form-label font-weight-bold">Upload Video</label>
                    <div class="input-group input-group-outline mb-3">
                        <input type="file" name="email" class="form-control" placeholder="Link">
                    </div>
                </div>
                <div class="col-md-12 d-flex justify-content-end">
                    <button type="button" class="btn btn-primary px-3 nav-link cursor-pointer btn-sm text-white mb-0 mt-3" id="dropdownMenuDocs" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa fa-upload me-2 mx-1" style=" font-size: 10px; !important;" aria-hidden="true"></i>
                        <span class="text-sm">
                        <span>Upload</span>
                        <div id="uploadVideoOrURL-loader" class="spinner-border text-green-700 d-none overflow-hidden" role="status"
                             style="height: 17px !important;width: 17px !important;margin-left: 5px;font-size: 16px;margin-top: 0px;color: #ffffff;">
                            <span class="sr-only">Loading...</span>
                        </div>
                    </span>
                    </button>
                </div>
            </div>
        </div>
        <div class="exam-test-option-data accordion-body p-3">
            <div>
                <div class="nav-item dropdown mx-2 d-flex justify-content-end gap-2">
                    <button type="button"
                            class="btn btn-primary text-sm nav-link cursor-pointer btn-sm text-white exam-testOptions-add-modal"
                            style="border-radius: 50px; opacity: 0.6; width: 30px; height: 30px; display: flex; justify-content: center; align-items: center;"
                            data-exam-id="{{ Crypt::encrypt($examAddInfo->id) }}" data-test-option-class="exam-test-option-data{{ $examAddInfo->id ?? 0 }}">
                        <i class="fa fa-plus"
                           aria-hidden="true"
                           style="font-size: 0.6rem !important;"></i>
                    </button>
                    <button type="button"
                            class="btn btn-danger text-sm nav-link cursor-pointer btn-sm text-white remove-exam-info"
                            style="border-radius: 50px; opacity: 0.6; width: 30px; height: 30px; display: flex; justify-content: center; align-items: center;"
                            data-removed-name="{{ $examAddInfo->step_name ?? '' }}"
                            data-removed-class="remove-exam-info-{{ $examAddInfo->id ?? 0 }}"
                            data-action-url="{{ route('admin.setting.exam.delete', Crypt::encrypt($examAddInfo->id)) }}"
                    >
                        <i class="fa fa-trash"
                           aria-hidden="true"
                           style="font-size: 0.6rem !important;"></i>
                    </button>
                </div>
            </div>
            <div class="exam-test-option-data{{ $examAddInfo->id ?? 0 }}">
                @if(count($examAddInfo->testInfo) > 0)
                    @foreach($examAddInfo->testInfo as $testKey=>$testInfo)
                        @php($test_sn = $testKey+1)
                        <div id="cloningTestContainer{{ $test_sn }}" class="request-remove-data remove-exam-test-{{ $test_sn ?? '' }}">
                            <div class="mt-2" id="cloningTest{{ $test_sn }}">
                                <div class="border-radius-lg"
                                     style="border:1px solid #e8e8e8;">
                                    <div class="d-flex justify-content-end gap-2 p-2 ">
                                        <a href="javascript:" class="edit-test-options" data-action-url="{{ route('admin.setting.exam.test.options.edit', Crypt::encrypt($testInfo->id)) }}"
                                           data-test-updated-class="show-updated-test-info{{ $test_sn }}">
                                            <i class="fa fa-pencil-square-o" aria-hidden="true" style="cursor: pointer; color: #5534A5"></i>
                                        </a>
                                        <a href="javascript:" class="remove-exam-test-info"
                                           data-removed-name="{{ $testInfo->name ?? '' }}"
                                           data-removed-class="remove-exam-test-{{ $test_sn ?? '' }}"
                                           data-action-url="{{ route('admin.setting.exam.test.delete', Crypt::encrypt($testInfo->id)) }}"
                                        >
                                            <i class="fa fa-times" aria-hidden="true" style="color: #E66D6D; cursor: pointer"></i>
                                        </a>
                                    </div>
                                    <div class="col-md-12 p-2 d-flex flex-wrap justify-content-between">
                                        <div class="col-md-12">
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-md-2 col-sm-12">
                                                        <p class="font-weight-bold text-dark mb-0">
                                                            Test: {{ $test_sn ?? 0 }}</p>
                                                    </div>
                                                    <div class="col-md-10 col-sm-12 show-updated-test-info{{ $testInfo->id }}">
                                                        <p class="font-weight-normal text-dark opacity-8">
                                                            {{ $testInfo->name ?? '' }}
                                                        </p>
                                                        <div class="test-options">
                                                            @foreach($testInfo->optionsInfo ?? [] as $optionKey=>$options)
                                                                @php($option_sn = $optionKey +1)
                                                                <div class="form-check ps-0">
                                                                    <input class="form-check-input" type="radio" name="test_option[{{$testInfo->id}}][]" id="customRadio{{ $options->id }}">
                                                                    <label class="custom-control-label" for="customRadio{{ $options->id }}">{{ $options->name ?? '' }}</label>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</div>
<div id="accordionRental" class="container mt-3 mx-0 px-0"></div>