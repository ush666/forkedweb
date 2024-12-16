<?php
require_once '../classes/staff.class.php';
require_once '../tools/functions.php';

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $staff = new Staff();

    // Fetch staff data (you should modify this to retrieve data from your database)
    $staffArray = $staff->show();
    $counter = 1;
?>
<?php
    if ($staffArray) {
        foreach ($staffArray as $item) {
?>
            <tr>
                <td><?= $item['id'] ?></td>
                <td><?= $item['name'] ?></td>
                <td><?= $item['discount_type'] ?></td>
                <td><?= $item['amount'] ?></td>
                <td><?= $item['min_spend'] ?></td>
                <td><?= $item['slots'] ?></td>
                <td><?= $item['expiration'] ?></td>
            
                <td class="text-center"><a href=""><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
            </tr>
<?php
            $counter++;
        }
    }
}
?>

