<?php

include '../db.php';
error_reporting(0);
$role = $_SESSION['role'];
$grant_user = $_SESSION['grant_user'];
$user_id = $_SESSION['userid'];

if (!isset($_SESSION['userid'])) {
    header("Location: index");
}


function getage($ymd, $dateofbirth)
{
    $diff = date_diff(date_create($dateofbirth), date_create($ymd));
    return $diff->format('%y yrs');
}


function get_master($id_name, $table, $column_name, $selected_value = '', $front_name = '', $multi_select = '')
{
    global $conn;
?>
    <select id="<?php echo htmlspecialchars($id_name, ENT_QUOTES); ?>"
        name="<?php echo htmlspecialchars($id_name, ENT_QUOTES); ?>" class="form-control select-2"
        <?php echo $multi_select; ?>>
        <option value=''><?php echo htmlspecialchars($front_name, ENT_QUOTES); ?></option>
        <?php
        $sql = "SELECT `id`, `$column_name` FROM `$table` WHERE `is_active` = 0";
        $res = mysqli_query($conn, $sql);
        while ($data = mysqli_fetch_assoc($res)) {
        ?>
            <option value="<?php echo htmlspecialchars($data['id'], ENT_QUOTES); ?>"
                <?php echo ($data['id'] == $selected_value) ? 'selected' : ''; ?>>
                <?php echo htmlspecialchars($data[$column_name], ENT_QUOTES); ?>
            </option>
        <?php } ?>
    </select>
<?php
}


?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="" />
    <meta name="author" content="" />
    <meta name="robots" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="UK" />
    <meta property="og:title" content="UK" />
    <meta property="og:description" content="UK" />
    <meta name="format-detection" content="telephone=no">
    <title>UK - Payment List</title>
    <link rel="shortcut icon" type="image/png" href="images/favicon.png" />
    <link href="./vendor/jquery-nice-select/css/nice-select.css" rel="stylesheet">
    <link href="./vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./vendor/select2/css/select2.min.css">
    <link href="./css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <style type="text/css">
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            text-align: left;
            padding: 8px;
            border: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

        input[type="text"],
        input[type="date"] {
            width: 100%;
            padding: 6px;
            box-sizing: border-box;
            border: 1px solid #ccc;
        }

        .select2-container--default .select2-selection--single {
            border-radius: 5px;
        }

        .select2-container .select2-selection--multiple {
            min-height: 2.5rem;
            color: #393939;
            border-radius: 5px !important;
            border: 0.0625rem solid #c8c8c8 !important;
        }

        /* Pagination Container */
        #pagination-container {
            text-align: center;
            margin: 20px 0;
        }

        /* Pagination List */
        .pagination {
            display: inline-block;
            padding: 0;
            margin: 0;
            list-style: none;
        }

        /* Pagination List Items */
        .pagination li {
            display: inline;
            margin: 0 5px;
        }

        /* Pagination Links */
        .pagination li a {
            text-decoration: none;
            color: #007bff;
            border: 1px solid #dee2e6;
            padding: 6px 12px;
            border-radius: 4px;
            transition: background-color 0.3s, color 0.3s;
        }

        /* Active Page */
        .pagination li.active a {
            background-color: #20c997;
            color: white;
            border-color: #20c997;
        }

        /* Hover Effect */
        .pagination li a:hover {
            background-color: #e9ecef;
            color: #007bff;
        }

        /* Disabled State */
        .pagination li.disabled a {
            color: #6c757d;
            pointer-events: none;
            background-color: #f8f9fa;
            border-color: #dee2e6;
        }

        .form-control {
            background: #fff;
            border: 0.0625rem solid #aaaaaa !important;
            padding: 0.3125rem 1.25rem !important;
            color: #6e6e6e;
            height: 30px !important;
            border-radius: 5px;
        }

        /* Popover */

        .custom-popover-wrapper {
            display: flex;
            justify-content: space-around;
            align-items: center;
            padding: 20px;
        }

        .custom-popover {
            position: relative;
            display: inline-block;
        }

        .popover-content {
            display: none;
            position: absolute;
            background-color: #eff1f1;
            color: white;
            border-radius: 5px;
            padding: 0px;
            width: 200px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            z-index: 10;
            border: 1px solid #145650;
        }

        .popover-content .popover-title {
            font-weight: bold;
            margin-bottom: 5px;
        }

        .popover-content.popover-top {
            bottom: 35px;
            left: 50%;
            transform: translateX(-50%);
        }

        /* Triangle for the popover */
        .popover-content::after {
            content: '';
            position: absolute;
            bottom: -20px;
            left: 50%;
            transform: translateX(-50%);
            border-width: 10px;
            border-style: solid;
            border-color: #00695c transparent transparent transparent;
        }

        .custom-popover .btn {
            background-color: transparent;
            border: none;
            cursor: pointer;
            font-size: 14px;
            padding: 0px !important;
        }

        /* Styling for the icon (phone and envelope) */
        .custom-popover .btn i {
            color: #00695c;
        }
    </style>
