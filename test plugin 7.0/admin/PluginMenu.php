<?php
// Form functionality
if(isset($_POST['submitbtn'])){
    $data=array(
        'name'=>$_POST['name'],
        'ID'=>$_POST['ID'],
        'url'=>$_POST['url']
    );
 



// Include WordPress core functionality
require_once(ABSPATH . 'wp-load.php');

// Global $wpdb variable
global $wpdb;

// Define table name
$table_name = $wpdb->prefix . 'API_details';

// SQL query to create table
$sql = "CREATE TABLE IF NOT EXISTS $table_name (
    id INT NOT NULL AUTO_INCREMENT,
    column1_name VARCHAR(255) NOT NULL,
    column2_ID VARCHAR(255) NOT NULL,
    column3_url VARCHAR(255) NOT NULL,
    PRIMARY KEY (id)
) ENGINE=InnoDB";

// Execute query
$wpdb->query($sql);

// Check if table was created successfully
if ($wpdb->get_var("SHOW TABLES LIKE '$table_name'") != $table_name) {
    echo "Error creating table $table_name";
} else {
    echo "Table $table_name created successfully       ";
}



    // separate array values by commas
    $data_values = array_map('esc_sql', $data);
    $data_values = "'" . implode("', '", $data_values) . "'";

    // SQL query to insert data into the table
    $sql = "INSERT INTO $table_name (column1_name, column2_ID, column3_url) VALUES ($data_values)";

    // Execute query
    $wpdb->query($sql);
}

// Check if data was inserted successfully
if ($wpdb->last_error) {
    echo "Error inserting data into the database: " . $wpdb->last_error;
} else {
    echo "       Data inserted successfully";
}



// html form 
?>

<form role="form" Method="POST">
<div class="form-group">
    <input type=" text" id="name" name="name" placeholder="name of API"
    class="form-control input-sm" required="" >
</div>
<div class="form-group">
    <input type=" text" id="ID" name="ID" placeholder="Unique ID"
    class="form-control input-sm" required="" >
</div>
<div class="form-group">
    <input type=" url" id="url" name="url" placeholder="URL of API"
    class="form-control input-sm" required="" >
</div>
<div class="row justify-content-center">
    <input type="submit" value="SUBMIT" class="btn btn-info btn-block" name="submitbtn">
</div>
</form>





