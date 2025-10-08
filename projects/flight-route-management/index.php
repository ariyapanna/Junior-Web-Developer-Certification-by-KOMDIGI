<?php 
    $origins = [
        [
            'name' => 'Soekarno-Hatta',
            'code' => 'CGK',
            'tax' => 50000
        ],
        [
            'name' => 'Husein Sastranegara',
            'code' => 'BDO',
            'tax' => 30000
        ],
        [
            'name' => 'Abdul Rachman Saleh',
            'code' => 'MLG',
            'tax' => 40000
        ],
        [
            'name' => 'Juanda',
            'code' => 'SUB',
            'tax' => 40000
        ]
    ];

    $destinations = [
        [
            'name' => 'Ngurah Rai',
            'code' => 'DPS',
            'tax' => 80000
        ],
        [
            'name' => 'Hasanuddin',
            'code' => 'UPG',
            'tax' => 70000
        ],
        [
            'name' => 'Inanwatan',
            'code' => 'INX',
            'tax' => 90000
        ],
        [
            'name' => 'Sultan Iskandarmuda',
            'code' => 'BTJ',
            'tax' => 70000
        ]
    ];

    $data = [];

    function load_data()
    {
        global $data;
        $data = json_decode(file_get_contents('data/flights.json'), true);
    }

    function render_airport_selection($id, $label, $default_option, $airports) 
    {
        echo '<div class="mb-3">';
        echo '<label for="' . $id . '" class="form-label">' . $label . '</label>';
        echo '<select id="' . $id . '" class="form-select" name="' . $id . '" required>';
        echo '<option value="" selected disabled>' . $default_option . '</option>';
        foreach ($airports as $airport)
            echo "<option value='" . $airport['code'] . "'>" . $airport['name'] . "</option>";
        echo '</select>';
        echo '</div>';
    }

    function find_airport_detail($airports, $airport_code)
    {
        foreach($airports as $airport)
        {
            if($airport['code'] == $airport_code)
                return $airport;
        }
        return null;
    }

    function merge_airline_data($airline_name, $origin_name, $destination_name, $ticket_price, $tax)
    {
        $output_file = 'data/flights.json';
        $old_data = [];

        if(!file_exists($output_file))
            return;

        $contents = file_get_contents($output_file);
        if(!empty($contents))
            $old_data = json_decode($contents, true);

        $parsed_ticket_price = (float)$ticket_price;
        $old_data[] = [
            'airline_name' => $airline_name,
            'origin_airport' => $origin_name,
            'destination_airport' => $destination_name,
            'ticket_price' => $parsed_ticket_price,
            'tax' => $tax,
            'total_price' => $parsed_ticket_price + $tax
        ];

        file_put_contents($output_file, json_encode($old_data, JSON_PRETTY_PRINT));
    }

    function register_airline($airline_name, $origin_code, $destination_code, $ticket_price)
    {
        global $origins, $destinations;

        $origin_airport = find_airport_detail($origins, $origin_code);
        $destination_airport = find_airport_detail($destinations, $destination_code);

        merge_airline_data(
            $airline_name,
            $origin_airport['name'],
            $destination_airport['name'],
            $ticket_price,
            $origin_airport['tax'] + $destination_airport['tax']
        );
    }

    switch($_SERVER['REQUEST_METHOD'])
    {
        case 'GET':
            load_data();
            break;
        case 'POST':
            register_airline(
                $_POST['airline-name'],
                $_POST['asal-penerbangan'],
                $_POST['tujuan-penerbangan'],
                $_POST['ticket-price']
            );
            load_data();
            break;
    }
?>

<html>
    <head>
        <title>Flight Route Management</title>
        <!-- Include Bootstrap CSS -->
        <link rel="stylesheet" href="lib/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/styles.css">
    </head>
    <body>
        <!-- Flight Registration Modal -->
        <div id="flight-registration-modal" class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
            <form class="modal-dialog" method="post">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Flight Registration Form</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="airline-name" class="form-label">Nama Maskapai</label>
                        <input type="text" class="form-control" id="airline-name" name="airline-name" placeholder="Input Nama Maskapai" required>
                    </div>
                    <?php
                        render_airport_selection('asal-penerbangan', 'Asal Penerbangan', '-- Pilih Bandara Asal --', $origins);
                        render_airport_selection('tujuan-penerbangan', 'Tujuan Penerbangan', '-- Pilih Bandara Tujuan --', $destinations);
                    ?>
                    <div class="mb-3">
                        <label for="ticket-price" class="form-label">Harga Tiket</label>
                        <input type="number" class="form-control" id="ticket-price" name="ticket-price" placeholder="Input Harga Tiket" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                </div>
            </form>
        </div>

        <div class="container d-flex flex-column gap-3 py-5">
            <h1 class="fw-bold text-center mb-4">Flight Route Management</h1>

            <!-- Flight Registration Button -->
            <button 
                id="register-flight-button" 
                class="btn btn-success"
                data-bs-toggle="modal"
                data-bs-target="#flight-registration-modal"
            >
                Register New Flight
            </button>

            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white fw-semibold">
                    Flight List
                </div>
                <div class="card-body p-0">
                    <!-- Flight List Table -->
                    <table class="table mb-0 table-hover align-middle">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Maskapai</th>
                                <th scope="col">Asal Penerbangan</th>
                                <th scope="col">Tujuan Penerbangan</th>
                                <th scope="col">Harga Tiket</th>
                                <th scope="col">Pajak</th>
                                <th scope="col">Total Harga</th>
                            </tr>
                        </thead>
                        <tbody class="table-group-divider">
                            <?php
                                foreach($data as $d => $v)
                                {
                                    echo "<tr>";
                                    echo "<th scope='row'>" . ($d + 1) . "</td>";
                                    echo "<td>" . $v['airline_name'] . "</td>";
                                    echo "<td>" . $v['origin_airport'] . "</td>";
                                    echo "<td>" . $v['destination_airport'] . "</td>";
                                    echo "<td>" . number_format($v['ticket_price'], 0, ',', '.') . "</td>";
                                    echo "<td>" . number_format($v['tax'], 0, ',', '.') . "</td>";
                                    echo "<td>" . number_format($v['total_price'], 0, ',', '.') . "</td>";
                                    echo "</tr>";
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <script src="lib/js/bootstrap.min.js"></script>
    </body>
</html>