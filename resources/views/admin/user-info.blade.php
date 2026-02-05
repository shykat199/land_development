@extends('admin.layout.master')
@section('title','Update User Info')
@push('admin.style')

@endpush

@section('admin-content')

        <div class="row justify-content-center">
            <div class="col-12 col-md-12 col-lg-12">
                <form method="post" action="{{route('admin.user.store-info',$user->id)}}">
                    @csrf

                    <div class="card shadow-sm">
                        <div class="card-body">

                            <h4 class="card-title mb-4">
                                জমির বিবরণ
                            </h4>

                            <div id="land-section">

                                @forelse($user->userLandInfo as $index => $land)
                                    <div class="row land-row mb-3">

                                        <div class="col-md-3 mb-2">
                                            <label>দাগ নং</label>
                                            <input type="text"
                                                   name="land[{{ $index }}][dag_no]"
                                                   value="{{ $land->dag_no }}"
                                                   class="form-control">
                                        </div>

                                        <div class="col-md-3 mb-2">
                                            <label>জমির শ্রেণী</label>
                                            <input type="text"
                                                   name="land[{{ $index }}][land_class]"
                                                   value="{{ $land->land_class }}"
                                                   class="form-control">
                                        </div>

                                        <div class="col-md-3 mb-2">
                                            <label>জমির পরিমাণ (শতক)</label>
                                            <input type="text"
                                                   name="land[{{ $index }}][land_area]"
                                                   value="{{ $land->land_area }}"
                                                   class="form-control">
                                        </div>

                                        <div class="col-md-2 mb-2">
                                            <label>মোট জমি</label>
                                            <input type="number"
                                                   step="any"
                                                   name="land[{{ $index }}][total_land]"
                                                   value="{{ $land->total_land }}"
                                                   class="form-control total-land">
                                        </div>

                                        <div class="col-md-1 d-flex align-items-end">
                                            <button type="button" class="btn btn-danger btn-sm remove-land">✕</button>
                                        </div>

                                    </div>
                                @empty

                                    <div class="row land-row mb-3">

                                        <div class="col-md-3 mb-2">
                                            <label>দাগ নং</label>
                                            <input type="text" name="land[0][dag_no]" class="form-control">
                                        </div>

                                        <div class="col-md-3 mb-2">
                                            <label>জমির শ্রেণী</label>
                                            <input type="text" name="land[0][land_class]" class="form-control">
                                        </div>

                                        <div class="col-md-3 mb-2">
                                            <label>জমির পরিমাণ (শতক)</label>
                                            <input type="text" name="land[0][land_area]" class="form-control">
                                        </div>

                                        <div class="col-md-2 mb-2">
                                            <label>মোট জমি</label>
                                            <input type="number" step="any" name="land[0][total_land]" class="form-control total-land">
                                        </div>

                                    </div>
                                @endforelse

                            </div>

                            @php
                                $grandTotalLand = $user->userLandInfo->sum('total_land');
                            @endphp

                            <div class="row mt-3 mb-4">
                                <div class="col-md-4 ms-auto">
                                    <label class="fw-bold">সর্বমোট জমি (শতক)</label>
                                    <input type="text" id="grand-total-land" class="form-control fw-bold text-end" readonly value="{{ number_format($grandTotalLand, 2) }}">
                                </div>
                            </div>



                            <button type="button" class="btn btn-outline-primary btn-sm" id="add-land">
                                + আরও জমি যোগ করুন
                            </button>

                        </div>
                    </div>

                    <div class="card shadow-sm">
                        <div class="card-body">

                            <h4 class="card-title mb-4">
                                আদায়ের বিবরণ
                            </h4>

                            <div id="revenue-section">

                                @forelse($user->userRevenueInfo as $index => $rev)
                                    <div class="row revenue-row p-3 mb-3 border rounded">

                                        <div class="col-md-3 mb-2">
                                            <label>পূর্বের ৩ বছরের বকেয়া</label>
                                            <input type="text"
                                                   name="revenue[{{ $index }}][previous_3_years_arrears]"
                                                   value="{{ $rev->previous_3_years_arrears }}"
                                                   class="form-control">
                                        </div>

                                        <div class="col-md-3 mb-2">
                                            <label>গত ৩ বছরের বকেয়া</label>
                                            <input type="text"
                                                   name="revenue[{{ $index }}][arrears_of_last_3_years]"
                                                   value="{{ $rev->arrears_of_last_3_years }}"
                                                   class="form-control">
                                        </div>

                                        <div class="col-md-3 mb-2">
                                            <label>চলতি বছরের দাবি ও সারচার্জ</label>
                                            <input type="text"
                                                   name="revenue[{{ $index }}][current_year_demand_and_surcharge]"
                                                   value="{{ $rev->current_year_demand_and_surcharge }}"
                                                   class="form-control">
                                        </div>

                                        <div class="col-md-2 mb-2">
                                            <label>মোট দাবি</label>
                                            <input type="text"
                                                   name="revenue[{{ $index }}][total_demand]"
                                                   value="{{ $rev->total_demand }}"
                                                   class="form-control">
                                        </div>

                                        <div class="col-md-1 d-flex align-items-end">
                                            <button type="button" class="btn btn-danger btn-sm remove-revenue">✕</button>
                                        </div>

                                        <div class="col-md-3 mt-2">
                                            <label>মোট বকেয়া</label>
                                            <input type="text"
                                                   name="revenue[{{ $index }}][total_arrear]"
                                                   value="{{ $rev->total_arrear }}"
                                                   class="form-control">
                                        </div>

                                        <div class="col-md-3 mt-2">
                                            <label>মোট আদায়</label>
                                            <input type="text"
                                                   name="revenue[{{ $index }}][total_collection]"
                                                   value="{{ $rev->total_collection }}"
                                                   class="form-control">
                                        </div>

                                        <div class="col-md-3 mt-2">
                                            <label>মোট অবশিষ্ট</label>
                                            <input type="text"
                                                   name="revenue[{{ $index }}][total_balance]"
                                                   value="{{ $rev->total_balance }}"
                                                   class="form-control">
                                        </div>

                                        <div class="col-md-3 mt-2">
                                            <label>মন্তব্য</label>
                                            <input type="text"
                                                   name="revenue[{{ $index }}][remarks]"
                                                   value="{{ $rev->remarks }}"
                                                   class="form-control">
                                        </div>

                                    </div>
                                @empty

                                    <div class="row revenue-row p-3 mb-3 border rounded">

                                        <div class="col-md-3 mb-2">
                                            <label>পূর্বের ৩ বছরের বকেয়া</label>
                                            <input type="text"
                                                   name="revenue[0][previous_3_years_arrears]"
                                                   class="form-control"
                                                   placeholder="পূর্বের ৩ বছরের বকেয়া">
                                        </div>

                                        <div class="col-md-3 mb-2">
                                            <label>গত ৩ বছরের বকেয়া</label>
                                            <input type="text"
                                                   name="revenue[0][arrears_of_last_3_years]"
                                                   class="form-control"
                                                   placeholder="গত ৩ বছরের বকেয়া">
                                        </div>

                                        <div class="col-md-3 mb-2">
                                            <label>চলতি বছরের দাবি ও সারচার্জ</label>
                                            <input type="text"
                                                   name="revenue[0][current_year_demand_and_surcharge]"
                                                   class="form-control"
                                                   placeholder="চলতি বছরের দাবি ও সারচার্জ">
                                        </div>

                                        <div class="col-md-2 mb-2">
                                            <label>মোট দাবি</label>
                                            <input type="text"
                                                   name="revenue[0][total_demand]"
                                                   class="form-control"
                                                   placeholder="মোট দাবি">
                                        </div>

                                        <div class="col-md-1 d-flex align-items-end">
                                            <button type="button" class="btn btn-danger btn-sm remove-revenue">✕</button>
                                        </div>

                                        <div class="col-md-3 mt-2">
                                            <label>মোট বকেয়া</label>
                                            <input type="text"
                                                   name="revenue[0][total_arrear]"
                                                   class="form-control"
                                                   placeholder="মোট বকেয়া">
                                        </div>

                                        <div class="col-md-3 mt-2">
                                            <label>মোট আদায়</label>
                                            <input type="text"
                                                   name="revenue[0][total_collection]"
                                                   class="form-control"
                                                   placeholder="মোট আদায়">
                                        </div>

                                        <div class="col-md-3 mt-2">
                                            <label>মোট অবশিষ্ট</label>
                                            <input type="text"
                                                   name="revenue[0][total_balance]"
                                                   class="form-control"
                                                   placeholder="মোট অবশিষ্ট">
                                        </div>

                                        <div class="col-md-3 mt-2">
                                            <label>মন্তব্য</label>
                                            <input type="text"
                                                   name="revenue[0][remarks]"
                                                   class="form-control"
                                                   placeholder="মন্তব্য">
                                        </div>

                                    </div>

                                @endforelse

                            </div>

                            <button type="button" class="btn btn-outline-primary btn-sm" id="add-revenue">
                                + আরও আদায় যোগ করুন
                            </button>

                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary w-100">
                        Update <i class="fa fa-save"></i>
                    </button>
                </form>

            </div>
        </div>

