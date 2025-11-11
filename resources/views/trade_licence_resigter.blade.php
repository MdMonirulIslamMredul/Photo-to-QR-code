<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trade Licence Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" xintegrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Custom style to ensure form looks good -->
    <style>
        body { background-color: #f8f9fa; }
        .card { border: none; border-radius: 1rem; }
        .is-invalid ~ .invalid-feedback { display: block; } /* Ensure feedback displays correctly in this layout */
    </style>
</head>
<body>

    @php
        // FIX: Ensure $licence is defined as an empty object if not passed from the controller (for create forms)
        // This prevents the "Undefined variable $licence" error when opening a new registration form.
        $licence = $licence ?? (object) [];
    @endphp


<!-- Navigation Bar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">Trade Licence Hub</a>

        <div class="d-flex">
            {{-- 1. CHECK IF THE USER IS LOGGED IN --}}
            @auth
                {{-- Show the user's name and logout button --}}
                <span class="navbar-text text-white me-3">
                    Welcome, <strong>{{ Auth::user()->name ?? 'User' }}</strong>!
                </span>
                {{-- Logout Button Form (Using named route) --}}
                <form action="{{ route('logout') }}" method="POST" class="d-inline">
                    @csrf
                    <button type="submit" class="btn btn-danger btn-sm">
                        Logout
                    </button>
                </form>
            @endauth

            {{-- 2. CHECK IF NO USER IS LOGGED IN --}}
            @guest
                <a href="{{ route('login') }}" class="btn btn-light btn-sm me-2">Login</a>
                <a href="{{ route('register') }}" class="btn btn-outline-light btn-sm">Register</a>
            @endguest
        </div>
    </div>
</nav>



    <div class="container my-5">
        <div class="card shadow-lg p-3 p-md-5">
            <h2 class="card-title text-center mb-4 text-primary">Trade Licence Application</h2>

            <!-- Session Flash Message for Success/DB Errors -->
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @if ($errors->has('db_error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ $errors->first('db_error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif


            <form class="row g-3" action="/trade_licence_resigter" method="POST" enctype="multipart/form-data">
                @csrf
                {{-- Add a hidden field for the license ID if it exists (for EDIT functionality) --}}
                @if (isset($licence->id))
                    <input type="hidden" name="licence_id" value="{{ $licence->id }}">
                    @method('PUT')
                @endif

                <h5 class="mt-4 mb-3 text-secondary border-bottom pb-2">Account Creation</h5>

                <!-- Email Address -->
                <div class="col-md-6">
                    <label for="email" class="form-label">Email Address (Unique)</label>
                    {{-- Accessing $licence->email is now safe because $licence is guaranteed to be defined --}}
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email', $licence->email ?? '') }}">
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>


                <h5 class="mt-5 mb-3 text-secondary border-bottom pb-2">Applicant Information</h5>

                <!-- Applicant Name -->
                <div class="col-md-4">
                    <label for="applicant_name" class="form-label">প্রতিষ্ঠানের মালিকের নাম</label>
                    <input type="text" class="form-control @error('applicant_name') is-invalid @enderror" id="applicant_name" name="applicant_name" value="{{ old('applicant_name', $licence->applicant_name ?? '') }}">
                    @error('applicant_name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- NID Number -->
                <div class="col-md-4">
                    <label for="nid_number" class="form-label">এনআইডি/পাসপোর্ট/জন্ম নিব: নং</label>
                    <input type="text" class="form-control @error('nid_number') is-invalid @enderror" id="nid_number" name="nid_number" value="{{ old('nid_number', $licence->nid_number ?? '') }}">
                    @error('nid_number')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Mobile Number -->
                <div class="col-md-4">
                    <label for="mobile_number" class="form-label">ফোন</label>
                    <input type="tel" class="form-control @error('mobile_number') is-invalid @enderror" id="mobile_number" name="mobile_number" value="{{ old('mobile_number', $licence->mobile_number ?? '') }}">
                    @error('mobile_number')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Father's / Husband's Name -->
                <div class="col-md-6">
                    <label for="father_husband_name" class="form-label"> পিতা / স্বামীর নাম</label>
                    <input type="text" class="form-control @error('father_husband_name') is-invalid @enderror" id="father_husband_name" name="father_husband_name" value="{{ old('father_husband_name', $licence->father_husband_name ?? '') }}">
                    @error('father_husband_name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Mother's Name -->
                <div class="col-md-6">
                    <label for="mother_name" class="form-label">মাতার নাম</label>
                    <input type="text" class="form-control @error('mother_name') is-invalid @enderror" id="mother_name" name="mother_name" value="{{ old('mother_name', $licence->mother_name ?? '') }}">
                    @error('mother_name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <h5 class="mt-5 mb-3 text-secondary border-bottom pb-2">Business Information</h5>

                <!-- Business Name -->
                <div class="col-md-6">
                    <label for="business_name" class="form-label">ব্যবসা প্রতিষ্ঠানের নাম</label>
                    <input type="text" class="form-control @error('business_name') is-invalid @enderror" id="business_name" name="business_name" value="{{ old('business_name', $licence->business_name ?? '') }}">
                    @error('business_name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Licence Number -->
                <div class="col-md-6">
                    <label for="licence_number" class="form-label">লাইসেন্স নং (example: TRAD/DNCC/063542/2022 )</label>
                    <input type="text" class="form-control @error('licence_number') is-invalid @enderror" id="licence_number" name="licence_number" value="{{ old('licence_number', $licence->licence_number ?? '') }}">
                    @error('licence_number')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Business Type -->
                <div class="col-md-4">
                    <label for="business_type" class="form-label">ব্যবসার ধরণ</label>
                    <input type="text" class="form-control @error('business_type') is-invalid @enderror" id="business_type" name="business_type" value="{{ old('business_type', $licence->business_type ?? '') }}">
                    @error('business_type')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Business Nature -->
                <div class="col-md-4">
                    <label for="business_nature" class="form-label">ব্যবসার প্রকৃতি</label>
                    <input type="text" class="form-control @error('business_nature') is-invalid @enderror" id="business_nature" name="business_nature" value="{{ old('business_nature', $licence->business_nature ?? '') }}">
                    @error('business_nature')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Business Start Date -->
                <div class="col-md-4">
                    <label for="business_start_date" class="form-label">ব্যবসা শুরুর তারিখ (exmple:৩১/০৮/২০২৪)</label>
                    <input type="text" class="form-control @error('business_start_date') is-invalid @enderror" id="business_start_date" name="business_start_date" value="{{ old('business_start_date', $licence->business_start_date ?? '') }}">
                    @error('business_start_date')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Full Business Address -->
                <div class="col-12">
                    <label for="business_address" class="form-label">প্রতিষ্ঠানের ঠিকানা</label>
                    <input type="text" class="form-control @error('business_address') is-invalid @enderror" id="business_address" name="business_address" placeholder="Holding, Road, Area, Ward No." value="{{ old('business_address', $licence->business_address ?? '') }}">
                    @error('business_address')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Regional Area -->
                <div class="col-md-6">
                    <label for="regional" class="form-label">অঞ্চল / বাজার শাখা</label>
                    <input type="text" class="form-control @error('regional') is-invalid @enderror" id="regional" name="regional" value="{{ old('regional', $licence->regional ?? '') }}">
                    @error('regional')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <!--  Area -->
                <div class="col-md-6">
                    <label for="area" class="form-label">এলাকা</label>
                    <input type="text" class="form-control @error('area') is-invalid @enderror" id="area" name="area" value="{{ old('area', $licence->area ?? '') }}">
                    @error('area')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <!-- Ward No. -->
                <div class="col-md-6">
                    <label for="word_no" class="form-label">ওয়ার্ড / মার্কেট</label>
                    <input type="text" class="form-control @error('word_no') is-invalid @enderror" id="word_no" name="word_no" value="{{ old('word_no', $licence->word_no ?? '') }}">
                    @error('word_no')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <h5 class="mt-5 mb-3 text-secondary border-bottom pb-2">Issuance & Fiscal Details</h5>

                <!-- Issue Date -->
                <div class="col-md-4">
                    <label for="t_issue_date" class="form-label">ইস্যুর তারিখ (exmple:04/07/2024)</label>
                    <input type="text" class="form-control @error('t_issue_date') is-invalid @enderror" id="t_issue_date" name="t_issue_date" value="{{ old('t_issue_date', $licence->t_issue_date ?? '') }}">
                    @error('t_issue_date')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Issue Time -->
                <div class="col-md-4">
                    <label for="t_issue_time" class="form-label">ইস্যুর সময় (exmple:17:54:07)</label>
                    <input type="text" class="form-control @error('t_issue_time') is-invalid @enderror" id="t_issue_time" name="t_issue_time" value="{{ old('t_issue_time', $licence->t_issue_time ?? '') }}">
                    @error('t_issue_time')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Fiscal Year -->
                <div class="col-md-4">
                    <label for="fiscal_year" class="form-label">অর্থ বছর</label>
                    <input type="text" class="form-control @error('fiscal_year') is-invalid @enderror" id="fiscal_year" name="fiscal_year" placeholder="e.g., ২০২৩-২০২৪" value="{{ old('fiscal_year', $licence->fiscal_year ?? '') }}">
                    @error('fiscal_year')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>


                <h5 class="mt-5 mb-3 text-secondary border-bottom pb-2">Present Address</h5>

                <!-- Present Holding No. -->
                <div class="col-md-4">
                    <label for="pres_holding" class="form-label">হোল্ডিং নং </label>
                    <input type="text" class="form-control @error('pres_holding') is-invalid @enderror" id="pres_holding" name="pres_holding" value="{{ old('pres_holding', $licence->pres_holding ?? '') }}">
                    @error('pres_holding')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Present Road/Street -->
                <div class="col-md-4">
                    <label for="pres_road" class="form-label">রোড নং</label>
                    <input type="text" class="form-control @error('pres_road') is-invalid @enderror" id="pres_road" name="pres_road" value="{{ old('pres_road', $licence->pres_road ?? '') }}">
                    @error('pres_road')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Present Village/Area -->
                <div class="col-md-4">
                    <label for="pres_village" class="form-label">গ্রাম / মহল্লা </label>
                    <input type="text" class="form-control @error('pres_village') is-invalid @enderror" id="pres_village" name="pres_village" value="{{ old('pres_village', $licence->pres_village ?? '') }}">
                    @error('pres_village')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Present Postcode -->
                <div class="col-md-4">
                    <label for="pres_postcode" class="form-label">পোস্টকোড</label>
                    <input type="text" class="form-control @error('pres_postcode') is-invalid @enderror" id="pres_postcode" name="pres_postcode" value="{{ old('pres_postcode', $licence->pres_postcode ?? '') }}">
                    @error('pres_postcode')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Present Thana/Upazila -->
                <div class="col-md-4">
                    <label for="pres_thana" class="form-label">থানা</label>
                    <input type="text" class="form-control @error('pres_thana') is-invalid @enderror" id="pres_thana" name="pres_thana" value="{{ old('pres_thana', $licence->pres_thana ?? '') }}">
                    @error('pres_thana')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Present District -->
                <div class="col-md-4">
                    <label for="pres_district" class="form-label">জেলা</label>
                    <input type="text" class="form-control @error('pres_district') is-invalid @enderror" id="pres_district" name="pres_district" value="{{ old('pres_district', $licence->pres_district ?? '') }}">
                    @error('pres_district')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Present Division -->
                <div class="col-12">
                    <label for="pres_division" class="form-label">বিভাগ</label>
                    <input type="text" class="form-control @error('pres_division') is-invalid @enderror" id="pres_division" name="pres_division" value="{{ old('pres_division', $licence->pres_division ?? '') }}">
                    @error('pres_division')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>


                <h5 class="mt-5 mb-3 text-secondary border-bottom pb-2">Permanent Address</h5>

                <div class="col-12 mb-3 form-check">
                    {{-- Checkbox uses null coalescing for both old value and licence value (for edit scenario) --}}
                    <input class="form-check-input" type="checkbox" id="sameAsPresent"
                        name="same_as_present"
                        {{ old('same_as_present', $licence->same_as_present ?? false) ? 'checked' : '' }}>
                    <label class="form-check-label" for="sameAsPresent">Same as Present Address</label>
                </div>

                <!-- Permanent Holding No. -->
                <div class="col-md-4">
                    <label for="perm_holding" class="form-label">হোল্ডিং নং </label>
                    <input type="text" class="form-control @error('perm_holding') is-invalid @enderror" id="perm_holding" name="perm_holding" value="{{ old('perm_holding', $licence->perm_holding ?? '') }}">
                    @error('perm_holding')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Permanent Road/Street -->
                <div class="col-md-4">
                    <label for="perm_road" class="form-label">রোড নং</label>
                    <input type="text" class="form-control @error('perm_road') is-invalid @enderror" id="perm_road" name="perm_road" value="{{ old('perm_road', $licence->perm_road ?? '') }}">
                    @error('perm_road')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Permanent Village/Area -->
                <div class="col-md-4">
                    <label for="perm_village" class="form-label">গ্রাম / মহল্লা </label>
                    <input type="text" class="form-control @error('perm_village') is-invalid @enderror" id="perm_village" name="perm_village" value="{{ old('perm_village', $licence->perm_village ?? '') }}">
                    @error('perm_village')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Permanent Postcode -->
                <div class="col-md-4">
                    <label for="perm_postcode" class="form-label">পোস্টকোড</label>
                    <input type="text" class="form-control @error('perm_postcode') is-invalid @enderror" id="perm_postcode" name="perm_postcode" value="{{ old('perm_postcode', $licence->perm_postcode ?? '') }}">
                    @error('perm_postcode')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Permanent Thana/Upazila -->
                <div class="col-md-4">
                    <label for="perm_thana" class="form-label">থানা</label>
                    <input type="text" class="form-control @error('perm_thana') is-invalid @enderror" id="perm_thana" name="perm_thana" value="{{ old('perm_thana', $licence->perm_thana ?? '') }}">
                    @error('perm_thana')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Permanent District -->
                <div class="col-md-4">
                    <label for="perm_district" class="form-label">জেলা</label>
                    <input type="text" class="form-control @error('perm_district') is-invalid @enderror" id="perm_district" name="perm_district" value="{{ old('perm_district', $licence->perm_district ?? '') }}">
                    @error('perm_district')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Permanent Division -->
                <div class="col-12">
                    <label for="perm_division" class="form-label">বিভাগ</label>
                    <input type="text" class="form-control @error('perm_division') is-invalid @enderror" id="perm_division" name="perm_division" value="{{ old('perm_division', $licence->perm_division ?? '') }}">
                    @error('perm_division')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>


                <h5 class="mt-5 mb-3 text-secondary border-bottom pb-2">Documents</h5>

                <!-- Applicant Image Upload -->
                <div class="col-md-12">
                    <label for="applicant_image" class="form-label">Upload Passport Size Photo</label>
                    <input class="form-control @error('applicant_image') is-invalid @enderror" type="file" id="applicant_image" name="applicant_image" accept="image/*">
                    @error('applicant_image')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>


                <div class="col-12 mt-4 text-center">
                    <button type="submit" class="btn btn-primary btn-lg px-5">
                        @if (isset($licence->id))
                            Update Application
                        @else
                            Submit Application
                        @endif
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" xintegrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
        // Optional JavaScript to copy Present Address to Permanent Address
        document.getElementById('sameAsPresent').addEventListener('change', function() {
            const isChecked = this.checked;
            const fields = ['holding', 'road', 'village', 'postcode', 'thana', 'district', 'division'];

            fields.forEach(field => {
                const presField = document.getElementById(`pres_${field}`);
                const permField = document.getElementById(`perm_${field}`);
                // Safely get the value, checking if the element exists
                const presValue = presField ? presField.value : '';

                if (isChecked) {
                    permField.value = presValue;
                    permField.setAttribute('readonly', true);
                } else {
                    permField.removeAttribute('readonly');
                    // On uncheck, only clear the permanent field if it was auto-populated with the present address value
                    if (permField.value === presValue) {
                        permField.value = '';
                    }
                }
            });
        });

        // Ensure form values are copied immediately on page load if the checkbox was previously checked (due to old() or database value)
        const sameAsPresent = document.getElementById('sameAsPresent');
        if (sameAsPresent.checked) {
            // Trigger the change event on load to correctly populate permanent fields and set them to readonly
            sameAsPresent.dispatchEvent(new Event('change'));
        }
    </script>
</body>
</html>
