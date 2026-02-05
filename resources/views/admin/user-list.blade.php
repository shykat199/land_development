@extends('admin.layout.master')
@section('title','University')
@push('admin.style')
    <style>

        .filter-section {
            background: white;
            padding: 1.5rem;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
            border: 1px solid #e2e8f0;
            margin-bottom: 1.5rem;
        }

        .search-container {
            margin-bottom: 1.5rem;
            position: relative;
        }

        .search-icon {
            position: absolute;
            left: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: #94a3b8;
            width: 20px;
            height: 20px;
        }

        .search-input {
            width: 100%;
            padding: 0.875rem 1rem 0.875rem 3rem;
            border: 1px solid #cbd5e1;
            border-radius: 8px;
            font-size: 1rem;
            transition: all 0.3s;
        }

        .search-input:focus {
            outline: none;
            border-color: #3b82f6;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
        }

        .filters-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1rem;
        }

        .filter-group label {
            display: block;
            font-size: 0.875rem;
            font-weight: 600;
            color: #475569;
            margin-bottom: 0.5rem;
        }

        .filter-select {
            width: 100%;
            padding: 0.625rem 1rem;
            border: 1px solid #cbd5e1;
            border-radius: 8px;
            font-size: 0.95rem;
            background: white;
            cursor: pointer;
            transition: all 0.3s;
        }

        .filter-select:focus {
            outline: none;
            border-color: #3b82f6;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
        }

        .results-count {
            margin-bottom: 1rem;
            color: #64748b;
            font-size: 0.95rem;
        }

        .table-container {
            background: white;
            border-radius: 12px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
            border: 1px solid #e2e8f0;
            overflow: hidden;
        }

        .table-wrapper {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        thead {
            background: #f8fafc;
            border-bottom: 1px solid #e2e8f0;
        }

        th {
            padding: 1rem 1.5rem;
            text-align: left;
            font-size: 0.75rem;
            font-weight: 600;
            color: #475569;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }

        tbody tr {
            border-bottom: 1px solid #e2e8f0;
            transition: background-color 0.2s;
        }

        tbody tr:hover {
            background: #f8fafc;
        }

        tbody tr:last-child {
            border-bottom: none;
        }

        td {
            padding: 1rem 1.5rem;
            color: #475569;
            font-size: 0.875rem;
        }

        td:first-child {
            font-weight: 500;
            color: #1e293b;
        }

        .pagination {
            margin-top: 1.5rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .page-info {
            color: #64748b;
            font-size: 0.875rem;
        }

        .pagination-buttons {
            display: flex;
            gap: 0.5rem;
        }

        .tbl-btn {
            padding: 0.625rem 1rem;
            border: 1px solid #cbd5e1;
            border-radius: 8px;
            background: white;
            cursor: pointer;
            font-size: 0.875rem;
            transition: all 0.2s;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .tbl-btn:hover:not(:disabled) {
            background: #f8fafc;
        }

        .tbl-btn:disabled {
            opacity: 0.5;
            cursor: not-allowed;
        }

        .chevron {
            width: 16px;
            height: 16px;
        }

        @media (max-width: 768px) {

            .filters-grid {
                grid-template-columns: 1fr;
            }

            th, td {
                padding: 0.75rem 1rem;
            }
        }

        .switch {
            position: relative;
            display: inline-block;
            width: 46px;
            height: 24px;
        }

        .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #dc3545;
            transition: .4s;
            border-radius: 24px;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 18px;
            width: 18px;
            left: 3px;
            bottom: 3px;
            background-color: white;
            transition: .4s;
            border-radius: 50%;
        }

        input:checked + .slider {
            background-color: #28a745;
        }

        input:checked + .slider:before {
            transform: translateX(22px);
        }

        .slider.round {
            border-radius: 34px;
        }

        .swal-wide-toast {
            width: 350px !important;   /* increase width */
            padding: 15px !important;  /* optional – for better spacing */
            font-size: 16px;           /* optional – cleaner text */
        }
    </style>

@endpush

@section('admin-content')

    <nav class="page-breadcrumb d-flex justify-content-between align-items-center mb-2">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{route('admin.user.list')}}">University</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">University list</li>
        </ol>

        @can('admin.create-country')
            <a href="" class="btn btn-primary">
                + Create New University
            </a>
        @endcan
    </nav>

    <!-- Filter Section -->
    <div class="filter-section">
        <!-- Search Bar -->
        <div class="search-container">
            <svg class="search-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
            </svg>
            <input type="text" id="searchInput" class="search-input" placeholder="Search universities by name or university id...">
        </div>

        <!-- Dropdown Filters -->
        <div class="filters-grid">

            <div class="filter-group">
                <label for="rankingFilter">Select Order</label>
                <select id="university_order" class="form-control">
                    <option value="">Select Name Order</option>
                    <option value="ace">A to Z</option>
                    <option value="dec">Z to A</option>
                </select>
            </div>

        </div>

        <div class="filter-actions mt-3 d-flex justify-content-end gap-2">

            <button id="searchBtn" class="btn btn-primary px-4">
                <i class="fa fa-search me-1"></i> Search
            </button>
            <button id="clearBtn" class="btn btn-secondary px-4">
                <i class="fa fa-times me-1"></i> Clear
            </button>
        </div>
    </div>

    <div class="results-count" id="resultsCount">
        Loading...
    </div>

    <!-- Table -->
    <div class="table-container">
        <div class="table-wrapper position-relative">
            <!-- Loader -->


            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>#User Id</th>
                    <th>User Code</th>
                    <th>User Name</th>
                    <th>User Email</th>
                    <th>User Role</th>
                    <th>Created At</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody id="tableBody">

                </tbody>
            </table>
        </div>
    </div>

    <!-- Pagination -->
    <div class="pagination d-flex justify-content-between align-items-center mt-2">
        <div class="page-info" id="pageInfo">Page 1 of 1</div>
        <div class="pagination-buttons">
            <button class="tbl-btn" id="prevBtn">Previous</button>
            <button class="tbl-btn" id="nextBtn">Next</button>
        </div>
    </div>

@endsection

@push('admin.script')
    <script>
        $(document).ready(function () {
            const perPage = 10;
            let currentPage = getParam('page') || 1;
            let totalPages = 1;

            function getParam(key) {
                const params = new URLSearchParams(window.location.search);
                return params.get(key);
            }

            function updateUrl(params) {
                const url = new URL(window.location);
                Object.keys(params).forEach(key => {
                    if (params[key]) url.searchParams.set(key, params[key]);
                    else url.searchParams.delete(key);
                });
                window.history.pushState(params, '', url);
            }

            function loadTable(page = 1) {
                $('#tableLoader').removeClass('d-none');
                $('#tableBody').html('<tr><td colspan="8" class="text-center">Loading...</td></tr>');

                const filters = {
                    search: $('#searchInput').val(),
                    country: $('#country_id').val(),
                    city: $('#city_id').val(),
                    type: $('#university_type').val(),
                    order: $('#university_order').val(),
                    status: $('#university_status').val(),
                    page,
                    per_page: perPage
                };

                // update URL with filters
                updateUrl(filters);

                $.ajax({
                    url: "{{ route('admin.user.list') }}",
                    type: "GET",
                    data: filters,
                    dataType: "json",
                    success: function (response) {
                        const tableBody = $('#tableBody');
                        tableBody.empty();

                        if (response.data && response.data.length > 0) {
                            response.data.forEach(function (u) {
                                const badgeColor =
                                    u.role === 1
                                        ? 'bg-success'
                                        : u.role === 2
                                            ? 'bg-primary'
                                            : 'bg-secondary';

                                const userRole =
                                    u.role === 1
                                        ? 'Admin'
                                        : u.role === 2
                                            ? 'User'
                                            : 'Unknown';

                                const row = `
                                <tr>
                                <td>${u.id}</td>
                                <td>${u.user_code}</td>
                                <td>${u.name}</td>
                                <td>${u.email}</td>
                                <td><span class="badge ${badgeColor} text-white">${userRole}</span></td>
                                <td>${u.created_at}</td>
                                <td>
                                    <a href="${u.user_info_url}" class="btn btn-sm btn-primary" title="User Info"><i class="fa fa-folder"></i></a>
                                    <a href="${u.edit_user_url}" class="btn btn-sm btn-warning" title="User Edit"><i class="fa fa-pen"></i></a>
                                    <a href="javascript:void(0);" onclick="showSwal('passing-parameter-execute-cancel','${u.delete_url}}')" class="btn btn-sm btn-danger" title="Delete User"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>`;
                                tableBody.append(row);
                            });

                            // update pagination info
                            currentPage = page;
                            totalPages = Math.ceil(response.total / perPage);
                            const start = (page - 1) * perPage + 1;
                            const end = start + response.data.length - 1;

                            $('#resultsCount').text(`Showing ${start}-${end} of ${response.total} universities`);
                            $('#pageInfo').text(`Page ${currentPage} of ${totalPages}`);
                            $('#prevBtn').prop('disabled', currentPage === 1);
                            $('#nextBtn').prop('disabled', currentPage === totalPages);
                        } else {
                            tableBody.html('<tr><td colspan="8" class="text-center">No data found</td></tr>');
                            $('#resultsCount').text('No results');
                            $('#pageInfo').text('Page 0 of 0');
                            $('#prevBtn, #nextBtn').prop('disabled', true);
                        }

                        $('#tableLoader').addClass('d-none');
                    },
                    error: function () {
                        $('#tableBody').html('<tr><td colspan="8" class="text-center text-danger">Error loading data</td></tr>');
                        $('#tableLoader').addClass('d-none');
                    }
                });


                $(function() {
                    showSwal = function(type,url) {
                        'use strict';
                        if (type === 'passing-parameter-execute-cancel') {
                            const swalWithBootstrapButtons = Swal.mixin({
                                customClass: {
                                    confirmButton: 'btn btn-success',
                                    cancelButton: 'btn btn-danger me-2'
                                },
                                buttonsStyling: false,
                            })

                            swalWithBootstrapButtons.fire({
                                title: 'Are you sure?',
                                html: '<p style="color:#dc3545; font-size:18px; font-weight:600; text-align:center;">This action cannot be undone and will permanently delete all related data!!!</p>', icon: 'warning',
                                showCancelButton: true,
                                confirmButtonClass: 'me-2',
                                confirmButtonText: 'Yes, delete it!',
                                cancelButtonText: 'No, cancel!',
                                reverseButtons: true
                            }).then((result) => {
                                if (result.value) {

                                    window.location.href = url;

                                } else if (
                                    result.dismiss === Swal.DismissReason.cancel
                                ) {
                                    swalWithBootstrapButtons.fire(
                                        'Cancelled',
                                        'Your imaginary file is safe :)',
                                        'error'
                                    )
                                }
                            })
                        }
                    }

                });
            }

            $('#prevBtn').click(() => {
                if (currentPage > 1) {
                    loadTable(currentPage - 1)
                }
            });

            $('#nextBtn').click(() => {
                if (currentPage < totalPages) {
                    loadTable(currentPage + 1)
                }
            });

            $('#searchBtn').click(function () {
                loadTable(1);
            });

            $('#clearBtn').click(function () {
                $('#searchInput').val('');
                $('#country_id').val('').trigger('change.select2');
                $('#city_id').val('').trigger('change.select2');
                $('#university_type').val('').trigger('change.select2');
                $('#university_order').val('').trigger('change.select2');
                loadTable(1);
            });

            window.onpopstate = function (event) {
                if (event.state) {
                    $('#searchInput').val(event.state.search || '');
                    $('#country_id').val(event.state.country || '');
                    $('#city_id').val(event.state.city || '');
                    $('#university_type').val(event.state.type || '');
                    $('#university_order').val(event.state.order || '');
                    loadTable(event.state.page || 1);
                } else {
                    loadTable(1);
                }
            };

            $('#searchInput').val(getParam('search') || '');
            $('#country_id').val(getParam('country') || '');
            $('#city_id').val(getParam('city') || '');
            $('#university_type').val(getParam('type') || '');
            $('#university_order').val(getParam('order') || '');
            loadTable(currentPage);


            $(document).on('change', '.status-toggle', function () {
                let toggle = $(this);
                let url = toggle.data('url');
                let newStatus = toggle.is(':checked') ? 1 : 0;

                $.ajax({
                    url: url,
                    method: "POST",
                    data: {
                        status: newStatus,
                        _token: $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function (res) {
                        Swal.fire({
                            toast: true,
                            position: 'top-end',
                            icon: 'success',
                            title: res.message || 'Status updated!',
                            showConfirmButton: false,
                            timer: 1800,
                            customClass: {
                                popup: 'swal-wide-toast'
                            }
                        });

                    },
                    error: function () {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Failed to update status!'
                        });

                        toggle.prop('checked', !newStatus);
                    }
                });
            });

            $(document).on('change', '.featured-toggle', function () {
                let toggle = $(this);
                let url = toggle.data('url');
                let newStatus = toggle.is(':checked') ? 1 : 0;

                $.ajax({
                    url: url,
                    method: "POST",
                    data: {
                        featured: newStatus,
                        _token: $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function (res) {
                        Swal.fire({
                            toast: true,
                            position: 'top-end',
                            icon: 'success',
                            title: res.message || 'Featured updated!',
                            showConfirmButton: false,
                            timer: 1800,
                            customClass: {
                                popup: 'swal-wide-toast'
                            }
                        });

                    },
                    error: function () {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Failed to update status!'
                        });

                        toggle.prop('checked', !newStatus);
                    }
                });
            });

            $(document).on('change', '.popular-toggle', function () {
                let toggle = $(this);
                let url = toggle.data('url');
                let newStatus = toggle.is(':checked') ? 1 : 0;

                $.ajax({
                    url: url,
                    method: "POST",
                    data: {
                        popular: newStatus,
                        _token: $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function (res) {
                        Swal.fire({
                            toast: true,
                            position: 'top-end',
                            icon: 'success',
                            title: res.message || 'Popular updated!',
                            showConfirmButton: false,
                            timer: 1800,
                            customClass: {
                                popup: 'swal-wide-toast'
                            }
                        });

                    },
                    error: function () {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Failed to update status!'
                        });

                        toggle.prop('checked', !newStatus);
                    }
                });
            });

        });
    </script>

@endpush
