<?php
// Establish a database connection
require_once 'inc/conn.php';

// check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    // get the ID of the selected row from the URL
    if (isset( $_GET['id'] ) && !empty( $_GET['id'] )) {
        $ticket_id = mysqli_real_escape_string( $con, $_GET['id'] );

        // query the database for the selected row
        $query = "SELECT * FROM sell_ticket_history WHERE ticket_id = '$ticket_id'";
        $result = mysqli_query( $con, $query );

        if ($result && mysqli_num_rows( $result ) > 0) {
            $row = mysqli_fetch_assoc( $result );
            // display ticket details
        }
        else {
            // handle error when ticket not found
        }
    }
    else {
        // handle error when id is not provided in URL
    }

}
?>



<!doctype html>
<html lang="en">

<head>
    <title>Print Ticket</title>
    <style type="text/css">
        html,
        body,
        * {
            padding: 0 !important;
            margin: 0 !important;
            font-size: 10pt;
        }

        table {
            border: none !important;
            font-size: 8pt;
            font-family: Segoe, "Segoe UI", "DejaVu Sans", "Trebuchet MS", Verdana, sans-serif;
        }

        caption>p {
            margin: 2px 3px;
            padding: 0;
        }

        .large {
            font-size: 1.2em;
        }

        .mono {
            font-family: Consolas, "Andale Mono", "Lucida Console", Monaco, "Courier New", monospace;
        }

        @media screen {
            .printOnly {
                display: none;
            }
        }

        @media print {
            .noPrint {
                display: none !important;
            }
        }
    </style>
    <script language="javascript">
        window.onload = function () {
            window.print();
        }
    </script>

</head>

