<?php

  function find_all($table) {
    global $db;

    $sql = "SELECT * FROM $table";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return $result;
  }

  function find_user($username) {
    global $db;

    $sql = "SELECT * FROM users ";
    $sql .= "WHERE username='$username'";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return $result;
  }

  function find_user_by_wedding_id($wedding_id) {
    global $db;

    $sql = "SELECT * FROM users ";
    $sql .= "WHERE wedding_id='$wedding_id'";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return $result;
  }

  function create_user($username,$password,$wedding_id) {
    global $db;

    $sql = "INSERT INTO users ";
    $sql .= " (username, password, wedding_id, admin) VALUES (";
    $sql .= " '$username', '$password', '$wedding_id', '0' ";
    $sql .= " ) ";

    $result = mysqli_query($db, $sql);
    if ($result) {
      echo "User successfully created.";
    } else {
      echo mysqli_error($db) . ". Please try again.";
      db_disconnect($db);
      exit;
    }
  }

  function create_wedding($name,$date,$location) {
    global $db;

    $sql = "INSERT INTO weddings ";
    $sql .= " (name, date, location) VALUES (";
    $sql .= " '$name', '$date', '$location' ";
    $sql .= " ) ";

    $result = mysqli_query($db, $sql);
    if ($result) {
      echo "Wedding successfully created.";
    } else {
      echo mysqli_error($db) . ". Please try again.";
      db_disconnect($db);
      exit;
    }
  }

  function find_wedding_guests($wedding_id) {
    global $db;

    $sql = "SELECT * FROM guests ";
    $sql .= "WHERE wedding_id=$wedding_id";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return $result;
  }