</head>

<body>

    <div id="preloader">
        <div class="lds-ripple">
            <div></div>
            <div></div>
        </div>
    </div>

    <div id="main-wrapper">
        <?php include('includes/headers.php') ?>

        <?php include('includes/sidebar.php') ?>

        <div class="content-body">

            <div class="row">
                <div class="d-flex align-items-center flex-wrap">
                    <h4 class="fs-20 font-w600 me-auto">Payment List</h4>
                    <div>
                        <button class="btn btn-primary me-3 btn-sm" onclick="reset_filter()" id="comment"
                            style="display: inline !important;font-weight: 600;"><i class="fas fa-undo"></i> Reset Filter
                        </button>
                    </div>
                </div>
            </div>
            <div class="total-jobs mt-3">
                <p class="total" style="font-size: 16px; font-weight: 600;"></p>
            </div>
            <!-- row -->
            <div class="row">
                <div class="col-xl-12 card" style="overflow-x: scroll">
                    <table>
                        <thead>
                            <tr>
                                <th>SNo</th>
                                <th class="sort-alpha">Name <span style='float: right; cursor: pointer;' onclick="sortTable('name')"><i class="fa fa-solid fa-sort"></i></span></th>
                                <th class="sort-alpha">Details</th>
                                <th class="sort-alpha">Order Id# <span style='float: right; cursor: pointer;' onclick="sortTable('order_id')"><i class="fa fa-solid fa-sort"></i></span></th>
                                <th class="sort-alpha">Payment Id <span style='float: right; cursor: pointer;' onclick="sortTable('payment_id')"><i class="fa fa-solid fa-sort"></i></span></th>
                                <th class="sort-alpha">Order Status <span style='float: right; cursor: pointer;' onclick="sortTable('order_status')"><i class="fa fa-solid fa-sort"></i></span></th>
                                <th class="sort-alpha">GST <span style='float: right; cursor: pointer;' onclick="sortTable('gst')"><i class="fa fa-solid fa-sort"></i></span></th>
                                <th class="sort-alpha">Amount <span style='float: right; cursor: pointer;' onclick="sortTable('amount')"><i class="fa fa-solid fa-sort"></i></span></th>
                                <th class="sort-alpha">Discount % <span style='float: right; cursor: pointer;' onclick="sortTable('discount_percent')"><i class="fa fa-solid fa-sort"></i></span></th>
                                <th class="sort-alpha">Discount Amount<span style='float:right;cursor:pointer;' onclick="sortTable('discount_amount')"><i class="fa fa-solid fa-sort"></i></span></th>
                                <th class="sort-alpha">Payment Method<span style='float:right;cursor:pointer;' onclick="sortTable('payment_method')"><i class="fa fa-solid fa-sort"></i></span></th>
                                <th class="sort-alpha">Payment Type<span style='float:right;cursor:pointer;' onclick="sortTable('payment_type')"><i class="fa fa-solid fa-sort"></i></span></th>
                                <th class="sort-alpha">Coupon Code<span style='float:right;cursor:pointer;' onclick="sortTable('applied_coupon')"><i class="fa fa-solid fa-sort"></i></span></th>
                                <th class="sort-alpha">Profile Expiry Date<span style='float:right;cursor:pointer;' onclick="sortTable('profile_expiry_date')"><i class="fa fa-solid fa-sort"></i></span></th>
                                <th class="sort-alpha">Created Date<span style='float:right;cursor:pointer;' onclick="sortTable('created_date')"><i class="fa fa-solid fa-sort"></i></span></th>


                            </tr>

                            <tr>
                                <th></th>
                                <th><input type="text" id="name" name="name" placeholder="Search Name" class="form-control"></th>
                                <th></th>
                                <th><input type="text" id="order_id" name="order_id" placeholder="Order id" class="form-control"></th>
                                <th><input type="text" id="payment_id" name="payment_id" placeholder="Payment id" class="form-control"></th>
                                <th><input type="text" id="order_status" name="order_status" placeholder="Order Status" class="form-control"></th>
                                <th><input type="number" id="gst" name="gst" placeholder="Search GST" class="form-control"></th>
                                <th><input type="number" id="amount" name="amount" placeholder="Search Amount" class="form-control"></th>
                                <th><input type="number" id="discount_percent" name="discount_percent" placeholder="Discount Percent" class="form-control"></th>
                                <th><input type="number" id="discount_amount" name="discount_amount" placeholder="Discount Amount" class="form-control"></th>
                                <th><input type="text" id="payment_method" name="payment_method" placeholder="Payment Method" class="form-control"></th>
                                <th><input type="text" id="payment_type" name="payment_type" placeholder="Payment Type" class="form-control"></th>
                                <th><input type="text" id="coupon_code" name="coupon_code" placeholder="coupon code" class="form-control"></th>
                                <th><input type="date" id="profile_expiry_date" name="profile_expiry_date" class="form-control"></th>
                                <th><input type="date" id="created_date" name="created_date" class="form-control"></th>
                            </tr>

                        </thead>
                        <tbody id="incidentTable">
                            <!-- Table rows will be added here -->
                        </tbody>
                    </table>
                </div>
                <div id="no-data" style="text-align: center; font-size: 16px; font-weight: 600;"></div>

                <div id="pagination-container">
                    <ul id="pagination" class="pagination"></ul>
                </div>
                <div id="total-container">
                    <p class="total" style="font-size: 16px; font-weight: 600;"></p>
                </div>
            </div>
        </div>
    </div>


    </div>

    <script src="./vendor/global/global.min.js"></script>
    <script src="./vendor/chart.js/Chart.bundle.min.js"></script>
    <script src="vendor/jquery-nice-select/js/jquery.nice-select.min.js"></script>
    <script src="./vendor/bootstrap-datepicker-master/js/bootstrap-datepicker.min.js"></script>
    <script src="./vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="./js/plugins-init/datatables.init.js"></script>
    <script src="./js/custom.min.js"></script>
    <script src="./js/dlabnav-init.js"></script>
    <script src="./vendor/select2/js/select2.full.min.js"></script>
    <script src="./js/plugins-init/select2-init.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>



    <script>
        let currentPage = 1;
        let recordsPerPage = 20;

        function sortTable(column) {
            let sortDirection = 'asc';
            if (currentSortColumn === column) {
                sortDirection = currentSortDirection === 'asc' ? 'desc' : 'asc';
            }
            currentSortColumn = column;
            currentSortDirection = sortDirection;
            fetchData(currentPage, column, sortDirection);
        }

        let currentSortColumn = 'id'; // Default sort column
        let currentSortDirection = 'desc'; // Default sort direction

        async function fetchData(page = 1, sortColumn = 'id', sortDirection = 'desc') {
            const filters = {
                name: document.getElementById('name').value,
                order_id: document.getElementById('order_id').value,
                payment_id: document.getElementById('payment_id').value,
                order_status: document.getElementById('order_status').value,
                gstAmount: document.getElementById('gst').value,
                amount: document.getElementById('amount').value,
                discount_percent: document.getElementById('discount_percent').value,
                discount_amount: document.getElementById('discount_amount').value,
                payment_method: document.getElementById('payment_method').value,
                payment_type: document.getElementById('payment_type').value,
                applied_coupon: document.getElementById('coupon_code').value,
                profile_expiry_date: document.getElementById('profile_expiry_date').value,
                created_date: document.getElementById('created_date').value,
            };

            const queryString = new URLSearchParams(filters).toString();

            try {
                const response = await fetch(`../php_action/table-filter/payment-table.php?page=${page}&limit=${recordsPerPage}&sort_column=${sortColumn}&sort_direction=${sortDirection}&${queryString}`);
                const result = await response.json();
                if (result.is_data == 0) {
                    populateTable(
                        result.data, // The incident data
                        result.role, // User role
                        result.action_string,
                        result.encrypt_id
                    );
                    $('#no-data').text('');
                } else {
                    const table = document.getElementById('incidentTable');
                    table.innerHTML = '';
                    $('#no-data').text('No Data Available');
                }
                $('#total').html("Total Jobs : " + result.total);
                $('.total').html("Total Jobs : " + result.total);
                updatePagination(result.total, result.page);
            } catch (error) {
                console.error("Error parsing JSON:", error);
            }
        }


        function populateTable(data, role, action_string, encrypt_id) {
            const table = document.getElementById('incidentTable');
            table.innerHTML = '';
            data.forEach(row => {
                let rowHTML = `
        <tr id="${row.id}"><td>${row.i}</td>
            <td>
                <div style="width: 20vw; word-wrap: break-word;">
                    <a class="text-primary" href="app-profile?id=${row.id}" target="_blank">${row.name}</a>
                </div>
            </td>
            <td>

                <div class="custom-popover">
                    <button class="btn" data-popover="top"><i class="fas fa-phone-alt"></i></button>

                    <div class="popover-content popover-top">
                        <div class="popover-header">Phone Number</div>
                        <div class="popover-body">${row.mobile1}</div>
                    </div>
                </div>
                 |

                 <div class="custom-popover">
                    <button class="btn" data-popover="top"><i class="fa fa-envelope"></i></button>

                    <div class="popover-content popover-top">
                        <div class="popover-header">Email</div>
                        <div class="popover-body">${row.email}</div>
                    </div>
                </div>
            </td>
            <td><div style="width: 15vw; word-wrap: break-word;">${row.order_id}</div></td>
            <td><div style="width: 15vw; word-wrap: break-word;">${row.payment_id}</div></td>
            <td><div style="width: 7vw; word-wrap: break-word;">${row.order_status}</div></td>
            <td><div style="width: 7vw; word-wrap: break-word;">${row.gstAmount}</div></td>
            <td><div style="width: 7vw; word-wrap: break-word;">${row.amount}</div></td>
            <td><div style="width: 7vw; word-wrap: break-word;">${row.discount_percent}</div></td>
            <td><div style="width: 7vw; word-wrap: break-word;">${row.discount_amount}</div></td>
            <td><div style="width: 7vw; word-wrap: break-word;">${row.payment_method}</div></td>
            <td><div style="width: 7vw; word-wrap: break-word;">${row.payment_type}</div></td>
            <td><div style="width: 10vw; word-wrap: break-word;">${row.applied_coupon}</div></td>
            <td><div style="width: 10vw; word-wrap: break-word;">${row.profile_expiry_date}</div></td>
            <td><div style="width: 10vw; word-wrap: break-word;">${row.created_date}</div></td>
        </tr>`;
                table.innerHTML += rowHTML;
            });


            const popoverElements = document.querySelectorAll('[data-bs-toggle="popover"]');
            popoverElements.forEach(function(popover) {
                new bootstrap.Popover(popover);
            });

            const customPopovers = document.querySelectorAll('.custom-popover .btn');
            customPopovers.forEach(button => {
                button.addEventListener('click', function() {
                    // Close all popovers first
                    document.querySelectorAll('.popover-content').forEach(popover => popover.style.display = 'none');

                    // Get the corresponding popover content
                    const popoverContent = this.nextElementSibling;
                    popoverContent.style.display = 'block';
                });
            });

            // Close custom popovers if clicking outside
            document.addEventListener('click', function(event) {
                let isClickInside = false;
                customPopovers.forEach(button => {
                    if (button.contains(event.target) || button.nextElementSibling.contains(event.target)) {
                        isClickInside = true;
                    }
                });

                if (!isClickInside) {
                    document.querySelectorAll('.popover-content').forEach(popover => popover.style.display = 'none');
                }
            });

        }


        function parseMultipleValues(valueString, lookupArray) {
            if (!valueString) return 'No data';
            const values = valueString.split(',');
            return values.map(value => lookupArray[value] || '').filter(Boolean).join(', ') || 'No data';
        }

        $(document).ready(function() {
            $("input[type='number']").on("input", function() {
                console.log("Number input changed");
                fetchData();
            });

            $("select").on("change", function() {
                console.log("Select value changed");
                fetchData();
            });

            $("input[type='date']").on("change", function() {
                fetchData();
            });
        });

        function getEnterpriseType(type) {
            if (type == 1) return "Employer";
            if (type == 2) return "Consultancy";
            return "Freelancer";
        }


        function updatePagination(totalRecords, currentPage) {
            // const recordsPerPage = 20;
            const totalPages = Math.ceil(totalRecords / recordsPerPage);
            const pagination = document.getElementById('pagination');
            pagination.innerHTML = '';

            const startPage = Math.max(1, currentPage - 4);
            const endPage = Math.min(currentPage + 4, totalPages);

            // Previous button
            if (currentPage > 1) {
                const prevPage = currentPage - 1;
                const prevButton = document.createElement('li');
                prevButton.innerHTML = `<a href="#">Previous</a>`;
                prevButton.addEventListener('click', () => {
                    fetchData(prevPage);
                    updatePagination(totalRecords, prevPage);
                });
                pagination.appendChild(prevButton);
            }

            // Page number buttons
            for (let i = startPage; i <= endPage; i++) {
                const pageButton = document.createElement('li');
                if (i === currentPage) {
                    pageButton.classList.add('active', 'current');
                }
                pageButton.innerHTML = `<a href="#">${i}</a>`;
                pageButton.addEventListener('click', () => {
                    fetchData(i);
                    updatePagination(totalRecords, i);
                });
                pagination.appendChild(pageButton);
            }

            // Next button
            if (currentPage < totalPages) {
                const nextPage = currentPage + 1;
                const nextButton = document.createElement('li');
                nextButton.innerHTML = `<a href="#">Next</a>`;
                nextButton.addEventListener('click', () => {
                    fetchData(nextPage);
                    updatePagination(totalRecords, nextPage);
                });
                pagination.appendChild(nextButton);
            }
        }

        fetchData();

        // Filter functionality for individual columns
        document.querySelectorAll('input[type="text"]').forEach(input => {
            input.addEventListener('input', function() {
                fetchData(); // Re-fetch the data with filters applied
            });
        });


        $(document).ready(function() {
            $('.select-2').select2();
        })


        function reset_filter() {
            document.querySelectorAll('input[type="text"], input[type="number"], input[type="date"]').forEach(function(input) {
                input.value = '';
            });

            $('select:not([multiple])').each(function() {
                if ($(this).data('select2')) {
                    $(this).select2('destroy').select2();
                }
            });

            document.querySelectorAll('select:not([multiple])').forEach(function(select) {
                select.value = '';
            });

            $('select:not([multiple])').each(function() {
                if ($(this).data('select2')) {
                    $(this).select2();
                }
            });


            $(document.querySelectorAll('select[multiple]')).select2('destroy').select2();

            document.querySelectorAll('select[multiple]').forEach(function(select) {
                Array.from(select.options).forEach(option => option.selected = false);
            });

            $(document.querySelectorAll('select[multiple]')).select2();

            fetchData();
        }
    </script>
</body>

</html>