<body>
    <table border="0" cellpadding="2" cellspacing="20">
        <tbody>
            <tr class="noPrint">
                <th width="219" style="width: 58mm;">Office-copy</th>
                <th width="403" style="width: 99mm;">Passenger-copy</th>
                <th width="215" style="width: 58mm;">Guide-copy</th>
            </tr>
            <tr>
                <td align="center" valign="top">
                    <table>
                        <!--<caption><p align="left">Chair Coach<br />Golden Line (Ferry)</p></caption>-->
                        <tr>
                            <td><strong>Travel Date:</strong></td>
                            <td colspan="3" class="large mono" nowrap><?php echo $row['date']; ?></td>
                        </tr>
                        <tr>
                            <td width="75"><strong>Coach#:</strong></td>
                            <td colspan="3" class="large mono"><?php echo $row['coach_no']; ?></td>
                        </tr>
                        <tr>
                            <td><strong>Ticket#:</strong></td>
                            <td colspan="3"><?php echo $row['ticket_id']; ?></td>
                        </tr>
                        <tr>
                            <td nowrap><strong>Departure Time:</strong></td>
                            <td colspan="3" class="large mono"><?php echo $row['time']; ?></td>
                        </tr>
                        <tr>
                            <td colspan="4">Name: <?php echo $row['name']; ?></td>
                        </tr>
                        <tr>
                            <td colspan="4">Mobile: <?php echo $row['mobile']; ?></td>
                        </tr>
                        <tr>
                            <td nowrap>FROM: </td>
                            <td colspan="3">Hemayetpur</td>
                        </tr>
                        <tr>
                            <td nowrap>To: </td>
                            <td colspan="3" style="font-weight:bold; font-size:12px"><?php echo $row['station']; ?>
                            </td>
                        </tr>
                        <!-- <tr>
                            <td colspan="4">Ticket Price: 400.00 Quantity: 1</td>
                        </tr> -->
                        <tr>
                            <td colspan="4">Seat No: <?php echo $row['seat']; ?></td>
                        </tr>
                        <tr>
                            <td align="right" colspan="4"><u>Sold By: Mafuz</u><br><i>Hemayetpur, Dhaka</i></td>
                        </tr>
                    </table>
                </td>

                <td align="center" valign="top">
                    <table>
                        <!--<caption><p align="left">Chair Coach<br />Golden Line (Ferry)</p></caption>-->
                        <tr>
                            <td nowrap><strong>Travel Date:</strong></td>
                            <td class="large mono">&nbsp; <?php echo $row['date']; ?></td>
                            <td nowrap="nowrap"><strong>Time:</strong></td>
                            <td class="large mono"><?php echo $row['time']; ?></td>
                        </tr>
                        <tr>
                            <td width="65"><strong>Coach#:</strong></td>
                            <td width="30" class="large mono"><?php echo $row['coach_no']; ?></span></td>
                            <td width="88"><strong>Ticket#:</strong></td>
                            <td width="132"><?php echo $row['ticket_id']; ?></td>
                        </tr>
                        <tr>
                            <td colspan="4">Name: <?php echo $row['name']; ?></td>
                        </tr>
                        <tr>
                            <td colspan="4">Mobile: <?php echo $row['mobile']; ?></td>
                        </tr>
                        <tr>
                            <td>FROM:</td>
                            <td>Hemayetpur</td>
                            <td>TO:</td>
                            <td style="font-weight:bold; font-size:12px"><?php echo $row['station']; ?> </td>
                        </tr>
                        <tr>
                            <td>Issue Date:</td>
                            <td nowrap><?php echo $row['date']; ?></td>
                            <td>Time:</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td colspan="4">Departure Place: Hemayetpur, Dhaka</td>
                        </tr>
                        <tr>
                            <td colspan="4">Seat No: <?php echo $row['seat']; ?></td>
                        </tr>
                        <!-- <tr>
                            <td colspan="4">Ticket Price: 400.00 Quantity: 1 Goods fare: 0.00</td>
                        </tr> -->
                        <!-- <tr>
                            <th colspan="4" align="center">Total Fare: 400.00</th>
                        </tr> -->
                        <tr>
                            <td></td>
                            <td></td>
                            <td colspan="2"><u>Sold By: Mafuz</u><br /><i>from Hemayetpur, Dhaka</i></td>
                        </tr>
                    </table>
                </td>

                <td align="center" valign="top">
                    <table>
                        <!--<caption><p align="left">Chair Coach<br />Golden Line (Ferry)</p>
    </caption>-->

                        <tr>
                            <td>&nbsp;</td>
                            <td><strong>Travel Date:</strong></td>
                            <td colspan="3" class="large mono" nowrap><?php echo $row['date']; ?></td>
                        </tr>
                        <tr>
                            <td width="47">&nbsp;</td>
                            <td width="108"><strong>Coach:</strong></td>
                            <td colspan="3" class="large mono"><?php echo $row['coach_no']; ?></td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td><strong>Ticket#:</strong></td>
                            <td colspan="3"><?php echo $row['ticket_id']; ?></td>
                        </tr>
                        <tr>
                            <td nowrap>&nbsp;</td>
                            <td nowrap><strong>Departure Time:</strong></td>
                            <td colspan="3" class="large"><?php echo $row['time']; ?></td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td colspan="4">Name: <?php echo $row['name']; ?></td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td colspan="4">Mobile#: <?php echo $row['mobile']; ?></td>
                        </tr>
                        <tr>
                            <td nowrap>&nbsp;</td>
                            <td nowrap>FROM: </td>
                            <td colspan="3">Hemayetpur</td>
                        </tr>
                        <tr>
                            <td nowrap>&nbsp;</td>
                            <td nowrap>TO: </td>
                            <td colspan="3" style="font-weight:bold; font-size:12px"><?php echo $row['station']; ?>
                            </td>
                        </tr>
                        <!-- <tr>
                            <td nowrap>&nbsp;</td>
                            <td colspan="4" nowrap>Ticket Price: 400.00 Quantity: 1</td>
                        </tr>
                        <tr>
                            <td nowrap>&nbsp;</td>
                            <td colspan="4" nowrap>Goods fare: 0.00</td>
                        </tr>
                        <tr>
                            <td nowrap>&nbsp;</td>
                            <td colspan="4" nowrap>Total Fare: 400.00</td>
                        </tr> -->
                        <tr>
                            <td>&nbsp;</td>
                            <td colspan="4">Seat No: <?php echo $row['seat']; ?></td>
                        </tr>

                        <tr>
                            <td align="right" colspan="4"><u>Sold By: Mafuz</u><br><i>Hemayetpur, Dhaka</i></td>
                        </tr>
                    </table>
                </td>
            </tr>
        </tbody>
    </table>
    <div align="center"><br /></div>
</body>