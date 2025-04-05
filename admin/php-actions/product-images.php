<?php
include '../../db.php';

$response = ['success' => false];

if (isset($_FILES['product_image'])) {
    $image = $_FILES['product_image'];
    $filename = time() . '_' . basename($image['name']);
    $target = '../uploads/' . $filename;

    if (move_uploaded_file($image['tmp_name'], $target)) {
        // Insert into DB (basic example)
        $sql = "INSERT INTO product_image (name) VALUES ('$filename')";
        if (mysqli_query($conn, $sql)) {
            $last_id = mysqli_insert_id($conn);
            $response = [
                'success' => true,
                'product_id' => $last_id,
                'image' => $filename
            ];
        } else {
            $response['error'] = mysqli_error($conn);
        }
    } else {
        $response['error'] = 'Image upload failed.';
    }
} else {
    $response['error'] = 'No file uploaded.';
}

echo json_encode($response);