@endsection

@push('admin.script')

    <script>
        let landIndex = 1;

        // ADD LAND ROW
        document.getElementById('add-land').addEventListener('click', function () {

            let landTemplate = `
        <div class="row land-row mb-3">

            <div class="col-md-3 mb-2">
                <label>দাগ নং</label>
                <input type="text" placeholder="দাগ নং" name="land[${landIndex}][dag_no]" class="form-control">
            </div>

            <div class="col-md-3 mb-2">
                <label>জমির শ্রেণী</label>
                <input type="text" placeholder="জমির শ্রেণী" name="land[${landIndex}][land_class]" class="form-control">
            </div>

            <div class="col-md-3 mb-2">
                <label>জমির পরিমাণ (শতক)</label>
                <input type="text" placeholder="জমির পরিমাণ (শতক)" name="land[${landIndex}][land_area]" class="form-control">
            </div>

            <div class="col-md-2 mb-2">
                <label>মোট জমি</label>
                <input type="text" placeholder="মোট জমি" name="land[${landIndex}][total_land]" class="form-control total-land">
            </div>

            <div class="col-md-1 d-flex align-items-end">
                <button type="button" class="btn btn-danger btn-sm remove-land">✕</button>
            </div>

        </div>
    `;

            document.getElementById('land-section')
                .insertAdjacentHTML('beforeend', landTemplate);

            landIndex++;
        });

        // REMOVE LAND ROW
        document.addEventListener('click', function (e) {
            if (e.target.classList.contains('remove-land')) {
                e.target.closest('.land-row').remove();
            }
        });

        function calculateTotalLand() {
            let total = 0;

            document.querySelectorAll('.total-land').forEach(input => {
                let value = parseFloat(input.value);
                if (!isNaN(value)) {
                    total += value;
                }
            });

            document.getElementById('grand-total-land').value = total.toFixed(2);
        }

        // 🔁 Input change (typing, paste, etc.)
        document.addEventListener('input', function (e) {
            if (e.target.classList.contains('total-land')) {
                calculateTotalLand();
            }
        });

        // ➕ After adding new land row (call this)
        document.getElementById('add-land').addEventListener('click', function () {
            setTimeout(calculateTotalLand, 50);
        });

        // ❌ After removing row
        document.addEventListener('click', function (e) {
            if (e.target.classList.contains('remove-land')) {
                e.target.closest('.land-row').remove();
                calculateTotalLand();
            }
        });
    </script>


    <script>
        let revenueIndex = 1;

        // ADD REVENUE ROW
        document.getElementById('add-revenue').addEventListener('click', function () {

            let revenueTemplate = `
        <div class="row revenue-row p-3 mb-3 border rounded">

            <div class="col-md-3 mb-2">
                <label>পূর্বের ৩ বছরের বকেয়া</label>
                <input type="text" placeholder="পূর্বের ৩ বছরের বকেয়া"
                       name="revenue[${revenueIndex}][previous_3_years_arrears]"
                       class="form-control">
            </div>

            <div class="col-md-3 mb-2">
                <label>গত ৩ বছরের বকেয়া</label>
                <input type="text" placeholder="গত ৩ বছরের বকেয়া"
                       name="revenue[${revenueIndex}][arrears_of_last_3_years]"
                       class="form-control">
            </div>

            <div class="col-md-3 mb-2">
                <label>চলতি বছরের দাবি ও সারচার্জ</label>
                <input type="text" placeholder="চলতি বছরের দাবি ও সারচার্জ"
                       name="revenue[${revenueIndex}][current_year_demand_and_surcharge]"
                       class="form-control">
            </div>

            <div class="col-md-2 mb-2">
                <label>মোট দাবি</label>
                <input type="text" placeholder="মোট দাবি"
                       name="revenue[${revenueIndex}][total_demand]"
                       class="form-control">
            </div>

            <div class="col-md-1 d-flex align-items-end">
                <button type="button" class="btn btn-danger btn-sm remove-revenue">✕</button>
            </div>

            <div class="col-md-3 mt-2">
                <label>মোট বকেয়া</label>
                <input type="text" placeholder="মোট বকেয়া"
                       name="revenue[${revenueIndex}][total_arrear]"
                       class="form-control">
            </div>

            <div class="col-md-3 mt-2">
                <label>মোট আদায়</label>
                <input type="text" placeholder="মোট আদায়"
                       name="revenue[${revenueIndex}][total_collection]"
                       class="form-control">
            </div>

            <div class="col-md-3 mt-2">
                <label>মোট অবশিষ্ট</label>
                <input type="text" placeholder="মোট অবশিষ্ট"
                       name="revenue[${revenueIndex}][total_balance]"
                       class="form-control">
            </div>

            <div class="col-md-3 mt-2">
                <label>মন্তব্য</label>
                <input type="text" placeholder="মন্তব্য"
                       name="revenue[${revenueIndex}][remarks]"
                       class="form-control">
            </div>

        </div>
    `;

            document.getElementById('revenue-section')
                .insertAdjacentHTML('beforeend', revenueTemplate);

            revenueIndex++;
        });

        // REMOVE REVENUE ROW
        document.addEventListener('click', function (e) {
            if (e.target.classList.contains('remove-revenue')) {
                e.target.closest('.revenue-row').remove();
            }
        });
    </script>


@endpush
