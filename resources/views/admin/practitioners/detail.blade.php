@extends("admin.layout.master")
@section('title')
    Veterinary Practitioner Detail
@endsection
@section('type')
    Admin
@endsection
@section('breadcrumb')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 ">
            <li class="breadcrumb-item text-sm">
                <a class="opacity-7 text-dark" href="{{ route('admin.veterinary.practitioners') }}">
                    <img src="{{ asset('portal/assets/img/Veterinary Practitioners gray.png') }}" alt="icon" class="me-1" />
                    Veterinary Practitioners
                </a>
            </li>
            <li class="breadcrumb-item text-sm mx-2 text-dark active" aria-current="page">{{ $practitioner->name ?? '' }}</li>
        </ol>
    </nav>
@endsection
@section('style')
@endsection

@section('content')
    <div class="container-fluid py-2">
        <div class="card p-3 ">
            <div class="d-flex ">
                <div style="max-width: 100px;"> <img src="{{ $practitioner?->getUserPic() ?? '' }}" alt="icon" class="w-70" style="border-radius: 100px;" /></div>
                <div class=" mt-3 ">
                    <div class="d-flex flex-wrap">
                        <h6>Ryan Holland</h6>
                        <h6 class="ms-md-3">ID: <strong class="text-info">P-{{ $practitioner->id ?? '' }}</strong></h6>
                    </div>
                    <p class="text-sm">Veterinary Practitioners</p>
                </div>
            </div>

        </div>
        <div class="card p-3 mt-3" id="Divone">
            <div class="col-md-12 d-flex justify-content-between">
                <div class="col-md-6 d-flex">
                    <h5>Details</h5>
                </div>

            </div>
            <div class="row">

                <div class="col-md-12 mt-3 d-flex flex-wrap justify-content-between">

                    <div class="col-md-6  ">
                        <p class="font-weight-bold text-dark mb-0">
                            Email
                        </p>
                        <p class="font-weight-normal text-dark opacity-8">
                            {{ $practitioner->email ?? '' }}
                        </p>

                    </div>
                    <div class="col-md-6 ">
                        <p class="font-weight-bold text-dark mb-0">
                            Patient Count
                        </p>
                        <p class="font-weight-normal text-dark opacity-8">
                            {{ $practitioner->practitionerPatientInfo?->count() ?? 0 }}
                        </p>
                    </div>

                </div>
                <div class="col-md-12 mt-3 d-flex flex-wrap justify-content-between">

                    <div class="col-md-6  ">
                        <p class="font-weight-bold text-dark mb-0">
                            Vet License Number
                        </p>
                        <p class="font-weight-normal text-dark opacity-8">
                            {{ $practitioner->userInfo?->vet_license ?? '' }}
                        </p>

                    </div>
                    <div class="col-md-6 ">
                        <p class="font-weight-bold text-dark mb-0">
                            Contact Number Type (Mobile Number)
                        </p>
                        <p class="font-weight-normal text-dark opacity-8">
                            {{ $practitioner->userInfo?->contact_type ?? '' }} ({{ $practitioner->userInfo?->contact_no ?? '' }})
                        </p>
                    </div>

                </div>
                <h5 class="mt-5">Address Detail</h5>
                <div class="col-md-12 mt-3 d-flex flex-wrap justify-content-between">

                    <div class="col-md-6  ">
                        <p class="font-weight-bold text-dark mb-0">
                            Main street
                        </p>
                        <p class="font-weight-normal text-dark opacity-8">
                            {{ $practitioner->userInfo?->main_street ?? '' }}
                        </p>

                    </div>
                    <div class="col-md-6 ">
                        <p class="font-weight-bold text-dark mb-0">
                            City
                        </p>
                        <p class="font-weight-normal text-dark opacity-8">
                            {{ $practitioner->userInfo?->city ?? '' }}
                        </p>
                    </div>

                </div>
                <div class="col-md-12 mt-3 d-flex flex-wrap justify-content-between">
                    <div class="col-md-6  ">
                        <p class="font-weight-bold text-dark mb-0">
                            State/Country
                        </p>
                        <p class="font-weight-normal text-dark opacity-8">
                            {{ $practitioner->userInfo?->state ?? '' }}
                        </p>

                    </div>
                    <div class="col-md-6 ">
                        <p class="font-weight-bold text-dark mb-0">
                            Zip Code
                        </p>
                        <p class="font-weight-normal text-dark opacity-8">
                            {{ $practitioner->userInfo?->zip_code ?? '' }}
                        </p>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')

@endsection
